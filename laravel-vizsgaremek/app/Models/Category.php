<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function productConnection() {
        return $this->hasMany(Product::class, 'categoryId');
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
