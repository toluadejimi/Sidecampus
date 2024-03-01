<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    protected $casts = [
        'likes' => 'integer',
        'user_id' => 'integer',
        'post_id' => 'integer',
        'id' => 'integer',

    ];
}
