@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>{{$title}}</h1>
            <div class="card-deck">
                @foreach($brands as $brand)
                    <div class="card">
                        <img src="{{ asset("storage/{$brand->service_slug}_brands/{$brand->brand_image}") }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $brand->brand_name }}</h5>
                            <p class="card-text"></p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('brands.show', $brand->brand_slug) }}">View</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
