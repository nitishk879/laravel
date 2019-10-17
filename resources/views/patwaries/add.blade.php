@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{$title}}</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('patwari.store')}}">
                            @csrf
                            <div class="form-row pb-3">
                                <div class="col-md-6">
                                    <label for="first_pref">First Preference</label>
                                    <select class="custom-select" id="first_pref" name="first_pref">
                                        <option value="Mohal" selected>Mohal</option>
                                        <option value="Settlement">Settlement</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="second_pref">Second Preference</label>
                                    <select class="custom-select" id="second_pref" name="second_pref">
                                        <option value="Settlement" selected>Settlement</option>
                                        <option value="Mohal">Mohal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row pb-3">
                                <div class="col-md-6">
                                    <div class="row">
                                        <label for="serial_number" class="col-sm-4 col-form-label col-form-label-sm">Serial Number</label>
                                        <div class="col-sm-8">
                                            <input id="serial_number" type="text" name="serial_number" class="@error('serial_number') is-invalid @enderror form-control form-control-sm">
                                            @error('serial_number')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Oops!</strong> {{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label for="candidate_name" class="col-sm-6 col-form-label col-form-label-sm">Candidate Name</label>
                                        <div class="col-sm-6">
                                            <input id="candidate_name" type="text" name="candidate_name" class="@error('candidate_name') is-invalid @enderror form-control form-control-sm">
                                            @error('candidate_name')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Oops!</strong> {{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row pb-3">
                                <div class="col-md-6">
                                    <div class="row">
                                        <label for="father_name" class="col-sm-6 col-form-label col-form-label-sm">Father Name</label>
                                        <div class="col-sm-6">
                                            <input id="father_name" type="text" name="father_name" class="@error('father_name') is-invalid @enderror form-control form-control-sm">
                                            @error('father_name')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Oops!</strong> {{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label for="dob" class="col-sm-6 col-form-label col-form-label-sm">Date of Birth</label>
                                        <div class="col-sm-6">
                                            <input id="dob" type="text" name="dob" class="@error('dob') is-invalid @enderror form-control form-control-sm">
                                            @error('dob')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Oops!</strong> {{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row pb-3">
                                <div class="col-md-6">
                                    <div class="row">
                                        <label for="district" class="col-sm-6 col-form-label col-form-label-sm">District</label>
                                        <div class="col-sm-6">
                                            <input id="district" type="text" value="Shimla" name="district" class="@error('district') is-invalid @enderror form-control form-control-sm">
                                            @error('district')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Oops!</strong> {{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label for="sub_district" class="col-sm-6 col-form-label col-form-label-sm">Sub Division</label>
                                        <div class="col-sm-6">
                                            <input id="sub_district" type="text" value="Shimla" name="sub_district" class="@error('sub_district') is-invalid @enderror form-control form-control-sm">
                                            @error('sub_district')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Oops!</strong> {{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row pb-3">
                                <div class="col-md-4">
                                    <label for="edu_qualification">Edu. Qualification</label>
                                    <select id="edu_qualification" class="custom-select" name="edu_qualification">
                                        <option value="12" selected>12th</option>
                                        <option value="BBA">BBA</option>
                                        <option value="MBA">MBA</option>
                                        <option value="BCA">BCA</option>
                                        <option value="Graduation">Graduation</option>
                                        <option value="Post Graduation">Post Graduation</option>
                                        <option value="B. Com">B. Com</option>
                                        <option value="B.A.">B.A.</option>
                                        <option value="M.A.">M.A.</option>
                                        <option value="B. Tech">B. Tech</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="category">Category</label>
                                    <select id="category" class="custom-select" name="category">
                                        <option value="General" selected>General</option>
                                        <option value="SC">SC</option>
                                        <option value="ST">ST</option>
                                        <option value="OBC">OBC</option>
                                        <option value="EWS">EWS</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="sub_category">Sub Category</label>
                                    <select id="sub_category" class="custom-select" name="sub_category">
                                        <option selected></option>
                                        <option value="IRDP" >IRDP</option>
                                    </select>
                                </div>
                            </div>
                            {{--<div class="form-group row">--}}
                                {{--<label for="corr_address" class="col-sm-2 col-form-label col-form-label-sm">Address</label>--}}
                                {{--<div class="col-sm-10">--}}
                                    {{--<input id="corr_village" type="text" name="corr_village" class="@error('corr_village') is-invalid @enderror form-control form-control-sm" />--}}
                                    {{--<textarea id="corr_address" rows="8" type="text" name="corr_address" class="@error('corr_address') is-invalid @enderror form-control form-control-sm"></textarea>--}}
                                    {{--@error('corr_address')--}}
                                    {{--<div class="alert alert-danger alert-dismissible fade show" role="alert">--}}
                                        {{--<strong>Oops!</strong> {{ $message }}--}}
                                        {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
                                            {{--<span aria-hidden="true">&times;</span>--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                    {{--@enderror--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-row mb-3">
                                <div class="col-md-6">
                                    <div class="row">
                                        <label for="corr_hsn" class="col-sm-5 col-form-label col-form-label-sm">House No. / Village</label>
                                        <div class="col-sm-7">
                                            <input id="corr_hsn" type="text" name="corr_hsn" class="@error('corr_hsn') is-invalid @enderror form-control form-control-sm" />
                                            @error('corr_hsn')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Oops!</strong> {{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label for="corr_po" class="col-sm-5 col-form-label col-form-label-sm">PO / Tehsil / Sub-Tehsil</label>
                                        <div class="col-sm-7">
                                            <input id="corr_po" type="text" name="corr_po" class="@error('corr_po') is-invalid @enderror form-control form-control-sm" />
                                            @error('corr_po')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Oops!</strong> {{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-6">
                                    <div class="row">
                                        <label for="corr_state" class="col-sm-2 col-form-label col-form-label-sm">State</label>
                                        <div class="col-sm-10">
                                            <input id="corr_state" type="text" value="HP" name="corr_state" class="@error('corr_state') is-invalid @enderror form-control form-control-sm" />
                                            @error('corr_state')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Oops!</strong> {{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label for="corr_pin" class="col-sm-2 col-form-label col-form-label-sm">Pin Code</label>
                                        <div class="col-sm-10">
                                            <input id="corr_pin" type="text" name="corr_pin" value="171000" class="@error('corr_pin') is-invalid @enderror form-control form-control-sm" />
                                            @error('corr_pin')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Oops!</strong> {{ $message }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fee_code" class="col-sm-2 col-form-label col-form-label-sm">Fee Code</label>
                                <div class="col-sm-10">
                                    <input id="fee_code" type="text" name="fee_code" placeholder="53H 696214-16" class="@error('fee_code') is-invalid @enderror form-control form-control-sm">
                                    @error('fee_code')
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
