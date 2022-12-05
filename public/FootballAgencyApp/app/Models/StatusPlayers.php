<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPlayers extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function player() {
        return $this->hasMany(Players::class, 'status_id', 'id');
    }
}
