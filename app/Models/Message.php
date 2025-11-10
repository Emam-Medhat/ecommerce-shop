<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Message extends Model {
    protected $fillable = ['sender_id', 'receiver_id', 'message', 'is_read'];
    protected $casts = ['is_read' => 'boolean'];
    protected $appends = ['formatted_time'];

    public function sender(): BelongsTo {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver(): BelongsTo {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function getFormattedTimeAttribute(): string {
        return $this->created_at->format('H:i');
    }

    // Get conversation between two users (excluding current user from query)
    public static function getConversation($userId, $otherUserId) {
        return self::where(function ($q) use ($userId, $otherUserId) {
            $q->where('sender_id', $userId)->where('receiver_id', $otherUserId);
        })->orWhere(function ($q) use ($userId, $otherUserId) {
            $q->where('sender_id', $otherUserId)->where('receiver_id', $userId);
        })->with(['sender', 'receiver'])->orderBy('created_at', 'asc')->get();
    }

    // Get unread message count for a user
    public static function getUnreadCount($userId): int {
        return self::where('receiver_id', $userId)->where('is_read', false)->count();
    }
}