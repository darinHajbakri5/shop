@extends('layout')

@section('content')

<div class="container my-4">
    <a href="{{route('seller.create')}}" class="btn btn-success mb-3">New Seller</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($seller as $seller)
                        <tr>
                            <td>{{ $seller->first_name }}</td>
                            <td>{{ $seller->last_name }}</td>
                            <td>{{ $seller->email }}</td>
                            <td>{{ $seller->phone_number }}</td>
                            <td>
                                <a href="{{ route('seller.edit', $seller->id)}}" class="btn btn-success btn-sm">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
