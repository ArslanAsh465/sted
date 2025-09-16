@extends('backend.admin.layout.app')

@section('title', 'News')

@section('content')
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 row">
        <div class="col-md-9">
            <h1 class="h3 mb-0">News</h1>
        </div>

        <div class="col-md-3 text-md-end">
            <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
                Add New News
            </a>
        </div>
    </div>

    <!-- News Table -->
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Uploaded News</h5>
        </div>

        <div class="card-body">
            @if($news->isEmpty())
                <p>No news found.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Uploaded by</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($news as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->user->username }}</td>
                                    <td>
                                        @if($item->image_path)
                                            <img src="{{ asset('storage/' . $item->image_path) }}" alt="News Image" style="width: 100px; height: auto;">
                                        @else
                                            <span>-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge {{ $item->status === '1' ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $item->status === '1' ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>{{ $item->start_time ? \Carbon\Carbon::parse($item->start_time)->format('M d, Y') : '-' }}</td>
                                    <td>{{ $item->end_time ? \Carbon\Carbon::parse($item->end_time)->format('M d, Y') : '-' }}</td>
                                    <td>
                                        <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" class="delete-news-form" style="display:inline-block;">
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
            document.querySelectorAll('.delete-news-form').forEach(function (form) {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "This news will be deleted permanently.",
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
