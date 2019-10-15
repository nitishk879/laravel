@extends('layouts.header')

@section('title', 'Page Title')

@section('content')
    <h1>{{$title}}</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $service->service_name }}</h1>
                <img src="{{ $service->service_image }}" alt="{{ $service->service_name }}" class="img-fluid" />
            </div>
        </div>
    </div>
@endsection
