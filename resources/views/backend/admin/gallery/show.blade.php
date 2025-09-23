@extends('backend.admin.layout.app')

@section('title', 'Gallery Details')

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.gallery.index') }}" class="text-decoration-none">Gallery</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gallery Details</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">Gallery Details</h1>
            </div>

            <div class="col-md-3 text-md-end mt-2 mt-md-0">
                <a href="{{ route('admin.gallery.edit', $gallery->id) }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-pencil-square me-1"></i> Edit
                </a>
            </div>
        </div>
    </div>

    <!-- Gallery Details Card -->
    <div class="mt-4 shadow rounded p-4 bg-white">
        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Gallery Image Title:</div>
            <div class="col-md-9">{{ $gallery->title }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Uploaded By:</div>
            <div class="col-md-9">{{ $gallery->user->username }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Status:</div>
            <div class="col-md-9">
                <span class="badge {{ $gallery->status === '1' ? 'bg-success' : 'bg-secondary' }}">
                    {{ $gallery->status === '1' ? 'Active' : 'Inactive' }}
                </span>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Start Time:</div>
            <div class="col-md-9">{{ \Carbon\Carbon::parse($gallery->start_time)->format('M d, Y') }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">End Time:</div>
            <div class="col-md-9">{{ \Carbon\Carbon::parse($gallery->end_time)->format('M d, Y') }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Gallery Image:</div>
            <div class="col-md-9">
                @if($gallery->image_path)
                    <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="Gallery Image" class="img-fluid rounded shadow" style="max-height: 300px;">
                @else
                    <div class="text-muted fst-italic">No image uploaded.</div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 fw-semibold">Description:</div>
            <div class="col-md-9">{!! $gallery->description !!}</div>
        </div>
    </div>
@endsection
