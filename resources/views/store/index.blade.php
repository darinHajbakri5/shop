@extends('layout')

@section('content')
<div class="container">

    <div class="container py-5">
        <div class="row">

            @foreach ($store as $store)
            <div class="col-lg-3">
                <div class="card mb-4 product-wap rounded-0">
                    <div class="card rounded">
                        <img class="card-img rounded-0 img-fluid" src="{{ asset('storage/' . $store->logo) }}" style="width: 400px; height: 400px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $store->store_name }} store</h5>
                            <div class="card-text">
                                <i class="fas fa-map-marker-alt fa-fw"></i>
                                <span class="font-weight-bold">City:</span> {{ $store->city }}
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('store.show', $store->id) }}" class="btn btn-success mt-2">About Us</a>


                                <a href="{{ route('product.index', $store->id) }}" class="btn btn-success mt-2">Products</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1>Categories of The Month</h1>
                <p>
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>

        <div class="row">
            @php
            $categories = ['Watches', 'Shoes', 'Accessories'];
            $images = ['category_img_01.jpg', 'category_img_02.jpg', 'category_img_03.jpg'];
            @endphp
            @foreach($categories as $key => $category)
            <div class="col-lg-4 col-md-4 p-5 mt-3">
                <a href="#"><img src="./assets/img/{{ $images[$key] }}" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">{{ $category }}</h5>
                <p class="text-center"><a href="#" class="btn btn-success">Go Shop</a></p>
            </div>
            @endforeach
        </div>
    </section>

</div>

@endsection
