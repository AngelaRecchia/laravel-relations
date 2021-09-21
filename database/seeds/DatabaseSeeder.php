<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Category;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
     $this->call([
         PostsTableSeeder::class,
         CategoriesTableSeeder::class
     ]);
    }
    
}
