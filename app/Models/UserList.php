<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    protected $table = 'core.vw_user';
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'team_id',
        'team_name',
        'email',
        'role_name',
    ];

    protected $casts =[
        'team_id' => 'string',
        'team_name' => 'string',
        'email' => 'string',
        'role_name' => 'string',
        'role_id' => 'string',
        'file_id' => 'string'
    ];
}
