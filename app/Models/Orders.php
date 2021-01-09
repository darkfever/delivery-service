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

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function operator()
    {
        return $this->belongsTo(User::class, 'operator_id');
    }

    public function courier()
    {
        return $this->belongsTo(User::class, 'courier_id');
    }
}
