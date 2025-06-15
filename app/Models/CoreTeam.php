<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoreTeam extends Model
{
    protected $table = 'core.team';
    protected $primaryKey = 'team_id';
    public $incrementing = true; 
    public $timestamps = false; 

    protected $fillable = [
        'team_name',
        'email',
        'role_id',
    ];
}
