<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> @yield('title') - Visitor Management</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" crossorigin="anonymous">
         <link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/datatables.min.css')}}"/>
  <script src="{{ URL::asset('js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ URL::asset('js/jquery-ui.min.js') }}"></script>
  <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

 
<script type="text/javascript" src="{{ URL::asset('js/datatables.min.js') }}"></script>
    <script>
        $(document).on({
            ajaxStart: function(){
                $("body").addClass("loading"); 
            },
            ajaxStop: function(){ 
                $("body").removeClass("loading"); 
            }    
        });
     </script>
 <style>
    .overlay{
        display: none;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 999;
        background: rgba(255,255,255,0.8) url("{{ URL::asset('loading.gif')}}") center no-repeat;
    }
    
   
    body.loading{
        overflow: hidden;   
    }
  
    body.loading .overlay{
        display: block;
    }
</style>   
    </head>
    <body>
        <div class="container">
        <div class="row">
          @yield('content')
        </div>

  
      </div>
      <div class="overlay"></div>
    

    </body>
</html>
