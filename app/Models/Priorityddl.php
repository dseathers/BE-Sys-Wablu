<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Priorityddl extends Model
{
    protected $table = 'stg.vw_ddl_priority';
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'priority_id',
        'priority_name',
    ];

    protected $cast = [
        'priority_id' => 'string',
        'priority_name' => 'string',
    ];
}
