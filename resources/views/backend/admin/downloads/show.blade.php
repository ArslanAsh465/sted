@extends('backend.admin.layout.app')

@section('title', 'Download File Details')

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.downloads.index') }}" class="text-decoration-none">Download Files</a></li>
                <li class="breadcrumb-item active" aria-current="page">Download File Details</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">Download File Details</h1>
            </div>

            <div class="col-md-3 text-md-end mt-2 mt-md-0">
                <a href="{{ route('admin.downloads.edit', $download->id) }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-pencil-square me-1"></i> Edit
                </a>
            </div>
        </div>
    </div>

    <!-- File Details Card -->
    <div class="mt-4 shadow rounded p-4 bg-white">
        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">File Title:</div>
            <div class="col-md-9">{{ $download->title }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Uploaded By:</div>
            <div class="col-md-9">{{ $download->user->username ?? 'N/A' }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Status:</div>
            <div class="col-md-9">
                <span class="badge {{ $download->status === '1' ? 'bg-success' : 'bg-secondary' }}">
                    {{ $download->status === '1' ? 'Active' : 'Inactive' }}
                </span>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">Start Time:</div>
            <div class="col-md-9">{{ \Carbon\Carbon::parse($download->start_time)->format('M d, Y') }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">End Time:</div>
            <div class="col-md-9">{{ \Carbon\Carbon::parse($download->end_time)->format('M d, Y') }}</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 fw-semibold">File:</div>
            <div class="col-md-9">
                @if($download->file_path)
                    <a href="{{ asset('storage/' . $download->file_path) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-download me-1"></i> Download File
                    </a>
                @else
                    <span class="text-danger small">No file available.</span>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 fw-semibold">Description:</div>
            <div class="col-md-9">{!! $download->description !!}</div>
        </div>
    </div>
@endsection
