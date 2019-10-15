@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{$title}}</h1>
                <h1>{{ $service->service_id }}</h1>
                <h1>{{ $service->service_name }}</h1>
                <img src="{{ $service->service_banner }}" alt="{{ $service->service_name }}" class="img-fluid" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>Brands are shown below</h2>
            </div>
            @foreach($brands as $brand)
                <div class="col-md-3 col-sm-6 col-12 my-3">
                    <div class="card text-center">
                        <img src="{{ asset("storage/{$service->service_slug}_brands/{$brand->brand_image}") }}" class="card-img-top" alt="{{ $brand->brand_name }}">
                        <div class="card-body">
                            <p class="card-text">{{ $brand->brand_name }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('brands.show', $brand->brand_slug) }}" class="btn btn-block btn-sm btn-danger">View Product</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-3 col-sm-6 col-12 my-3">
                <div class="card text-center">
                    <img src="/storage/cars_brands/" class="card-img-top" alt="Select Dataset">
                    <div class="card-body">
                        <p class="card-text">Select Dataset</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>Segments are shown below</h2>
            </div>
            @foreach($segments as $segment)
                <div class="col-md-3 col-sm-6 col-12 my-3">
                    <div class="card text-center">
                        <img src="{{ $segment->segment_image }}" class="card-img-top" alt="{{ $segment->segment_name }}">
                        <div class="card-body">
                            <p class="card-text">{{ $segment->segment_name }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('segments.index') }}" class="btn btn-block btn-sm btn-danger">View Product</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-3 col-sm-6 col-12 my-3">
                <div class="card text-center">
                    <img src="select Data" class="card-img-top" alt="select Data">
                    <div class="card-body">
                        <p class="card-text">select Data</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
