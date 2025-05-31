<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'stg.vw_role'; 
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['role_id', 'role_name'];

    protected $casts = [
        'role_id' => 'string',
    ];
}
