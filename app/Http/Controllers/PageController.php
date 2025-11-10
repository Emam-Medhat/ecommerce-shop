<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the chat page with all users
     */
    public function chat() {
        $currentUserId = Auth::id();
        
        // Get all users except current user
        $users = User::where('id', '!=', $currentUserId)
            ->select('id', 'name', 'email')
            ->orderBy('name')
            ->get();

        // Get unread message count
        $unreadCount = Message::where('receiver_id', $currentUserId)
            ->where('is_read', false)
            ->count();

        return view('chat.index', [
            'users' => $users,
            'unreadCount' => $unreadCount,
        ]);
    }

    /**
     * Open chat window with specific user
     */
    public function chatWithUser($userId) {
        $currentUserId = Auth::id();

        // Validate user exists
        $user = User::find($userId);
        if (!$user) {
            return redirect()->route('chat.index')->with('error', 'User not found');
        }

        // Prevent user from chatting with themselves
        if ($userId == $currentUserId) {
            return redirect()->route('chat.index')->with('error', 'Cannot chat with yourself');
        }

        // Get conversation between users
        $messages = Message::getConversation($currentUserId, $userId);

        // Mark messages as read
        Message::where('sender_id', $userId)
            ->where('receiver_id', $currentUserId)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return view('chat.show', [
            'user' => $user,
            'messages' => $messages,
        ]);
    }
}