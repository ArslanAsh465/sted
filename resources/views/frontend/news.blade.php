@extends('frontend.layout.app')

@section('content')
    <!-- Header Section -->
    <section class="d-flex align-items-center justify-content-center text-center" style="height: 70vh;">
        <div class="container">
            <h1 class="display-1">News</h1>
            <p>Explore our latest news</p>
        </div>
    </section>

    <!-- News Section -->
    <section class="py-5">
        <div class="container">
            @if($news->isEmpty())
                <p class="text-center">No news found.</p>
            @else
                <div class="row">
                    @foreach($news as $data)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="ratio ratio-4x3 overflow-hidden">
                                    @if($data->image_path)
                                        <img src="{{ asset('storage/' . $data->image_path) }}" class="w-100 h-100 object-fit-cover" alt="{{ $data->title }}">
                                    @else
                                        <div class="bg-secondary d-flex align-items-center justify-content-center text-white" style="height: 100%;">No Image</div>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data->title }}</h5>
                                    <div class="card-text">
                                        {!! Str::limit($data->description, 150) !!}
                                        {{-- Optional: use {!! $data->description !!} to show full rich text --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
