<?php

namespace App\Models;

use App\Models\Media;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cause extends Model
{
    use HasFactory, SoftDeletes;

    const ON = 1;
    const OFF = 0;

    const CAUSE_FEATURE_IMAGE_PATH = 'cause/feature/images';

    const CAUSE_IMAGES_MEDIA_FIELD_NAME = 'cause-images';
    const CAUSE_DOCUMENTS_MEDIA_FIELD_NAME = 'cause-documents';

    const CAUSE_IMAGES_PATH = 'cause/images';

    const CAUSE_DOCUMENTS_PATH = 'cause/documents';

    protected $guarded = ['id'];

    protected $appends = [
        'file_url',
        'file_path'
    ];

    // To get file main path
    public function getFilePathAttribute()
    {
        $driver = env('FILESYSTEM_DISK') ?? 'local';
        $file = $this->file ?? null;
        $filePath =  NULL;

        if (!empty($file)) {

            $filePath =  self::CAUSE_FEATURE_IMAGE_PATH . "/" . $file;
        }
        return $filePath;
    }

    // To get file main url
    public function getFileUrlAttribute()
    {
        $driver = env('FILESYSTEM_DISK') ?? 'local';
        $filePath = $this->file_path ?? null;
        $file = $this->file ?? null;
        $fileUrl = NULL;

        if (!empty($file)) {

            if (!is_null($filePath)) {
                if (Storage::disk($driver)->exists($filePath)) {
                    $fileUrl = Storage::url($filePath);
                }
            }
        }

        return $fileUrl;
    }

    public function causeImages()
    {
        return $this->morphMany(Media::class, 'mediable', 'media_type', 'media_id')
            ->where('media.field_name', self::CAUSE_IMAGES_MEDIA_FIELD_NAME);
    }
    public function causeDocuments()
    {
        return $this->morphMany(Media::class, 'mediable', 'media_type', 'media_id')
            ->where('media.field_name', self::CAUSE_DOCUMENTS_MEDIA_FIELD_NAME);
    }
    public function causePatient()
    {
        return $this->belongsTo(CausePatient::class,'id','cause_id');
    }
    public function causeCategory()
    {
        return $this->hasOne(CauseCategory::class,'id','category_id')->select('id','category');
    }
    public function causeSubCategory()
    {
        return $this->hasOne(CauseSubCategory::class,'id','sub_category_id');
    }

    public function Campaigner(){
        return $this->hasOne(User::class,'id','added_by');
    }

    function getdonatedamount(){
        return $this->hasMany(Payment::class,'cause_id','id');
    }

}
