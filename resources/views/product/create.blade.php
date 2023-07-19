@extends('layout')

@section('content')
<div class="container">
    <h2 class="text-success">Create Product</h2>
    <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="form-group ">
            <label for="price">Price</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" required>
        </div>
        <div class="form-group ">
            <label for="limit">Limit</label>
            <input type="number" step="0.01" name="limit" id="limit" class="form-control" required>
        </div>

        <div class="form-group ">
            <label for="logo">Logo</label>
            <input type="file" name="logo" id="logo" class="form-control product-logo" required>
        </div>

        <div class="form-group ">
            <label for="store">Store</label>
            <select name="store_id" id="store" class="form-control form-control-sm" required>
                @foreach (Auth::user()->stores as $store)
                    <option value="{{ $store->id }}">{{ $store->store_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group text-center  mt-3">
        <button type="submit" class="btn btn-success">Create Product</button>
    </div>
    </form>
</div>
@endsection
