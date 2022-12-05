<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function users() {
        return $this->hasOne(Users::class);
    }

    public function status() {
        return $this->hasOne(DealStatus::class);
    }

    public function club() {
        return $this->hasOne(Clubs::class);
    }
}
