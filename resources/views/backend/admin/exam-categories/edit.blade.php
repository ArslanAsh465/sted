@extends('backend.admin.layout.app')

@section('title', 'Edit Exam Category')

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.exam.categories.index') }}" class="text-decoration-none">Exam Categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Exam Category</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">Edit Exam Category</h1>
            </div>
        </div>
    </div>

    <!-- Exam Category Form -->
    <div class="mt-4 shadow rounded p-3 bg-white">
        <form action="{{ route('admin.exam.categories.update', $exam_category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <!-- Name -->
                <div class="col-12">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" name="name" id="name"
                        value="{{ old('name', $exam_category->name) }}"
                        class="form-control @error('name') is-invalid @enderror" required autofocus>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="col-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $exam_category->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status -->
                <div class="col-md-6 col-lg-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status"
                        class="form-select @error('status') is-invalid @enderror" required>
                        <option value="1" {{ old('status', $exam_category->status) == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $exam_category->status) == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit -->
                <div class="col-12 mt-3">
                    <button class="btn btn-primary">Update Exam Category</button>
                </div>
            </div>
        </form>
    </div>
@endsection
