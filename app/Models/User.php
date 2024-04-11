<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'email',
        'username',
        'email_verified_at',
        'description',
        'thumbnail',
        'profile',
        'gender',
        'relationship',
        'location',
        'address',
        'is_private',
        'is_banned',
        'password',
        'birthdate'
    ];


    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    protected function profile(): Attribute{
        return Attribute::make(get: function($value){
            return $value ? 'storage/profileImages/' . $value : '/user-profile.jpg';
        });
    }

    protected function thumbnail(): Attribute{
        return Attribute::make(get: function($value){
            return $value ? 'storage/thumbnailImages/' . $value : '/user-cover.png';
        });
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
