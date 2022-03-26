<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public $timestamps = false;
    
    public function user1Connection(){
        return $this->belongsTo(User::class, 'user1Id');
    }

    public function user2Connection(){
        return $this->belongsTo(User::class, 'user2Id');
    }

    public function productConnection(){
        return $this->belongsTo(Product::class, 'productId');
    }
}
