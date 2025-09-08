@extends('backend.teacher.layout.app')

@section('title', 'Teacher Dashboard')

@section('content')
    <h1>Welcome to the Teacher Dashboard</h1>

    {{-- SweetAlert notification --}}
    @include('backend.alert')
@endsection
