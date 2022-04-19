<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'size',
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'categoryId');
    }

    public function images() {
        return $this->hasMany(Image::class, 'productId');
    }

    public function conversation() {
        return $this->hasMany(Conversation::class, 'productId');
    }

    public function user() {
        return $this->belongsTo(User::class, 'userId');
    }

    public function getDescription() {
        if (empty($this->description)) {
            return 'This item has no description attached to it.';
        } else {
            return $this->description;
        }
    }

    public function getSize() {
        if (empty($this->size)) {
            return '-';
        } else {
            return $this->size;
        }
    }
}
