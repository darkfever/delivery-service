<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'operator_id',
        'courier_id',
        'from',
        'to',
        'preference',
        'size',
        'weight',
        'status',
        'processing_time',
        'execute_time',
        'recipient_contacts',
        'sum',
        'approximate_time'
    ];
}
