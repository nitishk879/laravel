@extends('layouts.app')

@section('content')
    <div class="container-fluid py-3">
        <div class="row">
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Dashboard</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                                @if(count($posts) > 0)
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $posts as $post)
                                            <tr>
                                                <td></td>
                                                <td>{{ $post->title }}</td>
                                                <td><a href="{{action('PostController@edit', $post->id)}}" class="btn btn-sm btn-primary">Edit</a></td>
                                                <td>
                                                    <form method="POST" action="{{action('PostController@destroy', $post->id)}}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            <p class="py-3"><a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary"> Create New Post</a> </p>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
