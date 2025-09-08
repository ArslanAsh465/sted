@extends('backend.admin.layout.app')

@section('title', 'Admin Dashboard')

@section('content')
    <h1>Welcome to the Admin Dashboard</h1>

    {{-- SweetAlert notification --}}
    @include('backend.alert')
@endsection
