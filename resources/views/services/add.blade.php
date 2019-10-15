@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$title}}</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('services.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="service_name" class="col-sm-2 col-form-label col-form-label-sm">Service Name</label>
                                <div class="col-sm-10">
                                    <input id="service_name" type="text" name="service_name" class="@error('service_name') is-invalid @enderror form-control form-control-sm">
                                    @error('service_name')
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
                                    <input type="file" name="service_banner" class="custom-file-input" id="service_banner">
                                    <label class="custom-file-label" for="service_banner">Service Banner</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="service_slider1" class="custom-file-input" id="service_slider1">
                                    <label class="custom-file-label" for="service_slider1">Service Slider 1</label>
                                </div>

                                <div class="custom-file">
                                    <input type="file" name="service_slider2" class="custom-file-input" id="service_slider2">
                                    <label class="custom-file-label" for="service_slider2">Service Slider 2</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="slider_sm_1" class="custom-file-input" id="slider_sm_1">
                                    <label class="custom-file-label" for="slider_sm_1">Slider SM 1</label>
                                </div>

                                <div class="custom-file">
                                    <input type="file" name="slider_sm_2" class="custom-file-input" id="slider_sm_2">
                                    <label class="custom-file-label" for="slider_sm_2">Slider SM 2</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="service_active" name="service_status" value="1" class="custom-control-input">
                                    <label class="custom-control-label" for="service_active">Active</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="service_deactive" name="service_status" value="0" class="custom-control-input">
                                    <label class="custom-control-label" for="service_deactive">De-Active</label>
                                </div>
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
