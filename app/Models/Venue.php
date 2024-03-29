<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'slug',
        'excerpt',
        'status',
        'content',
        'image',
    ];

    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'venue_id');
    }
}
