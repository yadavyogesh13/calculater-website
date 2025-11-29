<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category', 'author')
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;

        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $postData = [
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'excerpt' => $request->excerpt,
            'category_id' => $request->category_id,
            'author_id' => auth()->id(),
            'status' => $request->status,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'published_at' => $request->status === 'published' ? now() : null,
        ];

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('posts', 'public');
            $postData['featured_image'] = $imagePath;
        }

        Post::create($postData);

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        $postData = [
            'title' => $request->title,
            'content' => $request->content,
            'excerpt' => $request->excerpt,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ];

        if ($request->status === 'published' && !$post->published_at) {
            $postData['published_at'] = now();
        }

        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($post->featured_image) {
                \Storage::disk('public')->delete($post->featured_image);
            }
            
            $imagePath = $request->file('featured_image')->store('posts', 'public');
            $postData['featured_image'] = $imagePath;
        }

        $post->update($postData);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if ($post->featured_image) {
            \Storage::disk('public')->delete($post->featured_image);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }
}