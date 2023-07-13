@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('customer.update' , $customer->id ) }}" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="first_name" class="form-label text-dark ">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required value="{{$customer->first_name}}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-dark">E-post</label>
                        <input type="text" class="form-control" id="email" name="email" required value="{{$customer->email}}">
                    </div>

                    <button type="submit" class="btn btn-sm btn-success mt-2">Edit</button>

                </form>

            <form action="{{ route('customer.delete', $customer) }}">
                @csrf
                @method("DELETE")
                <button class="btn btn-sm text-danger delete-btn mt-2 ">DELETE</button>
            </form>
        </div>
            </div>
        </div>
    </div>
</div>
@endsection
