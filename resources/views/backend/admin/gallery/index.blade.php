@extends('backend.admin.layout.app')

@section('title', 'Gallery')

@section('content')
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 row">
        <div class="col-md-9">
            <h1 class="h3 mb-0">Gallery</h1>
        </div>

        <div class="col-md-3 text-md-end">
            <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
                Add New Gallery
            </a>
        </div>
    </div>

    <!-- Gallery Table -->
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Uploaded Images</h5>
        </div>

        <div class="card-body">
            @if($galleries->isEmpty())
                <p>No gallery images found.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Upload by</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($galleries as $gallery)
                                <tr>
                                    <td>{{ $gallery->id }}</td>
                                    <td>{{ $gallery->title }}</td>
                                    <td>{{ $gallery->user->username }}</td>
                                    <td>
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
                                    <td>{{ \Carbon\Carbon::parse($gallery->start_time)->format('M d, Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($gallery->end_time)->format('M d, Y') }}</td>
                                    <td>
                                        {{-- No edit for images (per your setup) --}}
                                        <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST" class="delete-gallery-form" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
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
