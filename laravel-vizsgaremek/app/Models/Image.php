<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'productId',
        'imageURI',
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'productId');
    }
}
