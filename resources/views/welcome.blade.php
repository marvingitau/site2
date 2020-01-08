<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>site</title>
     
        

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
       

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


        <!-- Styles -->
        <style>
            .home-body{
                background-color: #5238af36;
                max-width: 1920px;
	            margin: 0 auto;
            }
            .header{
                background-color: #343a40;
            }
            /* html, body {
                background-color: rosybrown;
                /* background-image: url('/images/alucard.jpg?214387514633ac76f95644332cb5dc4e');  
                color: #636b6f;
              
                color:#fff;
                font-family: 'Nunito', sans-serif;
                font-weight: bold;
                font-style: italic;
                height: 100vh;
                margin: 0;
            }
 
            /* .full-height {
                height: 100vh;

#5238af00;


            } */

            .flex-center {
                display: flex;
                justify-content: right;
            }


            .searchButton {

                /* font-family: 'Roboto';
                border-radius: 0;
                margin-left: -2%;
                background-color:  green;

                color:#fff;
                border: 1px solid;
                border-left-color: currentcolor;
                border-left-style: solid;
                border-left-width: 1px;
                border-left: 2px solid; */
                border-radius: 0;
                margin-left: -3%;
                background-color: rosybrown;
                color: #fff;
                border: 1px solid;
                border-left: 2px solid;

            }
            .searchButton:hover{
                background-color: rosybrown;
                border-color: #5238af36;
                color: #343a40;
            }
            .searchButton:active{
                background-color: rosybrown;
                border-color: #5238af36;
                color: #343a40;
            }
            .authLinks:visited{
                /* background-color: rosybrown;
                border-color: #5238af36; */
                color:#fff
            }
            .authLinks:link{
                /* background-color: rosybrown;
                border-color:#5238af36; */
                color:#fff
            }

          
        </style>
    </head>
    <body class="home-body">

  


        <header>
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark" style="background-color: rgb(43,54,3);" >
            <a class="navbar-brand" href="{{ url('/') }}">SITE</a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        {{-- <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="#">Action 1</a>
                                <a class="dropdown-item" href="#">Action 2</a>
                            </div>
                        </li> --}}
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2 rounded-0" type="text" placeholder="">
                        <button  class="btn btn-light my-2 my-sm-0 searchButton" type="submit">Search</button>
                    </form>
                    @if (Route::has('login'))
                    <div class=" ml-0 ml-sm-3">
                        @auth
                            <a class="authLinks" href="{{ url('/home') }}">Home</a>
                        @else
                            <a class="authLinks" href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a class="authLinks" href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif

                </div>
            </nav>
        </header>
        
        <div class="row content container-fluid">
            
                @foreach ($allItem as $udata)
                <div class=" text-dark col-sm-12 col-md-6 col-lg-4">
                    <div class="card border-secondary mb-3 mt-2">
                        <div class="card-body">
                        <img class="image-fluid card-img" src="{{ ($udata->product_image) }}" alt="NO IMAGE">
                            <h2 class="card-title">{{ $udata->title}}</h2>
                            <p class="card-text">{{ $udata->description }}</p>
                            <p class="card-text">
                           
                           
                       
                            
                            </p>

                            <a href="#" class="card-link">About</a>
                        </div>
                    </div>
                </div>
                @endforeach

                @foreach($allSkills as $skil)
                {{ $skil->skill }}

                @endforeach
            
         

            {{-- <example-component :arrayOfItems = @json($arrOfItems[0]) ></example-component> --}}
            {{-- <el-component > </el-component> --}}

            {{-- @foreach ($allItem as $udata)
            <ul>
                <li> <strong><a href="/edit/{{ $udata->id }}">{{ $udata->title }}</strong></a> = {{ $udata->description }}</li>
            </ul>
            @endforeach --}}



    </div>

          <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    </body>
</html>
