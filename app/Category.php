<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;

class Category extends Model
{

    public $table = 'categories';
    protected $fillable = ['name'];
    public function book() {
        return $this->hasMany(Book::class);
    }

    public function Books()
    {
        return $this->hasMany(Book::class);
    }

}


