<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = ['name' => 'News'];
        $category1 = ['name' => 'Lifestyle'];
        $category2 = ['name' => 'Fresh'];

        \App\Category::create($category);
        \App\Category::create($category1);
        \App\Category::create($category2);
    }
}
