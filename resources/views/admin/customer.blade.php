@extends('layout')

@section('content')

<div class="container my-4">
    <a href="{{route('customer.create')}}" class="btn btn-success mb-3">New Customer</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customer as $customer)
                        <tr>
                            <td>{{ $customer->first_name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>
                                <a href="{{ route('customer.edit', $customer->id)}}" class="btn btn-success btn-sm">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
