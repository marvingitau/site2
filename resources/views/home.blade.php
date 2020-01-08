@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }} DashBoard</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div> 
                    @endif --}}

                    {{-- You are logged in! --}}
                    
                    @foreach ($data as $datum)
                       <ul>
                       <li> <strong>{{ $datum->title }}</strong> = {{ $datum->description }}</li>
                       </ul>
                    @endforeach
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
