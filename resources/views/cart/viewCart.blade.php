@extends('layout')

@section('content')

<div class="container my-4">


    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($cart as $cart)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $cart->product->logo) }}" alt="Product Logo" class="product-logo">
                        </td>
                        <td>{{ $cart->product->title }}</td>
                        <td>{{ $cart->product->description }}</td>
                        <td>${{ $cart->product->price }}</td>
                        <td>
                            <form action="{{route('deleteCart', $cart)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm delete-btn">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

<style>
    .product-logo {
        width: 100px; /* Set width as required */
        height: 100px; /* Set height as required */
        object-fit: cover; /* This will make sure the image is scaled correctly */
    }
</style>
