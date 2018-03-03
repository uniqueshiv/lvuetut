<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

        </style>
    </head>
    <body>
    <div id="app">
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            {{-- <a class="navbar-brand" href="#">Project name</a> --}}
              <router-link class="navbar-brand" to="/">Project Name</router-link>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="active">
                <router-link to="/example">Example</router-link>
              </li>
              <li class="">
                <router-link to="/">Home</router-link>
              </li>
              <li class="">
                <router-link to="/sample">Sample</router-link>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
      <div style="padding-top:90px;"></div>
      <router-view></router-view>

  </div>

        <script type="text/javascript" src="{{ asset('js/app.js') }}">

        </script>
    </body>
</html>
