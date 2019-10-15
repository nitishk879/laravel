@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="container">
        <div class="row">
            {{ $title }}
        </div>
        <div class="row">
            @foreach($brands as $brand)
                <div class="col-md-3 col-sm-6 col-12 my-3">
                    <div class="card text-center">
                        <img src="/storage/cars_brands/{{ $brand->brand_image }}" class="card-img-top" alt="{{ $brand->brand_name }}">
                        <div class="card-body">
                            <p class="card-text">{{ $brand->brand_name }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('brands.show', $brand->brand_slug) }}" class="btn btn-block btn-sm btn-danger">View Product</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{--<div class="row">--}}
            {{--<div class="col-md-9 col-md-6 my-3">--}}
                {{--<div class="row">--}}
                    {{--@foreach($items as $item)--}}
                        {{--<div class="col-md-4 col-sm-6 col-12 my-3">--}}
                            {{--<div class="card text-center">--}}
                                {{--<img src="{{ $item->item_image }}" class="card-img-top" alt="{{ $item->item_name }}">--}}
                                {{--<div class="card-body">--}}
                                    {{--<p class="card-text">{{ $item->item_name }}</p>--}}
                                {{--</div>--}}
                                {{--<div class="card-footer">--}}
                                    {{--<a href="{{ route('brands.show', $item->item_slug) }}" class="btn btn-block btn-sm btn-danger">View Product</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
@endsection