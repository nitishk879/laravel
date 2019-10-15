@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1>{{$title}}</h1>
                <div class="list-group">
                    @foreach($services as $service)
                        <a href="service/{{ $service->service_slug }}" class="list-group-item list-group-item-action">
                            {{ $service->service_name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
