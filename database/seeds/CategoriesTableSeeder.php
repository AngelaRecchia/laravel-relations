<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Category::all() as $cat) {
            $cat->delete();
        }

        $cats = ['Book Review', 'Article', 'News', 'Movie Review', 'Opinion', 'Inspirational', 'Flow'];

        foreach($cats as $cat) {
            $newCat = new Category();
            $newCat->name = $cat;
            $newCat->slug = Str::slug($cat, '-');
            $newCat->save();
        }
    }
}
