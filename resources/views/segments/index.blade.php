@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>{{$title}}</h1>
            </div>
            @foreach($segments as $segment)
                <div class="col-md-3 card">
                    <img src="{{ asset("storage/segments/{$segment->segment_image}") }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $segment->segment_name }}</h5>
                        <p class="card-text"></p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('segments.show', $segment->segment_slug) }}">View</a>
                    </div>
                </div>
            @endforeach

            <div class="col-md-12 pt-3">
                <a href="{{ route("segments.create") }}" class="btn btn-primary">Create New</a>
            </div>
        </div>
    </div>
@endsection
