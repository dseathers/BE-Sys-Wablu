<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statusddl extends Model
{
    protected $table = 'stg.vw_ddl_status';
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'status_id',
        'status_name',
    ];

    protected $cast = [
        'status_id' => 'string',
        'status_name' => 'string',
    ];
}
