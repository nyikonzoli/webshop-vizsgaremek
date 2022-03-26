<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = "messages";
    public $timestamps = false;
    
    protected $fillable = [
        "conversationId",
        "content",
        "date",
        "userId"
    ];

    public function conversatoinConnection(){
        return $this->belongsTo(Conversation::class, 'conversationId');
    }

    public function userConnection(){
        return $this->belongsTo(User::class, 'userId');
    }
}
