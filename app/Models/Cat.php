<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $fillable = [
        'name',
        'bio',
        'gender',
        'age',
        'breed',
        'location',
        'status',
        'photo'
    ];

    public function applications() {
        return $this->hasMany(AdoptionApplication::class);
    }
}

