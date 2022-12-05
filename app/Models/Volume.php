<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volume extends Model
{
    use HasFactory;
    public $guarded = [];


    public function chapters(){
        return $this->hasMany(Chapter::class);
    }

    public function book() {
        return $this->belongsTo(Book::class);
    }
}
