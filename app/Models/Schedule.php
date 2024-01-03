<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'competition_id', 
        'venue_id',
        'cabor_id',
        'title',
        'date',
        'time',
        'content',
    ];

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
    public function cabor()
    {
        return $this->belongsTo(Cabor::class);
    }
}
