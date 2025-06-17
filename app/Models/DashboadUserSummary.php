<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DashboadUserSummary extends Model
{
    protected $table = 'trc.vw_dashboard_user_summary';
    protected $primaryKey = null;
    public $increment = false;
    public $timestamp = false;

    protected $fillable = ['role_name','summary'];
    protected $casts =[
        'role_name' => 'string',
        'summary' => 'string'
    ];
}
