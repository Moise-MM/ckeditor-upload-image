@extends('layout')

@section('content')
    
    <div class="container">
        <h1>All products</h1>
        <hr>
        @foreach ($products as $product )
            <div class="row">
                <div class="col">
                    <a href="">{{ $product->name }}</a>
                </div>
            </div>
        @endforeach
    </div>

@endsection