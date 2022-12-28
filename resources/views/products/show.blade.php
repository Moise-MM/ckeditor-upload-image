@extends('layout')

@section('content')
    
    <div class="container">
        <a href="{{ route('product.index') }}">Back home</a>
        <h1>Name : {{ $product->name }}</h1>
        <hr>
        <div>
            {{!! $product->description !!}}
        </div>
    </div>

@endsection