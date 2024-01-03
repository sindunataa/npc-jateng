<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry_number extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'gender',
        'jumlah',
        'match_number_id',
        'classification_id',
        'contingent_id',
        'cabor_id',
        'status_classification',
    ];

    public function cabor() {
        return $this->belongsTo(Cabor::class);
    }

    public function contingent() {
        return $this->belongsTo(Contingent::class);
    }

    public function match_number() {
        return $this->belongsTo(Match_number::class);
    }

    public function classification() {
        return $this->belongsTo(Classification::class);
    }

    public function entry_name() {
        return $this->hasMany(Entry_name::class, 'entry_number_id');
    }
}
