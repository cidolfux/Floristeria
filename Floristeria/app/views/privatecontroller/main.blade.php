@extends('privatecontroller.layout')
@section('head')

    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap-theme.min.css')}}">
    <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- flexslider -->
    <link rel="stylesheet" href="{{asset('bower_components/flexslider/flexslider.css')}}" type="text/css" />
    <!-- jquery needed for mainly at flexslider -->
    <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('bower_components/flexslider/jquery.flexslider.js')}}"></script>
    <!-- Place in the <head>, after the three links for the flexslider -->
    <script type="text/javascript" charset="utf-8">
      $(window).load(function() {
        $('.flexslider').flexslider();
      });
    </script>
@stop
@section('container')
    <!-- start the first container for first section -->
    <div class="container-fluid">
      <!-- sidebar -->
      <div class="row">
        </br>
        <div class="col-xs-4">
           <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
        </div>
        <!-- finish sidebar -->
        <!-- flexslider -->
        <div class="col-xs-8">
          <!-- Place somewhere in the <body> of your page -->
          <div class="flexslider">
            <ul class="slides">
              <li>
                <img src="http://2.bp.blogspot.com/-hIKD_Rdq-Zw/UIgARYm-g0I/AAAAAAAAI8A/mSlUHfvGogA/s1600/camelia4.jpg" />
              </li>
              <li>
                <img src="http://3.bp.blogspot.com/-fknU_8G3r7M/UUijn7uIijI/AAAAAAAAEug/WDeKVqi2t0c/s640/imagens-imagens-de-flores-30356b.jpg" />
              </li>
              <li>
                <img src="http://foroarchivos.infojardin.com/foro-jardineros/www.infojardin.com/fotos/albums/userpics/IMG_0055~0.JPG" />
              </li>
            </ul>
          </div>
        </div>
        <!-- finish flexslider -->
      </div>
      <!-- finish first section -->
    </div>
    <!-- finish the container for first section -->
    <!-- start the container for second section -->
    <div class="container">
      <!-- start the row-->
      <div class="row">
        <hr class="featurette-divider">
        <!-- start a row featurette -->
        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-responsive" src="http://flores.florpedia.com/images/fotos-claveles-pq.jpg" alt="Generic placeholder image">
          </div>
        </div>
        <!-- finish a row featurette -->
        <hr class="featurette-divider">
        <!-- start a row featurette -->
        <div class="row featurette">
          <div class="col-md-5">
            <img class="featurette-image img-responsive" src="http://flores.florpedia.com/images/fotos-flores-azules-pq.jpg" alt="Generic placeholder image">
          </div>
          <div class="col-md-7">
            <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
          </div>
        </div>
        <!-- finish a row featurette -->
        <hr class="featurette-divider">
        <!-- start a row featurette -->
        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-responsive" src="http://flores.florpedia.com/images/fotos-flores-camelias-pq.jpg" alt="Generic placeholder image">
          </div>
        </div>
        <!-- finish a row featurette -->
        <hr class="featurette-divider">
        <!-- start the footer -->
        <footer>
          <p class="pull-right"><a href="#">Back to top</a></p>
          <p>&copy; 2014 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </footer>
        <!-- finish the footer -->
      </div>
      <!-- finish the row -->
    </div>
    <!-- finish the container for second section -->
@stop