@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>{{ $brand_heading }}</h1>
            </div>
            @foreach($brands as $brand)
                <div class="col-md-4 col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            {{ $brand->brand_name }}
                        </div>
                        <div class="card-body">
                            <img src="{{ $brand->brand_image }}" alt="{{ $brand->slug }}" class="img-fluid" />
                            <a href="{{ $brand->brand_slug }}" class="btn btn-primary">View Product</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
