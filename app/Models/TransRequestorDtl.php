<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransRequestorDtl extends Model
{
    protected $table = 'trc.vw_transaction_by_requestor_dtl';
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'issueid',
        'title',
        'requestor',
        'requestor_id',
        'acceptor',
        'acceptor_id',
        'content',
        'remarks',
        'status',
        'priority',
        'created_by',
        'created_by_id'
    ];

    protected $casts =[
        'issueid'=>'string',
        'title'=>'string',
        'requestor'=>'string',
        'requestor_id'=>'string',
        'acceptor'=>'string',
        'acceptor_id'=>'string',
        'content'=>'string',
        'remarks'=>'string',
        'status'=>'string',
        'priority'=>'string',
        'created_by'=>'string',
        'created_by_id'=>'string'
    ];
}
