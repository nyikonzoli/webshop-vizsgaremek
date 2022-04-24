<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birthdate',
        'profilePictureURI',
        'address',
        'description'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $timestamps = false;

    public function reviewsSellerConnection(){
        return $this->hasMany(Review::class, 'sellerId');
    }

    public function reviewsBuyerConnection(){
        return $this->hasMany(Review::class, 'buyerId');
    }

    public function buysConversations(){
        return $this->hasMany(Conversation::class, 'buyerId');
    }

    public function salesConversations(){
        return $this->hasMany(Conversation::class, 'sellerId');
    }

    public function transactionsConnection(){
        return $this->hasMany(Transaction::class, 'userId');
    }

    public function favouritesConnection(){
        return $this->hasMany(Favourite::class, 'userId');
    }

    public function products(){
        return $this->hasMany(Product::class, 'userId');
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function admin(){
        return $this->hasOne(Admin::class, 'userId');
    }

    public function getProfilePictureURI(){
        if (is_null($this->profilePictureURI)){
            return asset('profile_pictures/placeholder.jpg');
        }
        else{
            return asset($this->profilePictureURI);
        }
    }

    public function getDescription() {
        if (is_null($this->description)){
            return "This user doesn't have description.";
        }
        else{
            return $this->description;
        }
    }
}
