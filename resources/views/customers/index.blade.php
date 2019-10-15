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
                            @if(count($customers) > 0)
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $customers as $customer)
                                        <tr>
                                            <td></td>
                                            <td>{{ $customer->customer_name }}</td>
                                            <td>{{ $customer->customer_phone }}</td>
                                            <td>{{ $customer->company_name }}</td>
                                            <td><a href="{{action('CustomersController@edit', $customer->customer_id)}}" class="btn btn-sm btn-primary">Edit</a></td>
                                            <td>
                                                <form method="POST" action="{{action('PostController@destroy', $customer->customer_id)}}">
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
                            <p class="py-3"><a href="{{ route('customers.create') }}" class="btn btn-sm btn-primary"> Create New Customer</a> </p>
                            <div class="col-md-8">
                                <ul>
                                    @foreach($companies as $company)
                                        <li>{{ $company->company_name }}</li>
                                        <ul>
                                            @foreach($customers as $customer)
                                                <li> {{ $customer->customer_name }}</li>
                                            @endforeach
                                        </ul>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
