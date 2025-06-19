<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllUserRoleDdl extends Model
{
    protected $table = 'stg.vw_ddl_user_role';
    protected $primaryKey = null;
    public $increment = false;
    public $timestamp = false;

    protected $fillable = ['name', 'email', 'role_id', 'role_name'];
    protected $casts =[
        'name' => 'string',
        'email' => 'string',
        'role_id' => 'string',
        'role_name' => 'string'
    ];
}
