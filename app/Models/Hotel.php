<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Hotel extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'email',
        'name',
        'region',
        'country',
        'city',
        'star',
        'number_rooms',
        'password'
    ];
       protected $hidden = [
        'password', 'remember_token',
    ];

    public function comments()
    {
        return $this->morphMany('Comment', 'commentable');
    }
}
