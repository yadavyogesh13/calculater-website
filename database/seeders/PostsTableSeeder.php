<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        // ------------------------------------------------------------
        // Default Author
        // ------------------------------------------------------------
        $author = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
            ]
        );

        // ------------------------------------------------------------
        // Categories
        // ------------------------------------------------------------
        $webDev = Category::firstOrCreate(
            ['slug' => 'web-development'],
            ['name' => 'Web Development', 'description' => 'Web development tutorials and articles']
        );

        $laravel = Category::firstOrCreate(
            ['slug' => 'laravel'],
            ['name' => 'Laravel', 'description' => 'Laravel framework resources']
        );

        $javascript = Category::firstOrCreate(
            ['slug' => 'javascript'],
            ['name' => 'JavaScript', 'description' => 'JavaScript programming tutorials']
        );

        // ------------------------------------------------------------
        // Posts List (11 Posts)
        // ------------------------------------------------------------
        $posts = [

            // #1
            [
                'title' => 'Getting Started with Laravel',
                'slug' => 'getting-started-with-laravel',
                'excerpt' => 'Learn the basics of Laravel framework and build your first application.',
                'content' => 'Laravel is a web application framework with expressive, elegant syntax.',
                'featured_image' => 'laravel-banner.jpg',
                'status' => 'published',
                'author_id' => $author->id,
                'category_id' => $laravel->id,
                'published_at' => now()->subDays(5),
                'meta_title' => 'Laravel Tutorial - Complete Beginner Guide',
                'meta_description' => 'Learn Laravel PHP framework from scratch.',
                'meta_keywords' => 'laravel, php, framework, web development, tutorial'
            ],

            // #2
            [
                'title' => 'Laravel 11 REST API Tutorial with Sanctum',
                'slug' => 'laravel-11-rest-api-tutorial',
                'excerpt' => 'Build a secure REST API in Laravel 11 using Sanctum authentication.',
                'content' => 'In this tutorial, we cover CRUD, authentication, and best API practices.',
                'featured_image' => 'laravel-api.jpg',
                'status' => 'published',
                'author_id' => $author->id,
                'category_id' => $laravel->id,
                'published_at' => now()->subDays(3),
                'meta_title' => 'Laravel 11 API Tutorial',
                'meta_description' => 'Complete guide to building REST APIs in Laravel 11.',
                'meta_keywords' => 'laravel api, sanctum, laravel 11, rest api'
            ],

            // #3
            [
                'title' => 'Blade vs React: Which One Should You Use?',
                'slug' => 'blade-vs-react',
                'excerpt' => 'Choose between Laravel Blade templates or React frontend development.',
                'content' => 'Both Blade and React have strong use cases depending on your project.',
                'featured_image' => 'blade-vs-react.jpg',
                'status' => 'published',
                'author_id' => $author->id,
                'category_id' => $webDev->id,
                'published_at' => now()->subDays(10),
                'meta_title' => 'Blade vs React Comparison',
                'meta_description' => 'Understand the differences between Blade and React.',
                'meta_keywords' => 'blade, react, laravel frontend, web development'
            ],

            // #4
            [
                'title' => 'JavaScript ES2024 Features You Should Know',
                'slug' => 'javascript-es2024-features',
                'excerpt' => 'Explore the latest additions to JavaScript ES2024 for modern coding.',
                'content' => 'ES2024 brings new syntax improvements, performance upgrades, and more.',
                'featured_image' => 'javascript-2024.jpg',
                'status' => 'published',
                'author_id' => $author->id,
                'category_id' => $javascript->id,
                'published_at' => now()->subDays(1),
                'meta_title' => 'JavaScript ES2024 Features',
                'meta_description' => 'Learn new JavaScript ES2024 updates and features.',
                'meta_keywords' => 'javascript, es2024, js updates, new js features'
            ],

            // #5
            [
                'title' => 'Top 10 VS Code Extensions every Developer Must Install',
                'slug' => 'best-vscode-extensions-2024',
                'excerpt' => 'Boost your productivity with these essential VS Code extensions.',
                'content' => 'Extensions like Prettier, Live Server, GitLens and more are discussed.',
                'featured_image' => 'vscode-extensions.jpg',
                'status' => 'published',
                'author_id' => $author->id,
                'category_id' => $webDev->id,
                'published_at' => now()->subDays(7),
                'meta_title' => 'Best VS Code Extensions 2024',
                'meta_description' => 'Improve workflow using popular VS Code plugins.',
                'meta_keywords' => 'vscode, extensions, developer tools'
            ],

            // #6
            [
                'title' => 'How to Use Laravel Queues for Background Jobs',
                'slug' => 'laravel-queues-background-jobs',
                'excerpt' => 'Learn how to run slow tasks in the background using Laravel queues.',
                'content' => 'Queues improve performance by offloading heavy CPU or network work.',
                'featured_image' => 'laravel-queue.jpg',
                'status' => 'published',
                'author_id' => $author->id,
                'category_id' => $laravel->id,
                'published_at' => now()->subDays(12),
                'meta_title' => 'Laravel Queue Tutorial',
                'meta_description' => 'Master Laravel queues and background jobs.',
                'meta_keywords' => 'laravel queues, jobs, background tasks'
            ],

            // #7
            [
                'title' => 'How to Optimize MySQL Queries for Large Projects',
                'slug' => 'optimize-mysql-queries',
                'excerpt' => 'Improve MySQL performance using indexing, caching, and query tuning.',
                'content' => 'MySQL optimization is important for high-traffic applications.',
                'featured_image' => 'mysql-performance.jpg',
                'status' => 'published',
                'author_id' => $author->id,
                'category_id' => $webDev->id,
                'published_at' => now()->subDays(9),
                'meta_title' => 'Optimize MySQL Queries',
                'meta_description' => 'Guide to improving MySQL database performance.',
                'meta_keywords' => 'mysql, indexing, query optimization'
            ],

            // #8
            [
                'title' => 'JavaScript Async/Await Complete Guide',
                'slug' => 'javascript-async-await-guide',
                'excerpt' => 'Understand async programming with promises and async/await.',
                'content' => 'Async/await makes asynchronous JavaScript easier to write.',
                'featured_image' => 'js-async-await.jpg',
                'status' => 'published',
                'author_id' => $author->id,
                'category_id' => $javascript->id,
                'published_at' => now()->subDays(6),
                'meta_title' => 'Async/Await Guide',
                'meta_description' => 'Learn JavaScript async/await with examples.',
                'meta_keywords' => 'async await, javascript promises'
            ],

            // #9
            [
                'title' => 'Laravel File Upload Tutorial with Validation',
                'slug' => 'laravel-file-upload-tutorial',
                'excerpt' => 'Learn how to upload and validate files in Laravel with best practices.',
                'content' => 'Covers file validation, storage, public access and file security.',
                'featured_image' => 'file-upload.jpg',
                'status' => 'published',
                'author_id' => $author->id,
                'category_id' => $laravel->id,
                'published_at' => now()->subDays(2),
                'meta_title' => 'Laravel File Upload Guide',
                'meta_description' => 'Upload files securely in Laravel.',
                'meta_keywords' => 'laravel upload, file upload laravel'
            ],

            // #10
            [
                'title' => 'How CSS Flexbox Works – Beginner to Advanced',
                'slug' => 'css-flexbox-complete-guide',
                'excerpt' => 'Master CSS Flexbox layout system with examples.',
                'content' => 'Flexbox helps build responsive layouts with clean and easy CSS.',
                'featured_image' => 'css-flexbox.jpg',
                'status' => 'published',
                'author_id' => $author->id,
                'category_id' => $webDev->id,
                'published_at' => now()->subDays(4),
                'meta_title' => 'CSS Flexbox Guide',
                'meta_description' => 'Learn CSS flexbox layout with examples.',
                'meta_keywords' => 'css, flexbox, responsive design'
            ],

            // #11
            [
                'title' => 'JavaScript DOM Manipulation Tutorial',
                'slug' => 'javascript-dom-manipulation',
                'excerpt' => 'Learn how to update HTML elements using the JavaScript DOM.',
                'content' => 'DOM manipulation is essential for interactive websites.',
                'featured_image' => 'js-dom.jpg',
                'status' => 'published',
                'author_id' => $author->id,
                'category_id' => $javascript->id,
                'published_at' => now()->subDays(8),
                'meta_title' => 'DOM Manipulation Tutorial',
                'meta_description' => 'Complete beginner-friendly DOM guide.',
                'meta_keywords' => 'javascript dom, javascript tutorials'
            ],
        ];

        // ------------------------------------------------------------
        // Create Posts Without Duplicates
        // ------------------------------------------------------------
        foreach ($posts as $post) {
            Post::firstOrCreate(['slug' => $post['slug']], $post);
        }
    }
}
