@extends('backend.admin.layout.app')

@section('title', 'News Details')

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.news.index') }}" class="text-decoration-none">News</a></li>
                <li class="breadcrumb-item active" aria-current="page">News Details</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">News Details</h1>
            </div>

            <div class="col-md-3 text-md-end mt-2 mt-md-0">
                <a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-pencil-square me-1"></i> Edit
                </a>
            </div>
        </div>
    </div>

    <!-- News Details Card -->
    <div class="mt-4 shadow rounded p-4 bg-white">
        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Title:</div>
            <div class="col-md-9">{{ $news->title }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Uploaded By:</div>
            <div class="col-md-9">{{ $news->user->username ?? '-' }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Image:</div>
            <div class="col-md-9">
                @if($news->image_path)
                    <img src="{{ asset('storage/' . $news->image_path) }}" alt="News Image" style="max-width: 200px; border-radius: 5px;">
                @else
                    <span class="text-muted">No image uploaded.</span>
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Status:</div>
            <div class="col-md-9">
                @if($news->status === '1')
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-secondary">Inactive</span>
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Start Time:</div>
            <div class="col-md-9">{{ $news->start_time ? \Carbon\Carbon::parse($news->start_time)->format('F d, Y') : '-' }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">End Time:</div>
            <div class="col-md-9">{{ $news->end_time ? \Carbon\Carbon::parse($news->end_time)->format('F d, Y') : '-' }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Created:</div>
            <div class="col-md-9">{{ $news->created_at->diffForHumans() }}</div>
        </div>

        <div class="row">
            <div class="col-md-3 fw-semibold">Description:</div>
            <div class="col-md-9">{!! $news->description !!}</div>
        </div>
    </div>
@endsection
