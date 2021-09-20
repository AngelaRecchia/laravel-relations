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
        $cats = ['music', 'cinema', 'art', 'living', 'work', 'travel', 'food', 'diy'];

        foreach($cats as $cat) {
            $newCat = new Category();
            $newCat->name = $cat;
            $newCat->slug = Str::slug($cat, '-');
            $newCat->save();
        }
    }
}
