<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Login</title>
            <meta name='title' content='Login'>
            <meta name='description' content='Login'>
            <meta name='keywords' content='palabras, clave'>
            <meta name='robots' content='noindex,nofollow'>
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

            <!-- Optional theme -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

            <!-- Latest compiled and minified JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
        <nav class="navbar navbar-default" role="navigation">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="./">LOGO</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
              <?php

                $vista = Route::currentRouteName();//Route::currentRouteAction(); //the last method return a string that is it the controller and the method (i.e. HomeController@home)

                $current = array(

                    'home' => '',
                    'login' => '',
                    'register' => ''

                );

                if($vista == 'login'){
                    $current['login'] = 'active';
                }
                //registrar
                else if($vista == 'register'){
                   $current['register'] = 'active';
                }

              ?>
                <?php if(Auth::user()->guest()){ ?>
                    <li class="{{$current['login']}}"><a href="{{URL::route('login')}}">Iniciar Sesion </a></li>
                    <li class="{{$current['register']}}"><a href="{{URL::route('register')}}">Registrarme</a></li>
                <?php } else { ?>
                    <li><a href="{{URL::route('private')}}">{{Auth::user()->get()->user}}</a></li>
                    <li>
                        <div class="navbar-collapse collapse">
                            {{Form::open(array(
                                "method" => "POST",
                                "action" => "HomeController@salir",
                                "role" => "form",
                                "class" => "navbar-form",
                            ))}}
                            {{Form::input("submit", "","Salir",array("class" => "btn btn-success"))}}
                            {{Form::close()}}
                        </div>
                    </li>

                <?php } ?>
                <!-- Add another tag or elements here -->
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

        <div class="container">
            @yield('contenido')
        </div>
</body>
</html>