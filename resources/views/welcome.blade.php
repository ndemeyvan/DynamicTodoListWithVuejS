<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>

    <div id="app">
      
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
               
                <li class="nav-item">
                  <router-link to="/"  class="nav-link" active-link='active' exact>Home</router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/taskList"  class="nav-link" active-link='active' exact >Task</router-link>
                </li>
                
              </ul>
            </div>
          </nav>


      <div class="container pt-5">
        <router-view></router-view>
      </div>

    </div>

    <script src="{{ asset('js/app.js') }}">
        

    </script>
    </body>
</html>
