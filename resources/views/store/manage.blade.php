@extends('layout')

@section('content')

<div class="container my-4">
    <a href="{{ route('create.product')}}" class="btn btn-success mb-3">New Product</a>

    <div class="row">
        @foreach ($stores as $store)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <img class="card-img rounded-0 img-fluid" src="{{ asset('storage/' . $store->logo) }}" style="width: 400px; height: 400px;">
                        <h5 class="card-title">{{ $store->store_name }}</h5>
                        <p class="card-text">
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            <span>{{ $store->city }}</span>
                        </p>
                        <a href="{{ route('store.edit', $store->id)}}" class="btn btn-success btn-sm text-dark  "> Edit Store</a>
                        <a href="{{ route('product.index', $store->id)}}" class="btn btn-success btn-sm text-dark "> Edit Products</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
