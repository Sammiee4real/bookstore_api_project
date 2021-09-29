<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'laravel_through_key'
    ];

    public function book(){
       return $this->hasManyThrough(
            '\App\Models\Author',
            '\App\Models\BookAuthor',
            'author_id',
            'id',
            'id',
            'book_id'
        );
    }
}
