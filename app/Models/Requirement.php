<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;

class Requirement extends Model
{
    use HasFactory;

    protected $table = 'requirements';
}
