<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function deal() {
        return $this->hasMany(Deal::class);
    }

    public function playes() {
        return $this->hasMany(Players::class, 'club_id', 'id');
    }

    public function country() {
        return $this->hasOne(Countries::class, 'id', 'country_id');
    }
}
