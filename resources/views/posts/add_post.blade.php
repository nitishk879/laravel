@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$title}}</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label col-form-label-sm">Post Title</label>
                                <div class="col-sm-10">
                                    <input id="title" type="text" name="title" class="@error('title') is-invalid @enderror form-control form-control-sm">
                                    @error('title')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Oops!</strong> {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="body" class="col-sm-2 col-form-label col-form-label-sm">Post Description</label>
                                <div class="col-sm-10">
                                    <textarea id="body" name="body" class="@error('body') is-invalid @enderror form-control form-control-sm"></textarea>
                                    @error('body')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Oops!</strong> {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Upload image</label>
                                <input type="file" class="form-control-file" name="post_image" id="exampleFormControlFile1">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-sm btn-success" >Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
