<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public $timestamps = false;

    public function sellerConnection(){
        return $this->belongsTo(User::class, 'sellerId');
    }

    public function buyerConnection(){
        return $this->belongsTo(User:class, 'buyerId');
    }
}
