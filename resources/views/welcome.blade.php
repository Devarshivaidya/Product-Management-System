<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
      
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            div.product 
                    {
                    background-color: white;
                    box-shadow: 0px 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                    width: 400px;
                    float:left;
                    margin:5px; 
                    }
             .card
                    {
                    margin-left: 10px;
                    margin-right: 5px;
                    margin-right: 15px;
                    height:400px;    
                       
                    }
                font
                {
                    color:rgb(252, 246, 246);
                    font-size: 20px;
                    margin-left: 10px;
                }
        </style>

    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            
            <div class="pull-right">
                <nav class="navbar navbar-dark bg-dark" style="background-color: #304D6D">
              
                    @if (Route::has('login'))
               
                    
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                       <font>PRODUCT MANAGEMENT</font> 
                       
                        @auth
                
                            <a class="btn btn-success" href="{{ url('/home') }}" class="text-sm text-gray-700 underline navbar-brand">Home</a>
                        @else
                       
                            <a class="btn btn-light" href="{{ route('login') }}" class="text-sm text-gray-700 underline" style="margin-left: 750px">Log in</a>
    
                            @if (Route::has('register'))
                                <a class="btn btn-light" href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                            @endif
                       
                        @endauth
                    </div>
              
                @endif
                
                  </nav>
                </div>
                <br>
                <div><h4 style="margin-left: 5px; margin-bottom: 25px">Product List:</h4></div>
                <div>
                    
                   
                      <div class="row">
                      @foreach($products as $product)
                      <div class="col-4">
                     <div class="card card border-light mb-3 shadow p-3 mb-5 bg-white rounded" >
                        <img class="card-img-top" src="/storage/{{$product->image }}" alt="Card image cap" height="200" width="100">
                        <div class="card-body">
                          <h5 class="card-title"> {{$product->name }}</h5>
                          <p class="card-text">  {{$product->detail}}</p>
                          
                        </div>
                      </div>
                     
                    </div>
                    @endforeach
                    </div>
                      
                        </div>  
                    </div>      
                    
            </div>
            
  
        </div>
        </div>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </body>
</html>


