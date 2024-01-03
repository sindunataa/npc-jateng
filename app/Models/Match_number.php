<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match_number extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description',
        'cabor_id',
        'type',
        'gender',
        'classification_id',
    ];

    public function cabor()
    {
        return $this->belongsTo(Cabor::class);
    }

    public function entry_number()
    {
        return $this->hasMany(Entry_number::class, 'match_number_id');
    }

    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }
    public function member()
    {
        return $this->belongsToMany(Member::class, 'member_match_number');
    }
    public function competition()
    {
        return $this->hasMany(Competition::class, 'match_number_id');
    }
}
