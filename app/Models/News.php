<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class news extends Model
{
    
    use HasFactory;
    

    protected $fillable = [
        'title', 
        'slug',
        'excerpt',
        'status',
        'content',
        'image',
        'published_at',
    ];

}
