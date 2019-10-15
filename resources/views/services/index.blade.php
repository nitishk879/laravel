@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-deck pt-3">
                @foreach($services as $service)
                    <div class="card">
                        <img src="{{ asset("storage/service_banners/{$service->service_banner}") }}" class="card-img-top" alt="{{ $service->service_name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $service->service_name }}</h5>
                            <p class="card-text"></p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('services.show', $service->service_slug ) }}" class="card-link">Card link</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
