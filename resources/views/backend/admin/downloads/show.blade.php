@extends('backend.admin.layout.app')

@section('title', 'Download File Details')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 row">
        <div class="col-md-9">
            <h1 class="h3 mb-0">Download File Details</h1>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">{{ $download->title }}</h5>
        </div>
        <div class="card-body">
            <p><strong>Description:</strong></p>
            <div>{!! $download->description !!}</div>

            <hr>

            <p><strong>Uploaded by:</strong> {{ $download->user->username ?? 'N/A' }}</p>
            <p><strong>Status:</strong> 
                <span class="badge {{ $download->status === '1' ? 'bg-success' : 'bg-secondary' }}">
                    {{ $download->status === '1' ? 'Active' : 'Inactive' }}
                </span>
            </p>

            <p><strong>Start Time:</strong> {{ \Carbon\Carbon::parse($download->start_time)->format('M d, Y') }}</p>
            <p><strong>End Time:</strong> {{ \Carbon\Carbon::parse($download->end_time)->format('M d, Y') }}</p>

            <hr>

            <p><strong>File:</strong></p>
            @if($download->file_path)
                <a href="{{ asset('storage/' . $download->file_path) }}" target="_blank" class="btn btn-primary">
                    Download File
                </a>
            @else
                <p class="text-muted">No file available.</p>
            @endif
        </div>
    </div>
@endsection
