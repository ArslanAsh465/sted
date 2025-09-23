@extends('backend.admin.layout.app')

@section('title', 'Parents')

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Parents</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">Parents</h1>
            </div>

            <div class="col-md-3 text-md-end mt-2 mt-md-0">
                <a href="{{ route('admin.parents.create') }}" class="btn btn-sm btn-primary" title="Add New Parent">
                    <i class="bi bi-plus-circle me-1"></i> Add
                </a>
            </div>
        </div>
    </div>

    <!-- Parents Table -->
    <div class="mt-4 shadow rounded p-3 bg-white">
        @if($parents->isEmpty())
            <p class="mb-0">No parents found.</p>
        @else
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>SPID</th>
                            <th>First Name</th>
                            <th class="d-none d-lg-table-cell">Last Name</th>
                            <th class="d-none d-lg-table-cell">Email</th>
                            <th class="d-none d-lg-table-cell">Phone</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($parents as $parent)
                            <tr>
                                <td>{{ $parent->id }}</td>
                                <td>{{ $parent->parent->spid ?? '-' }}</td>
                                <td>{{ $parent->parent->first_name ?? '-' }}</td>
                                <td class="d-none d-lg-table-cell">{{ $parent->parent->last_name ?? '-' }}</td>
                                <td class="d-none d-lg-table-cell">{{ $parent->email }}</td>
                                <td class="d-none d-lg-table-cell">{{ $parent->parent->phone ?? '-' }}</td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end align-items-center gap-2">
                                        <a href="{{ route('admin.parents.show', $parent->id) }}" class="text-secondary" title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <a href="{{ route('admin.parents.edit', $parent->id) }}" class="text-primary" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('admin.parents.destroy', $parent->id) }}" method="POST" class="delete-parent-form d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn p-0 border-0 bg-transparent text-danger" title="Delete">
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

@section('footer')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.delete-parent-form').forEach(function (form) {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "This action cannot be undone!",
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
