<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function users() {
        return $this->hasMany(Users::class, 'id', 'country_id');
    }

    public function club() {
        return $this->hasMany(Club::class);
    }
}
