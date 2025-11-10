<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Get all users except the current user
     */
    public function getUsers() {
        try {
            $users = User::where('id', '!=', Auth::id())
                ->select('id', 'name', 'email')
                ->orderBy('name')
                ->get();

            return response()->json($users);
        } catch (\Exception $e) {
            Log::error('Error getting users: ' . $e->getMessage());
            return response()->json(['error' => 'Error loading users'], 500);
        }
    }

    /**
     * Get conversation between current user and another user
     */
    public function getConversation($userId) {
        try {
            $currentUserId = Auth::id();
            
            // Validate that the user exists
            if (!User::find($userId)) {
                return response()->json(['error' => 'User not found'], 404);
            }

            $messages = Message::getConversation($currentUserId, $userId);

            // Mark messages as read
            Message::where('sender_id', $userId)
                ->where('receiver_id', $currentUserId)
                ->where('is_read', false)
                ->update(['is_read' => true]);

            return response()->json($messages);
        } catch (\Exception $e) {
            Log::error('Error getting conversation: ' . $e->getMessage());
            return response()->json(['error' => 'Error loading conversation'], 500);
        }
    }

    /**
     * Send a message
     */
    public function sendMessage(Request $request) {
        try {
            // Validate input
            $validated = $request->validate([
                'receiver_id' => 'required|integer|exists:users,id',
                'message' => 'required|string|max:1000|min:1',
            ]);

            $currentUserId = Auth::id();
            $receiverId = $validated['receiver_id'];

            // Ensure receiver_id is not the current user
            if ($receiverId == $currentUserId) {
                return response()->json(
                    ['error' => 'Cannot send message to yourself'], 
                    400
                );
            }

            // Create the message
            $message = Message::create([
                'sender_id' => $currentUserId,
                'receiver_id' => $receiverId,
                'message' => trim($validated['message']),
                'is_read' => false,
            ]);

            // Load relationships
            $message->load(['sender', 'receiver']);

            // Broadcast the message event
            broadcast(new MessageSent($message))->toOthers();

            return response()->json($message, 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Validation error in sendMessage: ' . json_encode($e->errors()));
            return response()->json($e->errors(), 422);
        } catch (\Exception $e) {
            Log::error('Error sending message: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json(
                ['error' => 'Error sending message: ' . $e->getMessage()], 
                500
            );
        }
    }

    /**
     * Mark conversation as read
     */
    public function markAsRead($userId) {
        try {
            $currentUserId = Auth::id();

            Message::where('sender_id', $userId)
                ->where('receiver_id', $currentUserId)
                ->where('is_read', false)
                ->update(['is_read' => true]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Error marking as read: ' . $e->getMessage());
            return response()->json(['error' => 'Error marking as read'], 500);
        }
    }

    /**
     * Get unread message count
     */
    public function getUnreadCount() {
        try {
            $count = Message::where('receiver_id', Auth::id())
                ->where('is_read', false)
                ->count();

            return response()->json(['unread_count' => $count]);
        } catch (\Exception $e) {
            Log::error('Error getting unread count: ' . $e->getMessage());
            return response()->json(['error' => 'Error getting unread count'], 500);
        }
    }

    
    
}