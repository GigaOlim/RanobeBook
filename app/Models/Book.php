<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $guarded = [];

    public function tags() {
        return $this->belongsToMany(Tag::class, 'books_tags');
    }

    public function publisher(){
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }

    public function author(){
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function translator(){
        return $this->belongsTo(User::class, 'translator_id');
    }

    public function volumes(){
        return $this->hasMany(volume::class, 'book_id');
    }


}
