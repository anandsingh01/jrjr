<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;

class Hospital extends Model
{
    use HasFactory;

    protected $table = 'hospitals';

    function getRequirements(){
        return $this->hasMany(\App\Models\Requirement::class,'hospital_id','hospital_id');
    }
}
