<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Bienvenido {{URL::route('private')}}">{{Auth::user()->get()->user}}</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap-theme.min.css')}}">
    <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    @yield('head')
</head>
<body>
  <div class="container-fluid">
    <nav class="navbar navbar-default" role="navigation">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <p class="navbar-text navbar-left"><a href="{{URL::route('private')}}" style="color: firebrick;text-shadow: 1px 1px 2px #000" class="navbar-link">Bienvenido {{Auth::user()->get()->user}}</a></p>
          <ul class="nav navbar-nav navbar-right">
            <li style="padding-right: 20px">
                <button onclick="window.location.href='{{URL::route('bill')}}'" type="button" style="background: green;color: #ffffff;text-shadow: 1px 1px 1px #000" class="btn btn-default navbar-btn navbar-left">Comprar (0)</button>
            </li>
            <li style="padding-right: 20px">
                <button onclick="window.location.href='{{URL::route('salir')}}'" type="button" style="background: red;color: #ffffff;text-shadow: 1px 1px 1px #000" class="btn btn-default navbar-btn navbar-left">Salir</button>
            </li>
          </ul>
        </div>
    </nav>
  </div>
    @yield('container')
</body>
</html>