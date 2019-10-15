@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-md-9">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    <br>
                @endif
                <form action="{{ route('companies.store') }}" method="post" accept-charset="utf-8" id="contact_form">
                    @csrf
                    <div class="contact-form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="fname">Name:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="company_name">
                                <span class="text-danger">{{ $errors->first('company_name') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="phone">Phone:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="company_phone">
                                <span class="text-danger">{{ $errors->first('company_phone') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        if ($("#company_form").length > 0) {
            $("#company_form").validate({

                rules: {
                    name: {
                        required: true,
                        maxlength: 50
                    },
                    phone: {
                        required: true,
                        maxlength: 14
                    }
                },
                messages: {
                    name: {
                        required: "Please enter name"
                    },
                    phone: {
                        required: "Please enter valid email",
                        maxlength: "The email name should less than or equal to 14 characters"
                    }

                }
            })
        }
    </script>
@endsection