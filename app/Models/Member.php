<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid', 
        'name', 
        'nik',
        'peserta',
        'status',
        'place_of_birth',
        'date_of_birth',
        'address',
        'type',
        'gender',
        'category',
        'npci_daerah',
        'contingent_id',
        'cabor_id',
        'wheelchair',
        'file_ktp',
        'file_foto',
        'file_pendukung',
    ];
    public function match_number()
    {
        return $this->belongsToMany(Match_number::class, 'member_match_number');
    }
    public function cabor()
    {
        return $this->belongsTo(Cabor::class);
    }
    public function contingent()
    {
        return $this->belongsTo(Contingent::class);
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($q) {
            $q->uuid = Uuid::uuid4();
        });
    }
    public function competition()
    {
        return $this->belongsToMany(Competition::class, 'member_competitions')->withPivot('medal');
    }

    public function member_competition()
    {
        return $this->belongsToMany(Member_competition::class);
    }
    
    public function gold()
    {
        return $this->hasMany(Member_competition::class);
    }
    public function silver()
    {
        return $this->hasMany(Member_competition::class);
    }
    public function bronze()
    {
        return $this->hasMany(Member_competition::class);
    }
    
    // public function silver()
    // {
    //     return $this->hasMany(Competition::class, 'member_competitions')->withPivot('medal');
    // }
    
    // public function bronze()
    // {
    //     return $this->belongsToMany(Competition::class, 'member_competitions')->withPivot('medal');
    // }
    
}
