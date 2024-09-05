<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileService
{
    public function store($file)
    {
        return $file->store('uploads', 'public');
    }


    public function getUrl($path) 
    {
        return Storage::url($path);
    }
}
