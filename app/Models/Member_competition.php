<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member_competition extends Model
{
    use HasFactory;

    public $table = 'member_competitions';

    public function member()
    {
        return $this->belongsToMany(Member::class);
    }
}
