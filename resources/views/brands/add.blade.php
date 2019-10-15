@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$title}}</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('brands.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="brand_name" class="col-sm-2 col-form-label col-form-label-sm">Brand Name</label>
                                <div class="col-sm-10">
                                    <input id="brand_name" type="text" name="brand_name" class="@error('brand_name') is-invalid @enderror form-control form-control-sm">
                                    @error('brand_name')
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
                                <div class="custom-file">
                                    <input type="file" name="brand_image" class="custom-file-input" id="brand_image">
                                    <label class="custom-file-label" for="brand_image">Brand Image</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="custom-select" name="service_id">
                                    <option selected>Select Service</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->service_id }}">{{ $service->service_name }}</option>
                                    @endforeach
                                </select>
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
