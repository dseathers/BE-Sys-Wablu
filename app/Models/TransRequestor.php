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
        'issueid',
        'title',
        'requestor',
        'requestor_id',
        'acceptor',
        'acceptor_id',
        'status',
        'priority',
    ];

    protected $casts =[
        'issueid'=>'string',
        'title'=>'string',
        'requestor'=>'string',
        'requestor_id'=>'string',
        'acceptor'=>'string',
        'acceptor_id'=>'string',
        'status'=>'string',
        'priority'=>'string',
    ];
}
