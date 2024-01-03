<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'slug',

    ];

    public function classification() {
        return $this->hasMany(Classification::class, 'cabor_id');
    }

    public function member() {
        return $this->hasMany(Member::class, 'cabor_id');
    }

    public function entry_number() {
        return $this->hasMany(Entry_number::class, 'cabor_id');
    }

    public function match_number() {
        return $this->hasMany(Match_number::class, 'cabor_id');
    }
    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'cabor_id');
    }
}
