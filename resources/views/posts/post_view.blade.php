@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-8">
                <h1>{{$title}}</h1>
                <div class="card">
                    <div class="card-header">{{$post->title}}</div>
                    <img src="/storage/post_images/{{$post->post_image}}" alt="{{$post->title}}" class="img-fluid"/>
                    <div class="card-body">
                        <h5 class="card-title">{{$post->created_on}}</h5>
                        <p class="card-text">{!! $post->body !!}</p>
                        @if(count($comments) > 0)
                            <ul class="list-group">
                                @foreach( $comments as $comment)
                                    <li class="list-group-item">{{ $comment->comment_title }}</li>
                                @endforeach
                            </ul>
                        @endif
                        @if(!Auth::guest())
                            @if(Auth::user()->id == $post->user_id)
                                <div class="btn btn-group">
                                    <a href="{{action('PostController@edit', $post->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                    <form method="POST" action="{{action('PostController@destroy', $post->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
