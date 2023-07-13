@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">



            </div>
            <div class="card-body mt-2">
                <form method="POST" action="{{ route('seller.update' , $seller->id ) }}" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required value="{{$seller->first_name}}">
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required value="{{$seller->last_name}}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-post</label>
                        <input type="text" class="form-control" id="email" name="email" required value="{{$seller->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" required value="{{$seller->phone_number}}">
                    </div>

                    <button type="submit" class="btn btn-sm btn-success mt-2">Edit</button>

                </form>
                <form action="{{ route('seller.delete', $seller) }}">
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
