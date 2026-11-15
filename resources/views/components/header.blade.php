 <!doctype html>
 <html lang="en">

 <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
         integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="{{asset('css/custom.css')}}">

     <title>Hello, world!</title>
 </head>

 <body>

     <div class="container-fluid">
         <div class="container-lg">

     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{route('/')}}"><img src="{{asset('bannerlogo/logo.png ')}}" height="70px" width="100px" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('/')}}">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('all_customers')}}">Customers <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('products')}}">Products <span class="sr-only">(current)</span></a>
      </li>



    </ul>

@if (Auth::check())
 <p class="text-white mt-3 e ">{{ auth()->user()->name }}</p>
<form action="{{route('logout')}}" method="POST">
    @csrf

 <button type="submit" class="btn btn-danger btn-sm  ">
    Logout
 </button>
 </form>
@else
     <a href="{{route('register')}}" class="btn btn-outline btn-info btn-sm ss rounded ">Register</a>
     <a href="{{route('login')}}" class="btn btn-outline btn-success btn-sm rounded">Login</a>
@endif
  </div>
</nav>



























