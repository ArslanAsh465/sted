@extends('backend.admin.layout.app')

@section('title', 'Download Files')

@section('content')
    <!-- Page Header -->
    <div class="mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Download Files</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">Download Files</h1>
            </div>

            <div class="col-md-3 text-md-end">
                <a href="{{ route('admin.downloads.create') }}" class="btn btn-primary" Title="Add New Download File">
                    Add
                    <i class="bi bi-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Downloads Table -->
    <div class="mt-4 shadow-lg">
        @if($downloads->isEmpty())
            <p>No download files found.</p>
        @else
            <div class="table-responsive p-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Uploaded by</th>
                            <th>File</th>
                            <th>Status</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($downloads as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->user->username }}</td>
                                <td>
                                    <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank" class="text-primary" title="Download {{ $item->title }}">
                                        <i class="bi bi-download"></i>
                                    </a>
                                </td>
                                <td>
                                    <span class="badge {{ $item->status === '1' ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $item->status === '1' ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->start_time)->format('M d, Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->end_time)->format('M d, Y') }}</td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end align-items-center gap-2">
                                        <a href="{{ route('admin.downloads.show', $item->id) }}" class="text-secondary" title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <a href="{{ route('admin.downloads.edit', $item->id) }}" class="text-primary" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('admin.downloads.destroy', $item->id) }}" method="POST" class="delete-download-form d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button  class="btn p-0 border-0 bg-transparent text-danger" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    {{-- SweetAlert notification --}}
    @include('backend.alert')
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.delete-download-form').forEach(function (form) {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "This file will be deleted permanently.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
