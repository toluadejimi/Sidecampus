<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
        'author',
        'category',
        'pdf',
        'audio',
        'images',
        'pdf_size'

    ];



    protected $casts = [

        'reads' => 'integer',
        'rating' => 'integer',

    ];
}
