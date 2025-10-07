@extends('backend.admin.layout.app')

@section('title', 'Edit Exam')

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.exams.index') }}" class="text-decoration-none">Exams</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Exam</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">Edit Exam</h1>
            </div>
        </div>
    </div>

    <!-- Exam Edit Form -->
    <div class="mt-4 shadow rounded p-3 bg-white">
        <form action="{{ route('admin.exams.update', $exam->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <!-- Exam Name -->
                <div class="col-12">
                    <label for="name" class="form-label">Exam Name</label>
                    <input type="text" name="name" id="name"
                        value="{{ old('name', $exam->name) }}"
                        class="form-control @error('name') is-invalid @enderror" required autofocus>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Exam Category -->
                <div class="col-md-6 col-lg-4">
                    <label for="exam_category_id" class="form-label">Exam Category</label>
                    <select name="exam_category_id" id="exam_category_id"
                        class="form-select @error('exam_category_id') is-invalid @enderror" required>
                        <option value="">-- Select Category --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('exam_category_id', $exam->exam_category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('exam_category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Class -->
                <div class="col-md-6 col-lg-4">
                    <label for="class_id" class="form-label">Class</label>
                    <select name="class_id" id="class_id"
                        class="form-select @error('class_id') is-invalid @enderror" required>
                        <option value="">-- Select Class --</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}"
                                {{ old('class_id', $exam->class_id) == $class->id ? 'selected' : '' }}>
                                {{ $class->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('class_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Fee -->
                <div class="col-md-6 col-lg-4">
                    <label for="fee" class="form-label">Exam Fee (in Rs)</label>
                    <input type="number" name="fee" id="fee"
                        value="{{ old('fee', $exam->fee) }}"
                        class="form-control @error('fee') is-invalid @enderror" required min="0">
                    @error('fee')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Date -->
                <div class="col-md-6 col-lg-4">
                    <label for="date" class="form-label">Exam Date</label>
                    <input type="date" name="date" id="date"
                        value="{{ old('date', \Carbon\Carbon::parse($exam->date)->format('Y-m-d')) }}"
                        class="form-control @error('date') is-invalid @enderror" required>
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status -->
                <div class="col-md-6 col-lg-4">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status"
                        class="form-select @error('status') is-invalid @enderror" required>
                        <option value="1" {{ old('status', $exam->status) == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $exam->status) == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="col-12">
                    <label for="description" class="form-label">Exam Description</label>
                    <textarea name="description" id="description"
                        class="form-control @error('description') is-invalid @enderror"
                        rows="4" required>{{ old('description', $exam->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Centers -->
                <div class="col-12">
                    <label for="centers" class="form-label">Select Centers</label>
                    <select name="centers[]" id="centers"
                        class="form-select @error('centers') is-invalid @enderror"
                        multiple required>
                        @foreach($centers as $center)
                            <option value="{{ $center->id }}"
                                {{ in_array($center->id, old('centers', $exam->centers->pluck('id')->toArray())) ? 'selected' : '' }}>
                                {{ $center->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('centers')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="col-12 mt-3">
                    <button class="btn btn-primary">Update Exam</button>
                </div>
            </div>
        </form>
    </div>
@endsection
