<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

        $name = 'Без категории';
        $categories[] = [
            'parent_id' => 0,
            'slug' => Str::slug($name),
            'title' => $name,
        ];

        for ($i = 1; $i <= 10; $i++) {
            $name = 'Категория ' . $i;
            $parent_id = ($i > 4) ? rand(1, 4) : 1;

            $categories[] = [
                'parent_id' => $parent_id,
                'slug' => Str::slug($name),
                'title' => $name,
            ];
        }

        DB::table('blog_categories')->insert($categories);
    }
}
