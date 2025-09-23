@extends('backend.admin.layout.app')

@section('title', "Add New Gallery")

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.gallery.index') }}" class="text-decoration-none">Gallery</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add New Gallery</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">Add New Gallery</h1>
            </div>
        </div>
    </div>

    <!-- Gallery Form -->
    <div class="mt-4 shadow rounded p-3 bg-white">
        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-3">
                <div class="col-12">
                    <label for="title" class="form-label">Image Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" required autofocus>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 col-lg-3">
                    <label for="images" class="form-label">Select Image</label>
                    <input type="file" name="images[]" id="images" class="form-control @error('images.*') is-invalid @enderror" accept="image/*" required>
                    @error('images.*')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 col-lg-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="1" {{ old('status') === '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 col-lg-3">
                    <label for="start_time" class="form-label">Start Time</label>
                    <input type="date" name="start_time" id="start_time" value="{{ old('start_time') }}" class="form-control @error('start_time') is-invalid @enderror" required>
                    @error('start_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 col-lg-3">
                    <label for="end_time" class="form-label">End Time</label>
                    <input type="date" name="end_time" id="end_time" value="{{ old('end_time') }}" class="form-control @error('end_time') is-invalid @enderror" required>
                    @error('end_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mt-3">
                    <button class="btn btn-primary">Upload Image</button>
                </div>
            </div>
        </form>
    </div>
@endsection
