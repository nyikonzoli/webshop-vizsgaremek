<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    public $timestamps = false;

    public function userConnection(){
        return $this->belongsTo(User::class, 'userId');
    }

    public function productConnection(){
        return $this->belongsTo(Product::class, 'productId');
    }
}
