<?php

namespace App\Repositories\Eloquent;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadFile 
{
    public function store(UploadedFile $file, string $path): string
    {
        return $file->store($path,  ['disk' => 'public']);
    }

    public function removeFile(string $filePath): bool
    {
        if (Storage::exists($filePath)) {
            return Storage::delete($filePath);
        }

        return true;
    }
}