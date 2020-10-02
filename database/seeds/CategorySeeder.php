<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Book;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class,10)->create()
        ->each(function($category)
        {
            $category->book()->saveMany(factory(Book::class, 10)
            ->create(['category_id' => $category->id]));
        });
    }


}
