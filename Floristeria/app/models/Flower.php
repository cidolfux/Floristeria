<?php
/**
 * Created by PhpStorm.
 * User: eli
 * Date: 17/11/14
 * Time: 10:19 PM
 */

class Flower {

    private $codigo;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $imagenm;

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param mixed $imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    /**
     * @return mixed
     */
    public function getImagenm()
    {
        return $this->imagenm;
    }

    /**
     * @param mixed $imagenm
     */
    public function setImagenm($imagenm)
    {
        $this->imagenm = $imagenm;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }



}