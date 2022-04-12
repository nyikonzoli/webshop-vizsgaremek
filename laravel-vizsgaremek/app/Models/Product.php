<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    public function categoryConnection() {
        return $this->belongsTo(Category::class, 'categoryId');
    }

    public function imageConnection() {
        return $this->hasMany(Image::class, 'productId');
    }

    public function conversationConnection() {
        return $this->hasMany(Conversation::class, 'productId');
    }

    public function userConnection() {
        return $this->belongsTo(User::class, 'userId');
    }

    public function getDescription() {
        if (empty($this->description)) {
            return 'This item has no description attached to it.';
        } else {
            return $this->description;
        }
    }
}
