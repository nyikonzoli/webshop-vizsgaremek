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

    public function getReceiver(){
        if($this->type == "product"){
            return $this->getProduct()->user;
        }
        else if($this->type == "conversation"){
            if($this->getConversation()->sellerId == $this->userId) return $this->getConversatoin()->buyer;
            else return $this->getConversation()->seller;
        } 
        else if($this->type == "review"){
            if($this->getReview()->sellerId == $this->userId) return $this->getReview()->buyerConnection;
            else return $this->getReview()->sellerConnection;
        } 
    }
}
