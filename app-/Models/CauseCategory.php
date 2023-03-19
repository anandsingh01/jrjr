<?php

namespace App\Models;

use App\Models\CauseSubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CauseCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function subCategories()
    {
        return $this->hasMany(CauseSubCategory::class, 'category_id', 'id');
    }
}
