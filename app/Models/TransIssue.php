<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransIssue extends Model
{
    protected $table = 'trc.issue';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'issueid',
        'requestor',
        'acceptor',
        'status',
        'content',
        'path',
        'remarks',
        'priority_id',
        'created_at',
        'created_by'
    ];

    protected $casts =[
        'id'=>'string'
    ];
}
