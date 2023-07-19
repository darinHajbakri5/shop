@extends('layout')

@section('content')
<div class="container">
    <h2>Edit Product</h2>
    <form action="{{ route('product.update', $product->id ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $product->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
        </div>

        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="file" name="logo" id="logo" class="form-control">
            <img src="{{ asset('storage/'.$product->logo) }}" class="product-logo" alt="Product Logo">
        </div>

        <button type="submit" class="btn btn-success btn-sm  mt-2">Update Product</button>
    </form>
    <form action="{{route('product.delete', $product)}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm delete-btn ">DELETE</button>
    </form>
</div>
@endsection

<style>
.product-logo {
    width: 100px; /* Set width as required */
    height: 100px; /* Set height as required */
    object-fit: cover; /* This will make sure the image is scaled correctly */
}
</style>
