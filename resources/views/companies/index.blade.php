@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <ul class="list-group">
                    @foreach($companies as $company)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $company->company_name }}
                            <span class="badge badge-primary badge-pill">{{ $company->company_phone }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection