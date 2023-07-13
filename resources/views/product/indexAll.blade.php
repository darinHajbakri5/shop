@extends('layout')

@section('content')

<div class="container py-5">
    <div class="row">
        @foreach ($product as $product)
            <div class="col-lg-3 mb-4">
                <div class="card rounded-0 product-wap">
                    <img class="card-img rounded-0 img-fluid" src="{{ asset('storage/' . $product->logo) }}" style="width: 400px; height: 400px;">
                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                        <ul class="list-unstyled">

                            <form action="{{ route('addCart', ['product' => $product]) }}" method="POST" class="p-0">
                                @csrf
                                @if(Auth::user())
                                <input class="fas fa-cart-plus btn btn-success " type="submit" value="ADD">
                                @endif
                            </form>
                        </ul>
                    </div>
                    <div class="card-body">
                        <a href="shop-single.html" class="h3 text-decoration-none">{{ $product->title }}</a>
                        <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                            <li>{{ $product->description }}</li>
                        </ul>
                        <ul class="list-unstyled d-flex justify-content-center mb-1">
                            <li>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                            </li>
                        </ul>
                        <p class="text-center mb-0">${{ $product->price }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
