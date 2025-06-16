<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocPhotos extends Model
{
    protected $table = 'doc.file_management';
    protected $primaryKey = 'file_id';
    public $incrementing = true; 
    public $timestamps = false;

    protected $fillable = [
        'file_name',
        'path',
    ];

    protected $casts = [
        'file_id' => 'string',
    ];
}
