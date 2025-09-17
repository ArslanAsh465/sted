@extends('frontend.layout.app')

@section('content')
    <!-- Header Section -->
    <section class="d-flex align-items-center justify-content-center text-center" style="height: 70vh;">
        <div class="container">
            <h1 class="display-1">Downloads</h1>
            <p>Explore our latest downloadable files</p>
        </div>
    </section>

    <!-- Downloads Section -->
    <section class="py-5">
        <div class="container">
            @if($downloads->isEmpty())
                <p class="text-center">No downloads found.</p>
            @else
                <div class="row">
                    @foreach($downloads as $item)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                    <p class="card-text flex-grow-1">
                                        {!! Str::limit($item->description, 150) !!}
                                    </p>
                                    <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank" class="btn btn-primary mt-auto">
                                        <i class="bi bi-download"></i> Download
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
