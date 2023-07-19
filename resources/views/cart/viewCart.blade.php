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
                        <th>Basket</th>
                        <th></th>
                        <th >Actions</th>





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
                        <td>{{ $cart->product->basket }}</td>
                        <td>
                            <div>
                                <td>
                                    <div style="display: flex; gap: 10px;">
                                        <form action="{{route('deleteCart', $cart)}}" method="POST" style="margin: 0;">
                                            @csrf
                                            @method('DELETE')
                                            <input class="fas fa-cart-plus btn btn-danger " type="submit" value="delete">
                                        </form>
                                        <form action="{{ route('addCart', ['product' => $cart->product]) }}" method="POST" class="p-0" style="margin: 0;">
                                            @csrf
                                            @if(Auth::user())
                                            <input class="fas fa-cart-plus btn btn-success " type="submit" value="ADD">
                                            @endif
                                        </form>
                                    </div>
                                </td>
                            </div>
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
