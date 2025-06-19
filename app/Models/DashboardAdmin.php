<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DashboardAdmin extends Model
{
    protected $table = 'trc.vw_dashboard_admin_summary';
    protected $primaryKey = null;
    public $increment = false;
    public $timestamp = false;

    protected $fillable = ['status_name','actual_issue_count'];
    protected $casts =[
        'status_name' => 'string',
        'actual_issue_count' => 'string'
    ];
}
