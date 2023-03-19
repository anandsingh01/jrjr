<?php

namespace App\Service;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class FileUploadService
{
    public function uploadFile($file, $path, $driver = null)
    {
        if (is_null($driver)) {
            $driver = env('FILESYSTEM_DISK');
        }

        if (!Storage::disk($driver)->exists($path)) {
            Storage::disk($driver)->makeDirectory($path);
        }

        $uploadedFile = $file->storeAs(
            $path,
            $file->getClientOriginalName(),
            $driver
        );

        return $uploadedFile;
    }
}
