@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(count($posts) > 0)
                    <ul class="list-group list-group-flush">
                        @foreach($posts as $post)
                            <a href="posts/{{ $post->id }}" class="list-group-item list-group-item-action mb-3 shadow">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1 text-primary">{{ $post->title }}</h5>
                                    <small>{{ $post->created_at }}</small>
                                </div>
                                <p class="mb-1"><img src="/storage/post_images/{{ $post->post_image }}" alt="{{ $post->title }}" width="120px"/> {{ $post->body }}</p>
                                <b>By</b>: <span class="text-primary">{{ $post->user->name }}</span>
                            </a>
                        @endforeach
                    </ul>
                @else
                    <p>Sorry! no post found! </p>
                @endif
            </div>
        </div>
    </div>
@endsection
