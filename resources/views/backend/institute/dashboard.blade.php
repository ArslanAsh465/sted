@extends('backend.institute.layout.app')

@section('title', 'Institute Dashboard')

@section('content')
    <h1>Welcome to the Institute Dashboard</h1>

    {{-- SweetAlert notification --}}
    @include('backend.alert')
@endsection
