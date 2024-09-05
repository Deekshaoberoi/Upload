<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload_Files extends Model
{
    protected $table = 'upload_files';

    protected $fillable = [
        'user_id',
        'file_name',
        'file_path',
        'file_size',
    ];

    use HasFactory;
    
    public function records()
    {
        return $this->hasMany(Record::class, 'upload_file_id');
    }
}
