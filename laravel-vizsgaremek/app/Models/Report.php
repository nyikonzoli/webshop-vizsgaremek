<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'type',
        'objectId',
        'userId',
    ];

    public function getProduct(){
        return Product::find($this->objectId);
    }

    public function getReview(){
        return Review::find($this->objectId);
    }

    public function getConversation(){
        return Conversation::find($this->objectId);
    }
}
