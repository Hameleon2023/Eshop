<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->

    <title>
      @yield('title')
    </title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{asset('/frontend/js/jquery.min.js')}}"></script>
    {{-- OWl Carousel start --}}
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
    {{-- OWl Carousel end --}}
    
    
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/images/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('admin/images/favicon.png')}}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    
        <!-- Nucleo Icons -->
    <link href="{{asset('admin/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/css/nucleo-svg.css')}}" rel="stylesheet" />
    
        <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Uchen&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" integrity="sha384-eoTu3+HydHRBIjnCVwsFyCpUDZHZSFKEJD0mc3ZqSBSb6YhZzRHeiomAUWCstIWo" crossorigin="anonymous">
    <!-- CSS Files -->
     <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    
    <style>
      a{
        text-decoration: none !important;
      }
    </style>
    </head>

    <body class="g-sidenav-show  bg-gray-200">
     <meta name="csrf-token" content="{{ csrf_token() }}">
      @include('layouts.includes.frontnavbar') 
      
      <div class="content">
        @yield('content')    
      </div>

    
    <script src="{{asset('/frontend/js/jquery.min.js')}}"></script>     
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    
  
    <script src="{{ asset('/frontend/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>   
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>    
    
    {{-- Вывод сообщений --}}
    @if (session('status'))   
    <script>
    swal("{{session('status')}}");
    </script>
    @endif 

    @yield('scripts')

  </body>

</html>
