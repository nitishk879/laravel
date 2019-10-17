@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="container">
        <div class="row justify-content-center pt-3">
            <div class="col-md-6">
                <h1>{{$title}}</h1>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <p class="py-3"><a href="{{ route('patwari.create') }}" class="btn btn-sm btn-primary"> Create New</a> </p>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">serial_number</th>
                    <th scope="col">candidate_name</th>
                    <th scope="col">father_name</th>
                    <th scope="col">dob</th>
                    <th scope="col">edu_qualification</th>
                    <th scope="col">category</th>
                    <th scope="col">sub_category</th>
                    <th scope="col">district</th>
                    <th scope="col">sub_district</th>
                    <th scope="col">first_pref</th>
                    <th scope="col">second_pref</th>
                    <th scope="col">corr_address</th>
                    <th scope="col">fee_code</th>
                </tr>
                </thead>
                <tbody>
                @foreach($candidates as $candidate)
                    <tr>
                        <th scope="row">{{ $candidate->serial_number }}</th>
                        <td>{{ $candidate->candidate_name }}</td>
                        <td>{{ $candidate->father_name }}</td>
                        <td>{{ $candidate->dob }}</td>
                        <td>{{ $candidate->edu_qualification }}</td>
                        <td>{{ $candidate->category }}</td>
                        <td>{{ $candidate->sub_category }}</td>
                        <td>{{ $candidate->district }}</td>
                        <td>{{ $candidate->sub_district }}</td>
                        <td>{{ $candidate->first_pref }}</td>
                        <td>{{ $candidate->second_pref }}</td>
                        <td>{{ $candidate->corr_address }}</td>
                        <td>{{ $candidate->fee_code }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
