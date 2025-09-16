@extends('backend.admin.layout.app')

@section('title', "Institutes Data")

@section('content')
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 row">
        <div class="col-md-9">
            <h1 class="h3 mb-0">Institutes Data</h1>
        </div>

        <div class="col-md-3 text-md-end">
            <a href="{{ route('admin.institutes.create') }}" class="btn btn-primary">
                Add New Institute
            </a>
        </div>
    </div>

    <!-- Institutes Table -->
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">List of Institutes</h5>
        </div>

        <div class="card-body">
            @if($institutes->isEmpty())
                <p>No institutes found.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Institute Name</th>
                                <th>Principal Name</th>
                                <th>Email</th>
                                <th>Mobile No</th>
                                <th>Whatsapp No</th>
                                <th>Registration No</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($institutes as $institute)
                                <tr>
                                    <td>{{ $institute->id }}</td>
                                    <td>{{ $institute->institute->name }}</td>
                                    <td>{{ $institute->institute->principal_name }}</td>
                                    <td>{{ $institute->email }}</td>
                                    <td>{{ $institute->institute->mobile_no }}</td>
                                    <td>{{ $institute->institute->whatsapp_no }}</td>
                                    <td>{{ $institute->institute->registration_number }}</td>
                                    <td>
                                        <a href="{{ route('admin.institutes.edit', $institute->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                        <form action="{{ route('admin.institutes.destroy', $institute->id) }}" method="POST" style="display:inline-block;" class="delete-institute-form">
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
            document.querySelectorAll('.delete-institute-form').forEach(function(form) {
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
