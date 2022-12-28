@extends('layout')

@section('content')
    
    <div class="container">
        <a href="{{ route('product.index') }}">Back home</a>
        <h1>All products</h1>
        <hr>
        @foreach ($products as $product )
            <div class="row">
                <div class="col">
                    <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                </div>
            </div>
        @endforeach
    </div>

@endsection