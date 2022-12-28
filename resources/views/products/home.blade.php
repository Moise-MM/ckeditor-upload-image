@extends('layout')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Upload Image Using CKeditor</h1>
                <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" id="summary-ckeditor" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Submit" class="btn btn-primary mt-3">
                    </div>
                </form>
            </div>
            @if (Session::has('flash_message'))
                <div class="alert alert-success">
                    <h3>{{ Session::get('flash_message') }}</h3>
                </div>
            @endif
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('summary-ckeditor', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>

@endsection