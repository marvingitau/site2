@extends('layouts.app')
@section('content')


<p> Edit Page </p>
    
<form action="/update/{{ $projects->id }}/" method="POST">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <div class="form-group">
            <label class = "label" for="title"> Title</label>
            
                <input type="text" class="form-control" name="title" value="{{ $projects->title }}" placeholder="Title"/>
            </div>

       

        <div class="form-group">
                <label class = "label" for="description"> Description</label>
                
                    <textarea name="description" class="form-control" > {{ $projects->description }}</textarea>
    
        </div>

        <div class="form-group">
            <label class="label" for="product_price"></label>
            <input type="text" name="product_price" class="form-control"value="{{ $projects->product_price }}"  >

        </div>
        <div class="form-group">
            <label class="label" for="product_image"></label>
            <!-- <input type="file" name="product_image" class="form-control"> -->
            <input type="text" id="myInput" class="form-control" name="skills[]" multiple = "multiple"value="{{ (str_replace('"]','',(str_replace('["' ,'',$projects->skillz)))) }}" >
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button> &nbsp; 
    </form>

    <form action="/destroy/{{ $projects->id }}" method="POST" role="form">
        @method('DELETE')
        @csrf
        
     <button type="submit" class="btn btn-default" > Delete</button>
    </form>

    <form action="/Harddelete/{{ $projects->id }}" method="POST" role="form">
        @method('DELETE')
        @csrf
        
     <button type="submit" class="btn btn-default" >Hard Delete</button>
    </form>



@endsection