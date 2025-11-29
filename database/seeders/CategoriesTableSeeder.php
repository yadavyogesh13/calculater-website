<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'description' => 'Articles about web development technologies and frameworks'
            ],
            [
                'name' => 'Laravel',
                'slug' => 'laravel',
                'description' => 'Laravel PHP framework tutorials and tips'
            ],
            [
                'name' => 'JavaScript',
                'slug' => 'javascript',
                'description' => 'JavaScript programming language articles'
            ],
            [
                'name' => 'Vue.js',
                'slug' => 'vue-js',
                'description' => 'Vue.js framework tutorials and examples'
            ],
            [
                'name' => 'CSS & HTML',
                'slug' => 'css-html',
                'description' => 'Frontend development with CSS and HTML'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}