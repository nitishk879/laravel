@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1>{{$title}}</h1>
                <div class="list-group">
                    @foreach($items as $item)
                        <a href="services/{{ $item->item_slug }}" class="list-group-item list-group-item-action">
                            {{ $item->item_name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
