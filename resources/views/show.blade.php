@extends('layouts.app')

@section('content')
    <h2> From User ID={{ auth()->user()->id }} </h2>
    @foreach ($userData as $udata)
    <ul>
        <li> <strong><a href="/edit/{{ $udata->id }}">{{ $udata->title }}</strong></a> = {{ $udata->description }}</li>
    </ul>
    @endforeach
@endsection


{{-- @extends('layout.app')
@section('content')

  <h1> {{ $udata-> title }} </h1>

  <div class="content"> {{ $udata->description }} <br>
  <a href="../{{ $udata->id }}/edit" class="btn btn-info" role="button">Edit</a>
    </div>

  @if($udata->tasks->count())
  <div >
    @foreach($udata->tasks as $task)

    <form class="" method="POST" action="../../tasks/{{ $task->id }}">
      @method("PATCH")
      @csrf
      
        <div class="form-check " >
            
            <input type="checkbox" class="form-check-input" name="completed" id="exampleCheck1" onChange="this.form.submit();" {{$task->completed? 'checked' : ''}}>
            <label class="form-check-label {{$task->completed? 'isComplete' : ''}} " for="exampleCheck1"> {{ $task->description }}</label>
            
        </div>
    </form>
     
    @endforeach

  </div>
  @endif

  create task form 

  <form class="jumbotron mt-2" method="POST" action="../{{ $udata->id}}/task" >
    @csrf
    <div class="form-group">
      <label for="newTask"></label>
      <input type="text" class="form-control"id="newTask" name="description" placeholder="new tast"/>
      <input type="hidden" name= "idValue" value="{{$udata->id }}"/>
    
      <button class="btn btn-info" role="button">Submit</button>
    </div>

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

  
  


@endsection --}}