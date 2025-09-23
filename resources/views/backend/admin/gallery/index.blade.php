@extends('backend.admin.layout.app')

@section('title', 'Gallery')

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gallery</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">Gallery</h1>
            </div>

            <div class="col-md-3 text-md-end mt-2 mt-md-0">
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-sm btn-primary" Title="Add New Gallery Image">
                    <i class="bi bi-plus-circle me-1"></i> Add
                </a>
            </div>
        </div>
    </div>

    <!-- Gallery Table -->
    <div class="mt-4 shadow rounded p-3 bg-white">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Upload by</th>
                        <th class="d-none d-lg-table-cell">Image</th>
                        <th>Status</th>
                        <th class="d-none d-lg-table-cell">Start Time</th>
                        <th class="d-none d-lg-table-cell">End Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($galleries as $gallery)
                        <tr>
                            <td>{{ $gallery->title }}</td>
                            <td>{{ $gallery->user->username }}</td>
                            <td class="d-none d-lg-table-cell">
                                @if($gallery->image_path)
                                    <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="Gallery Image" style="width: 100px; height: auto;">
                                @else
                                    <span>-</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ $gallery->status === '1' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $gallery->status === '1' ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="d-none d-lg-table-cell">{{ \Carbon\Carbon::parse($gallery->start_time)->format('M d, Y') }}</td>
                            <td class="d-none d-lg-table-cell">{{ \Carbon\Carbon::parse($gallery->end_time)->format('M d, Y') }}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end align-items-center gap-2">
                                    <a href="{{ route('admin.gallery.show', $gallery->id) }}" class="text-secondary" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a href="{{ route('admin.gallery.edit', $gallery->id) }}" class="text-primary" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST" class="delete-gallery-form" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button  class="btn p-0 border-0 bg-transparent text-danger" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No gallery images found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- SweetAlert notification --}}
    @include('backend.alert')
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.delete-gallery-form').forEach(function (form) {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "This image will be deleted permanently.",
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
