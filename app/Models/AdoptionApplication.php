<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdoptionApplication extends Model
{
    protected $fillable = [
        'cat_id',
        'applicant_name',
        'license_id',
        'address',
        'partner_name',
        'phone',
        'housing',
        'email',
        'age',
        'employment',
        'status'
    ];

    public function cat()
    {
        return $this->belongsTo(\App\Models\Cat::class);
    }

}

