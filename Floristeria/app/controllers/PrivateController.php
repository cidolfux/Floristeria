<?php
/**
 * Created by PhpStorm.
 * User: eli
 * Date: 17/11/14
 * Time: 10:20 PM
 */

require_once app_path().'/models/Flower.php';;

class PrivateController extends BaseController {

    /*Utils Methods*/

    public function giveFlowers($rawQuery){


        $flowers = array();
        for($i = 0;$i<count($rawQuery);$i++){

            $row = get_object_vars($rawQuery[$i]);
            $flower = new Flower();
            $flower->setCodigo($row['codigo']);
            $flower->setNombre($row['nombre']);
            $flower->setDescripcion($row['descripcion']);
            $flower->setImagen($row['imagen']);
            $flower->setImagenm($row['imagenm']);
            $flower->setCantidadFinal($row['cantidadfinal']);
            $flower->setPrecio($row['precio']);
            $flowers[$i] = $flower;

        }

        return $flowers;

    }

    public function allImageForFeaturette($allFlowers){

        $allImages = array();
        for ($i = 0; $i < count($allFlowers); $i++) {

            $flower = $allFlowers[$i];
            $allImages[$i] =  "<img class='featurette-image img-responsive' src='".$flower->getImagenm()."'/>";

        }

        return $allImages;

    }

    public function giveItemsForShop($allFlowers){

        $allImages = array();
        for ($i = 0; $i < count($allFlowers); $i++) {
            $flower = $allFlowers[$i];
            $allImages[$i] =  array("codigo" => $flower->getCodigo(),"html"=>"<br><br><img class='img-circle' alt='Generic placeholder image' style='width: 240px; height: 240px;' src='".$flower->getImagenm()."'/><h2>".
                $flower->getNombre()."</h2><p>".$flower->getDescripcion()."</p><br><p><strong>Precio: $".$flower->getPrecio()."</p><p>Cantidad: <lb id='cantidad'>".$flower->getCantidadFinal()."</lb></strong></p><br><a id='addButton' class='btn btn-default' onclick='return theFunction();' href='".""."' role='button'>Agregar al carrito</a></p></br>");

        }

        return $allImages;

    }

    public function allImageForSlider($allFlowers)
    {

        $allImages = array();
        for ($i = 0; $i < count($allFlowers); $i++) {

            $flower = $allFlowers[$i];
            $allImages[$i] =  "<li><img src='".$flower->getImagen()."'/></li>";

        }

        return $allImages;

    }

    /*Methods for views*/

    public function showMain(){

        $results = DB::select('select flores.codigo, nombre, descripcion, imagen, imagenm, cantidadfinal, precio from flores inner join stock on flores.codigo = stock.codigoflor order by stock.cantidadfinal asc limit 5');
        $allMainFlowers = $this->giveFlowers($results);
        $allImageForSlider = $this->allImageForSlider($allMainFlowers);
        $allFeaturette = $this->allImageForFeaturette($allMainFlowers);
        return View::make('privatecontroller.main', array('allFlowers' => $allMainFlowers, 'imagesSliders' => $allImageForSlider, 'allImageFeaturette' => $allFeaturette));

    }

    public function shop(){

        $results = DB::select('select flores.codigo, nombre, descripcion, imagen, imagenm, cantidadfinal, precio from flores inner join stock on flores.codigo = stock.codigoflor order by stock.cantidadfinal asc');
        $allFlowers = $this->giveFlowers($results);
        $allItemsForShop = $this->giveItemsForShop($allFlowers);
        return View::make('privatecontroller.shop', array('allItems' => $allItemsForShop));

    }

    public function salir(){

        Auth::user()->logout();
        return Redirect::to('login');

    }

    public function bill(){

        return View::make('privatecontroller.bill');

    }

} 