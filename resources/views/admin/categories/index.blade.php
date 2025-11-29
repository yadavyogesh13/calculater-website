@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Categories Management</h1>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Create New Category
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($categories->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Parent Category</th>
                            <th>Posts Count</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>
                                <strong>{{ $category->name }}</strong>
                                @if($category->children->count() > 0)
                                    <span class="badge bg-info ms-1">
                                        {{ $category->children->count() }} sub
                                    </span>
                                @endif
                            </td>
                            <td>
                                <code>{{ $category->slug }}</code>
                            </td>
                            <td>
                                @if($category->parent)
                                    <span class="badge bg-secondary">{{ $category->parent->name }}</span>
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-primary">{{ $category->posts_count }}</span>
                            </td>
                            <td>
                                @if($category->description)
                                    {{ Str::limit($category->description, 50) }}
                                @else
                                    <span class="text-muted">No description</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.categories.edit', $category) }}" 
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.categories.delete', $category) }}" method="POST" 
                                          class="d-inline" onsubmit="return confirm('Are you sure you want to delete this category?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                                {{ $category->posts_count > 0 ? 'disabled' : '' }}>
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-4">
                <i class="fas fa-folder fa-3x text-muted mb-3"></i>
                <h4>No categories found</h4>
                <p class="text-muted">Get started by creating your first category.</p>
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Create Your First Category
                </a>
            </div>
        @endif
    </div>
</div>
@endsection