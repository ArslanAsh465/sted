@extends('backend.moderator.layout.app')

@section('title', 'Moderator Dashboard')

@section('content')
    <h1>Welcome to the Moderator Dashboard</h1>

    {{-- SweetAlert notification --}}
    @include('backend.alert')
@endsection
