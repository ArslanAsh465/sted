@extends('backend.student.layout.app')

@section('title', 'Student Dashboard')

@section('content')
    <h1>Welcome to the Student Dashboard</h1>

    {{-- SweetAlert notification --}}
    @include('backend.alert')
@endsection
