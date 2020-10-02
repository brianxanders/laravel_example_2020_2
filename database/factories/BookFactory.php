<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->title,
        'description' => $faker->paragraph(15),
        'isbn' => $faker->isbn13,
        'category_id' => Category::all()->random()->id


    ];
});
