<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('posts')
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:categories,name',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $counter = 1;

        while (Category::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'parent_id' => $request->parent_id
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        $categories = Category::where('id', '!=', $category->id)->get();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'parent_id' => $request->parent_id
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        // Check if category has posts
        if ($category->posts()->count() > 0) {
            return redirect()->back()
                ->with('error', 'Cannot delete category that has posts. Please reassign posts first.');
        }

        // Check if category has subcategories
        if ($category->children()->count() > 0) {
            return redirect()->back()
                ->with('error', 'Cannot delete category that has subcategories. Please delete subcategories first.');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}