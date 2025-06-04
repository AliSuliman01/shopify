<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marchant extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
    ];

    public function user()
    {
        return $this->morphOne(User::class, 'user');
    }
}   
