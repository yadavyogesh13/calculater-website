@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Category</h1>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Categories
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name *</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name') }}" required
                               placeholder="Enter category name">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="4" 
                                  placeholder="Enter category description (optional)">{{ old('description') }}</textarea>
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
                                                {{ old('parent_id') == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Select parent category if this is a subcategory.</div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <h6 class="card-title">Quick Info</h6>
                            <ul class="list-unstyled small text-muted">
                                <li><i class="fas fa-info-circle me-1"></i> Category name must be unique</li>
                                <li><i class="fas fa-info-circle me-1"></i> Slug will be auto-generated</li>
                                <li><i class="fas fa-info-circle me-1"></i> You can create subcategories later</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Create Category
                </button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Auto-generate slug from name
    document.getElementById('name').addEventListener('input', function() {
        const name = this.value;
        // You can add slug preview here if needed
    });
</script>
@endpush