@extends('backend.admin.layout.app')

@section('title', "Edit News")

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.news.index') }}" class="text-decoration-none">News</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit News</li>
            </ol>
        </nav>

        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">Edit News</h1>
            </div>
        </div>
    </div>

    <!-- Edit News Form -->
    <div class="mt-4 shadow rounded p-3 bg-white">
        <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <!-- Title -->
                <div class="col-12">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}" class="form-control @error('title') is-invalid @enderror" required autofocus>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="col-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description', $news->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Image Upload -->
                <div class="col-md-6 col-lg-3">
                    <label for="image" class="form-label">Upload New Image</label>
                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @php
                        $imagePath = $news->image_path ? 'storage/' . $news->image_path : null;
                        $imageExists = $imagePath && file_exists(public_path($imagePath));
                    @endphp

                    <div class="mt-2">
                        @if ($imageExists)
                            <img src="{{ asset($imagePath) }}" alt="Current Image" style="max-width: 120px; height: auto; border-radius: 5px;">
                        @else
                            <span class="text-danger small">No image added.</span>
                        @endif
                    </div>
                </div>

                <!-- Status -->
                <div class="col-md-6 col-lg-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="1" {{ old('status', $news->status) == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $news->status) == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Start Time -->
                <div class="col-md-6 col-lg-3">
                    <label for="start_time" class="form-label">Start Date</label>
                    <input type="date" name="start_time" id="start_time" value="{{ old('start_time', \Carbon\Carbon::parse($news->start_time)->format('Y-m-d')) }}" class="form-control @error('start_time') is-invalid @enderror" required>
                    @error('start_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- End Time -->
                <div class="col-md-6 col-lg-3">
                    <label for="end_time" class="form-label">End Date</label>
                    <input type="date" name="end_time" id="end_time" value="{{ old('end_time', \Carbon\Carbon::parse($news->end_time)->format('Y-m-d')) }}" class="form-control @error('end_time') is-invalid @enderror" required>
                    @error('end_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="col-12 mt-3">
                    <button class="btn btn-primary">Update News</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('footer')
    <script src="{{ asset('assets/js/ckeditor.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            ClassicEditor
                .create(document.querySelector('#description'))
                .then(editor => {
                    const editableElement = editor.ui.view.editable.element;
                    editableElement.style.minHeight = '150px';

                    const form = editor.sourceElement.form;
                    if (form) {
                        form.addEventListener('submit', e => {
                            const data = editor.getData().trim();
                            if (data === '') {
                                e.preventDefault();
                                alert('Description is required.');
                                editor.editing.view.focus();
                            } else {
                                document.querySelector('#description').value = data;
                            }
                        });
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection
