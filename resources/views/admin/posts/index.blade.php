@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Posts Management</h1>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Create New Post
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($posts->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Published At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>
                                <strong>{{ Str::limit($post->title, 60) }}</strong>
                                <br>
                                <small class="text-muted">{{ $post->slug }}</small>
                            </td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->author->name }}</td>
                            <td>
                                <span class="badge bg-{{ $post->status === 'published' ? 'success' : 'warning' }}">
                                    {{ ucfirst($post->status) }}
                                </span>
                            </td>
                            <td>
                                @if($post->published_at)
                                    {{ $post->published_at->format('M d, Y') }}
                                @else
                                    <span class="text-muted">Not published</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.posts.edit', $post) }}" 
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.posts.delete', $post) }}" method="POST" 
                                          class="d-inline" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
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
                <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                <h4>No posts found</h4>
                <p class="text-muted">Get started by creating your first blog post.</p>
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Create Your First Post
                </a>
            </div>
        @endif
    </div>
</div>
@endsection