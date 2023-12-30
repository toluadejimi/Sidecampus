<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyPlan extends Model
{
    use HasFactory;


    protected $fillable = [
        'status',
        'subscribe_at',
        'days_remaining',
        'expires_at'
    ];


    protected $casts = [

        'status' => 'integer',
        'days_remaining' => 'integer',

    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
