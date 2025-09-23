@extends('backend.admin.layout.app')

@section('title', 'News')

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">News</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">News</h1>
            </div>

            <div class="col-md-3 text-md-end mt-2 mt-md-0">
                <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-primary" Title="Add New News">
                    <i class="bi bi-plus-circle me-1"></i> Add
                </a>
            </div>
        </div>
    </div>

    <!-- News Table -->
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
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($news as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->user->username ?? '-' }}</td>
                            <td class="d-none d-lg-table-cell">
                                @if($item->image_path)
                                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="News Image" style="width: 100px; height: auto; border-radius: 5px;">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ $item->status === '1' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $item->status === '1' ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                {{ $item->start_time ? \Carbon\Carbon::parse($item->start_time)->format('M d, Y') : '-' }}
                            </td>
                            <td class="d-none d-lg-table-cell">
                                {{ $item->end_time ? \Carbon\Carbon::parse($item->end_time)->format('M d, Y') : '-' }}
                            </td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end align-items-center gap-2">
                                    <a href="{{ route('admin.news.show', $item->id) }}" class="text-secondary" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a href="{{ route('admin.news.edit', $item->id) }}" class="text-primary" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" class="delete-news-form d-inline">
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
                            <td colspan="7" class="text-center text-muted">No news found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- SweetAlert notification --}}
    @include('backend.alert')
@endsection

@section('footer')
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
