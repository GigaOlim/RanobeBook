<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function users() {
        return $this->hasOne(User::class, 'id', 'id');
    }

    public function club() {
        return $this->hasOne(Club::class, 'id', 'club_id');
    }

    public function status() {
        return $this->hasOne(StatusPlayers::class, 'id', 'status_id');
    }

    public function agent() {
        return $this->hasOne(Agent::class, 'id', 'agent_id');
    }
}
