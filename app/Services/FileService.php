<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileService
{
    public function store($file)
    {
        return $file->store('uploads', 'public');
    }


    public function getUrl($path) // Method for retrieving file URL
    {
        return Storage::url($path);
    }
}
