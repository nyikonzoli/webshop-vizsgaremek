<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public $timestamps = false;
    
    public function buyer(){
        return $this->belongsTo(User::class, 'buyerId');
    }

    public function seller(){
        return $this->belongsTo(User::class, 'sellerId');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'productId');
    }

    public function messages(){
        return $this->hasMany(Message::class, 'conversationId');
    }

    protected $fillable = ["buyerId", "productId", "sellerId"];
}
