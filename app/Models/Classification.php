<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'cabor_id',
        'type',
    ];

    public function cabor() {
        return $this->belongsTo(Cabor::class);
    }

    public function entry_number() {
        return $this->hasMany(Entry_number::class, 'classification_id');
    }

    public function match_number()
    {
        return $this->hasMany(Match_number::class, 'classification_id');
    }
}
