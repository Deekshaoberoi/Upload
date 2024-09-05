<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'upload_file_id',
        'field1',
        'field2',
        'field3',
        'field4',
    ];

    protected $attributes = [
        'field1' => 'default_value',
    ];
}
