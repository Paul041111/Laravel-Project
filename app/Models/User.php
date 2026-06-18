<?php

namespace App\Models;

// Illuminate\Foundation\Auth\User is the base class that already includes
// authentication helpers (password hashing casts, Notifiable, etc).
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Fields that can be mass-assigned.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Fields hidden when the model is converted to an array / JSON.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Attribute casting.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * All articles written by this user.
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
} 
