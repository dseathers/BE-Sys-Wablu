<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransRequestor extends Model
{
    protected $table = 'trc.vw_transaction_by_requestor';
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'issueid',
        'issue_no',
        'title',
        'requestor',
        'requestor_id',
        'acceptor',
        'acceptor_id',
        'status',
        'status_id',
        'priority',
        'priority_id',
        'created_by',
        'created_by_id'
    ];

    protected $casts =[
        'id'=>'string',
        'issueid'=>'string',
        'issue_no'=>'string',
        'title'=>'string',
        'requestor'=>'string',
        'requestor_id'=>'string',
        'acceptor'=>'string',
        'acceptor_id'=>'string',
        'status'=>'string',
        'status_id'=>'string',
        'priority'=>'string',
        'priority_id'=>'string',
        'created_by'=>'string',
        'created_by_id'=>'string'
    ];
}
