@extends('backend.admin.layout.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 row">
        <div class="col-md-9">
            <h1 class="h3 mb-0">Welcome to the Admin Dashboard</h1>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Dashboard card header</h5>
        </div>
        <div class="card-body">
            <h5 class="mb-0">Dashboard card body</h5>
        </div>
    </div>

    {{-- SweetAlert notification --}}
    @include('backend.alert')
@endsection
