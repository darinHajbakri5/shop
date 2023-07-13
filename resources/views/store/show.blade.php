@extends('layout')

@section('content')
<div class="container">
    <h1 class=" mt-2">{{ $store->store_name }}</h1>
    <h3> {{ $store->email }}</h3>
    <p>{{ $store->city }}</p>
    <a href="{{ route('home') }}" class="btn text-success border-success">homepage</a>
</div>
@endsection
