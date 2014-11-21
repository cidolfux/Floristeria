@extends('privatecontroller.layout')
@section('head')

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
            <li><a href="{{URL::route('shop')}}">Shop</a></li>
          </ul>
        </div>
        <!-- finish sidebar -->
        <!-- flexslider -->
        <div class="col-xs-8">
          <!-- Place somewhere in the <body> of your page -->
          <div class="flexslider">
            <ul class="slides">
              <?php
                foreach($imagesSliders as $imageSlider){
                    echo($imageSlider);
                }
              ?>
            </ul>
          </div>
        </div>
        <!-- finish flexslider -->
      </div>
      <!-- finish first section -->
    </div>
    <!-- finish the container for first section -->
    <!-- start the container for second section -->
    <div class="container marketing">
      <!-- start the row-->
      <div class="row">

        <?php
            foreach($allFlowers as $item){
                $featurette = "<hr class='featurette-divider'>
                               <div class='row featurette'>
                                 <div class='col-md-7'>
                                   <h2 class='featurette-heading'>Floristeria - <span class='text-muted'>".$item->getNombre()."</span></h2>
                                   <p class='lead'>".$item->getDescripcion()."</p>
                               </div>
                                 <div class='col-md-5'>"."<img class='img-circle' alt='Generic placeholder image' style='width: 500px; height: 500px;' src='".$item->getImagenm()."'/>"."</div>
                               </div>";

                echo($featurette);

            }

        ?>

        <hr class="featurette-divider">
        <!-- start the footer -->
        <footer>
          <p class="pull-right"><a href="#">Back to top</a></p>
          <p>&copy; 2014 Flowers. &middot; <a href="#">Politica</a> &middot; <a href="#">Terminos</a></p>
        </footer>
        <!-- finish the footer -->
      </div>
      <!-- finish the row -->
    </div>
    <!-- finish the container for second section -->
@stop