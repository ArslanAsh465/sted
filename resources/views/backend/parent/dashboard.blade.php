@extends('backend.parent.layout.app')

@section('title', 'Parent Dashboard')

@section('content')
    <h1>Welcome to the Admin Dashboard</h1>

    {{-- SweetAlert notification --}}
    @include('backend.alert')
@endsection
