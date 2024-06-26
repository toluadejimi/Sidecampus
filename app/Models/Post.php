<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $casts = [
        'likes' => 'integer',
        'comment' => 'integer',
        'user_id' => 'integer',
        'id' => 'integer',

    ];
}
