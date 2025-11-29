<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function blog()
    {
        // Fetch all published posts from database with their category
        $blogs = Post::where('status', 'published')
            ->with('category', 'author')
            ->orderBy('published_at', 'desc')
            ->get()
            ->map(function ($post) {
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'excerpt' => $post->excerpt,
                    'image' => $post->featured_image ? asset('storage/' . $post->featured_image) : 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                    'category' => $post->category->name ?? 'General',
                    'read_time' => ceil(str_word_count($post->content) / 200) . ' min read',
                    'date' => $post->published_at->format('Y-m-d'),
                    'slug' => $post->slug,
                    'content' => $post->content,
                    'author' => $post->author->name ?? 'Unknown'
                ];
            });

        // Also fetch the latest published post to feature separately
        $latestPost = Post::where('status', 'published')
            ->with('category', 'author')
            ->orderBy('published_at', 'desc')
            ->first();

        $latest = null;
        if ($latestPost) {
            $latest = [
                'id' => $latestPost->id,
                'title' => $latestPost->title,
                'excerpt' => $latestPost->excerpt,
                'image' => $latestPost->featured_image ? asset('storage/' . $latestPost->featured_image) : 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'category' => $latestPost->category->name ?? 'General',
                'read_time' => ceil(str_word_count($latestPost->content) / 200) . ' min read',
                'date' => $latestPost->published_at->format('Y-m-d'),
                'slug' => $latestPost->slug,
                'content' => $latestPost->content,
                'author' => $latestPost->author->name ?? 'Unknown'
            ];
        }

        return view('pages.blog.blog', compact('blogs', 'latest'));
    }

    public function show($slug)
    {
        // Fetch the specific blog post by slug
        $blog = Post::where('slug', $slug)
            ->where('status', 'published')
            ->with('category', 'author')
            ->firstOrFail();

        $blogData = [
            'id' => $blog->id,
            'title' => $blog->title,
            'excerpt' => $blog->excerpt,
            'image' => $blog->featured_image ? asset('storage/' . $blog->featured_image) : 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'category' => $blog->category->name ?? 'General',
            'read_time' => ceil(str_word_count($blog->content) / 200) . ' min read',
            'date' => $blog->published_at->format('Y-m-d'),
            'slug' => $blog->slug,
            'content' => $blog->content,
            'author' => $blog->author->name ?? 'Unknown'
        ];

        return view('pages.blog.show', compact('blogData'));
    }
}