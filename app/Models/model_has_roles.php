<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_has_roles extends Model
{
    use HasFactory;
    
    protected $table = 'model_has_roles';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function couriers()
    {
        return $this->hasMany(User::class, 'id', 'model_id');
    }
}
