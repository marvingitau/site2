@extends('layouts.app')

@section('content')

<form role="form" action="/store" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="form-group ">
                @csrf
                <label class="label" for="title"> Name</label>
                <input type="text" class="form-control"  name="title" id="title"  placeholder="enter the name" value="{{ old('title') }}"/><br>
            </div>
        
            <div class="form-group">
                <label class="label" for="description">Description Area</label>
                <textarea class = "form-control" name="description" id="description">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label class="label" for="product_image">Product images skiils</label>
                <!-- <input type='file' class="form-control" name="product_image" multiple="multiple"  > -->
                <input type="text" id="myInput" class="form-control" name="skills[]" multiple = "multiple" }>

                <div id="thumb-output"></div>
            </div>

            <div class="form-group">
                <label for="product_image" class="label">Product price</label>
                <input type="text" class = "form-control" name="product_price" value={{ old("product_price") }}>
            </div>
         
            <button class="btn btn-info">Submit</button>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                    
                    <li>{{ $error }}</li>
                        
                    @endforeach
                    </ul>

                </div>
            @endif
    
</form>

@endsection