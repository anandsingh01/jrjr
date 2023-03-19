<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FundUser extends Model
{
    use HasFactory, SoftDeletes;

    const ACTIVE = 1;
    const DEACTIVE = 0;

    const ACTIVE_SLUG = 'Active';
    const DEACTIVE_SLUG = 'Inactive';

    protected  $table = "fund_users";
    protected $primarykey = "id";

    protected $guarded = ['id'];

    protected $appends = [
        'full_name', 'status_slug'
    ];

    public function getFullNameAttribute()
    {
        return $this->attributes['fName'] . " " . $this->attributes['lName'];
    }

    public function getStatusSlugAttribute()
    {
        $statusSlug = '';
        $status = $this->attributes['status'] ?? "";
        if (!empty($status)) {
            switch ($status) {
                case 1:
                    $statusSlug = Self::ACTIVE_SLUG;
                    break;
                case 2:
                    $statusSlug = Self::DEACTIVE_SLUG;
                    break;
            }
        }
        return $statusSlug;
    }
}
