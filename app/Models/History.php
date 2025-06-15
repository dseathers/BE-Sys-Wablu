<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'trc.vw_transaction_history';
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'issueid',
        'issue_no',
        'title',
        'requestor',
        'acceptor',
        'status',
        'remarks',
        'priority',
        'created_at'
    ];

    protected $casts = [
        'issueid' => 'string',
        'issue_no' => 'string',
        'title' => 'string',
        'requestor' => 'string',
        'acceptor' => 'string',
        'status' => 'string',
        'remarks' => 'string',
        'priority' => 'string',
    ];
}
