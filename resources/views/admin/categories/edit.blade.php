@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Category</h1>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Categories
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name *</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name', $category->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="4">{{ old('description', $category->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">Category Settings</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="parent_id" class="form-label">Parent Category</label>
                                <select class="form-select @error('parent_id') is-invalid @enderror" 
                                        id="parent_id" name="parent_id">
                                    <option value="">No Parent (Root Category)</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" 
                                                {{ old('parent_id', $category->parent_id) == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <h6 class="card-title">Category Information</h6>
                            <ul class="list-unstyled small">
                                <li><strong>Slug:</strong> <code>{{ $category->slug }}</code></li>
                                <li><strong>Total Posts:</strong> 
                                    <span class="badge bg-primary">{{ $category->posts_count }}</span>
                                </li>
                                <li><strong>Subcategories:</strong> 
                                    <span class="badge bg-info">{{ $category->children->count() }}</span>
                                </li>
                                <li><strong>Created:</strong> {{ $category->created_at->format('M d, Y') }}</li>
                                <li><strong>Last Updated:</strong> {{ $category->updated_at->format('M d, Y') }}</li>
                            </ul>
                        </div>
                    </div>

                    @if($category->posts_count > 0)
                    <div class="card mt-3 border-warning">
                        <div class="card-body">
                            <h6 class="card-title text-warning">
                                <i class="fas fa-exclamation-triangle me-1"></i>Important
                            </h6>
                            <p class="small text-muted mb-0">
                                This category has {{ $category->posts_count }} posts. 
                                You cannot delete it until all posts are moved to another category.
                            </p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Update Category
                </button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
                
                @if($category->posts_count == 0 && $category->children->count() == 0)
                <button type="button" class="btn btn-danger float-end" 
                        onclick="if(confirm('Are you sure you want to delete this category?')) { document.getElementById('delete-form').submit(); }">
                    <i class="fas fa-trash me-2"></i>Delete Category
                </button>
                @endif
            </div>
        </form>

        @if($category->posts_count == 0 && $category->children->count() == 0)
        <form id="delete-form" action="{{ route('admin.categories.delete', $category) }}" method="POST" class="d-none">
            @csrf
            @method('DELETE')
        </form>
        @endif
    </div>
</div>
@endsection