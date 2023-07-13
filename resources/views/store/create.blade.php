@extends('layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-success mb-3">
                <div class="card-header text-success bg-white text-center">
                    <h4 class="card-title">Create your store</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="/create/users" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="store_name" class="form-label">Store Name</label>
                            <input type="text" class="form-control" id="store_name" name="store_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-post</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                        <button type="submit" class="btn text-success border-success">Create</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
