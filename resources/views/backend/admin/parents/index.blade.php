@extends('backend.admin.layout.app')

@section('title', "Parents Data")

@section('content')
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 row">
        <div class="col-md-9">
            <h1 class="h3 mb-0">Parents Data</h1>
        </div>

        <div class="col-md-3 text-md-end">
            <a href="{{ route('admin.parents.create') }}" class="btn btn-primary">
                Add New Parent
            </a>
        </div>
    </div>

    <!-- Parents Table -->
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">List of Parents</h5>
        </div>

        <div class="card-body">
            @if($parents->isEmpty())
                <p>No parents found.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>SPID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($parents as $parent)
                                <tr>
                                    <td>{{ $parent->id }}</td>
                                    <td>{{ $parent->parent->spid }}</td>
                                    <td>{{ $parent->parent->first_name ?? '-' }}</td>
                                    <td>{{ $parent->parent->last_name ?? '-' }}</td>
                                    <td>{{ $parent->email }}</td>
                                    <td>{{ $parent->parent->phone ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('admin.parents.edit', $parent->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                        <form action="{{ route('admin.parents.destroy', $parent->id) }}" method="POST" style="display:inline-block;" class="delete-parent-form">
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
            document.querySelectorAll('.delete-parent-form').forEach(function(form) {
                form.addEventListener('submit', function(e) {
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
