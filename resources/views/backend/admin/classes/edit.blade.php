@extends('backend.admin.layout.app')

@section('title', 'Edit Class')

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.classes.index') }}" class="text-decoration-none">Classes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Class</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">Edit Class</h1>
            </div>
        </div>
    </div>

    <!-- Class Form -->
    <div class="mt-4 shadow rounded p-3 bg-white">
        <form action="{{ route('admin.classes.update', $class->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-12">
                    <label for="name" class="form-label">Class Name</label>
                    <input type="text" name="name" id="name"
                        value="{{ old('name', $class->name) }}"
                        class="form-control @error('name') is-invalid @enderror" required autofocus>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $class->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 col-lg-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status"
                        class="form-select @error('status') is-invalid @enderror" required>
                        <option value="1" {{ old('status', $class->status) == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $class->status) == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mt-3">
                    <button class="btn btn-primary">Update Class</button>
                </div>
            </div>
        </form>
    </div>
@endsection
