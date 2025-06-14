<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QaDdl extends Model
{
    protected $table = 'stg.vw_ddl_qa';
    protected $primaryKey = null;
    public $increment = false;
    public $timestamp = false;

    protected $fillable = ['team_id','team_name', 'email', 'role_id', 'role_name'];
    protected $casts =[
        'team_id' => 'string',
        'team_name' => 'string',
        'email' => 'string',
        'role_id' => 'string',
        'role_name' => 'string'
    ];
}
