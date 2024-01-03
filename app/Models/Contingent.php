<?php

namespace App\Models;

use App\Http\Controllers\ContingentEntryNumberController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contingent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'kota',
        'user_id',
        'image',

    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function member() {
        return $this->hasMany(Member::class, 'contingent_id');
    }

    public function entry_number() {
        return $this->hasMany(Entry_number::class, 'contingent_id');
    }

    public function nonkuota() {
        return $this->hasMany(member::class, 'contingent_id');
    }

    public function atlet() {
        return $this->hasMany(member::class, 'contingent_id');
    }
    
    public function official() {
        return $this->hasMany(member::class, 'contingent_id');
    }

    public function gold()
    {
        return $this->hasMany(Member::class, 'contingent_id');
    }
    
    public function silver()
    {
        return $this->hasMany(Member::class, 'contingent_id');
    }
    
    public function bronze()
    {
        return $this->hasMany(Member::class, 'contingent_id');
    }




}
