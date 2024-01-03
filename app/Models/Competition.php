<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'match_number_id',
        'type',
        'gender',
        'classification',

    ];

    public function match_number()
    {
        return $this->belongsTo(Match_number::class);
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'competition_id');
    }

    public function member()
    {
        return $this->belongsToMany(Member::class, 'member_competitions')->withPivot('medal');;
    }



}
