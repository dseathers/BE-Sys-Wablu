<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginInfo extends Model
{
    protected $table = 'public.vw_login_info';
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['team_id' => 'string', 'team_name' => 'string', 'email' => 'string', 'role_id' => 'string', 'role_name' => 'string'];

    protected $casts = [
        'team_id' => 'string',
        'team_name' => 'string',
        'email' => 'string',
        'role_id' => 'string',
        'role_name' => 'string',
        'file_id' => 'string'
    ];
}
