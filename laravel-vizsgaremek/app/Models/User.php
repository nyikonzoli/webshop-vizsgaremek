<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
        return $this->hasMany(Review::class, 'selledId');
    }

    public function reviewsBuyerConnection(){
        return $this->hasMany(Review::class, 'buyerId');
    }

    public function conversationsUser1Connection(){
        return $this->hasMany(Conversation::class, 'user1Id');
    }

    public function conversationsUser2Connection(){
        return $this->hasMany(Conversation::class, 'user2Id');
    }

    public function transactionsConnection(){
        return $this->hasMany(Transaction::class, 'userId');
    }

    public function favouritesConnection(){
        return $this->hasMany(Favourite::class, 'userId');
    }

    public function productsConnection(){
        return $this->hasMany(Product::class, 'userId');
    }

    public function getProfilePictureURI(){
        if (is_null($this->profilePictureURI)){
            return asset('profile_pictures/placeholder.jpg');
        }
        else{
            return $this->profilePictureURI;
        }
    }
}
