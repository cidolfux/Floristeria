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
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="row">
            <div class="col-xs-11">
                <p class="navbar-text navbar-left"><a href="{{URL::route('private')}}" class="navbar-link">Bienvenido {{Auth::user()->get()->user}}</a></p>
            </div>
            <div class="col-xs-1">
            <button onclick="window.location.href='{{URL::route('salir')}}'" type="button" class="btn btn-default navbar-btn navbar-left">Salir</button>
            </div>
        </div>
        <div class="navbar-header">
        </div>
      </div>
    </nav>
    @yield('container')
</body>
</html>