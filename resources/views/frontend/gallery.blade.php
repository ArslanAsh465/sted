@extends('frontend.layout.app')

@section('content')
    <!-- Header Section -->
    <section class="d-flex align-items-center justify-content-center text-center" style="height: 70vh;">
        <div class="container">
            <h1 class="display-1">Gallery</h1>
            <p>Explore our latest images</p>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-5">
        <div class="container">
            @if($galleries->isEmpty())
                <p class="text-center">No gallery images found.</p>
            @else
                <div class="row">
                    @foreach($galleries as $gallery)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="ratio ratio-4x3 overflow-hidden">
                                    <img src="{{ asset('storage/' . $gallery->image_path) }}" class="w-100 h-100 object-fit-cover" alt="{{ $gallery->title }}">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $gallery->title }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
