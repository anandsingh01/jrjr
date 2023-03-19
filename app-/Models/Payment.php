<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    function getCauses(){
        return $this->hasMany(Cause::class,'id','cause_id');
    }

    function getDonors(){
        return $this->hasOne(User::class,'id','donar_id');
    }

}
