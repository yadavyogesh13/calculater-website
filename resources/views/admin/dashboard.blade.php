@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>

<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $stats['total_posts'] }}</h4>
                        <p>Total Posts</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-newspaper fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-success">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $stats['published_posts'] }}</h4>
                        <p>Published</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-check-circle fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $stats['draft_posts'] }}</h4>
                        <p>Drafts</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-edit fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-info">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $stats['total_categories'] }}</h4>
                        <p>Categories</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-folder fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Recent Posts</h5>
            </div>
            <div class="card-body">
                @if($recent_posts->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recent_posts as $post)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.posts.edit', $post) }}">
                                            {{ Str::limit($post->title, 50) }}
                                        </a>
                                    </td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>
                                        <span class="badge bg-{{ $post->status === 'published' ? 'success' : 'warning' }}">
                                            {{ ucfirst($post->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $post->created_at->format('M d, Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted">No posts found.</p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Create New Post
                    </a>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-list me-2"></i>View All Posts
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection