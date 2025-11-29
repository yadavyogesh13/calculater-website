<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_posts' => Post::count(),
            'published_posts' => Post::where('status', 'published')->count(),
            'draft_posts' => Post::where('status', 'draft')->count(),
            'total_categories' => Category::count(),
        ];

        $recent_posts = Post::with('category')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_posts'));
    }
}