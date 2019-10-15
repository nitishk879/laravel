@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-md-9 text-center">
                <h1>{{$title}}</h1>
                <p>This is home section for the page</p>
            </div>
        </div>
    </div>
@endsection
