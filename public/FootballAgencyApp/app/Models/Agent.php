<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user() {
        return $this->hasOne(User::class, 'id', 'id');
    }

    public function player() {
        return $this->hasMany(Players::class, 'agent_id', 'id');
    }
}
