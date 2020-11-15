<?php
require_once 'database/Conexion.php';

class Pelicula extends Conexion
{
    private $idPelicula;   
    private $nombre;
    private $descripcion;
    private $idCategoria;
    private $idioma;
    private $subtitulos;
    private $director;
    private $elenco;
    private $fechaEstreno;
    private $IdCalidad;
    private $precioCompra;
    private $precioAlquiler;
    private $stock;
    private $imagen;
    private $disponibilidad;

    public function __construct()
    {
        parent::__construct();
    }

    public function set_Id_Pelicula($idPelicula) {
        $this->idPelicula = $idPelicula;
    }

    public function get_Id_Pelicula() {
        return $this->idPelicula;
    }    

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }    

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }    

    public function set_Id_Categoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    public function get_Id_Categoria() {
        return $this->idCategoria;
    }

    public function setIdioma($idioma) {
        $this->idioma = $idioma;
    }

    public function getIdioma() {
        return $this->idioma;
    } 

    public function setSubtitulos($subtitulos) {
        $this->subtitulos = $subtitulos;
    }

    public function getSubtitulos() {
        return $this->subtitulos;
    } 

    public function setDirector($director) {
        $this->director = $director;
    }

    public function getDirector() {
        return $this->director;
    } 

    public function setElenco($elenco) {
        $this->elenco = $elenco;
    }

    public function getElenco() {
        return $this->elenco;
    } 

    public function setfechaEstreno($fechaEstreno) {
        $this->fechaEstreno = $fechaEstreno;
    }

    public function getfechaEstreno() {
        return $this->fechaEstreno;
    } 

    public function set_Id_Calidad($IdCalidad) {
        $this->$IdCalidad = $IdCalidad;
    }

    public function get_Id_Calidad() {
        return $this->IdCalidad;
    }    

    public function setprecioCompra($precioCompra) {
        $this->precioCompra = $precioCompra;
    }

    public function getprecioCompra() {
        return $this->precioCompra;
    } 

    public function setprecioAlquiler($precioAlquiler) {
        $this->precioAlquiler = $precioAlquiler;
    }

    public function getprecioAlquiler() {
        return $this->precioAlquiler;
    } 

    public function setStock($Stock) {
        $this->stock = $Stock;
    }

    public function getStock() {
        return $this->stock;
    } 

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function getImagen() {
        return $this->imagen;
    } 

    public function setDisponibilidad($disponibilidad) {
        $this->disponibilidad = $disponibilidad;
    }

    public function getDisponibilidad() {
        return $this->disponibilidad;
    } 

    public function showMovies(){
        $sql_leer = "SELECT * FROM ((peliculas INNER JOIN calidad ON peliculas.idCalidad = calidad.idCalidad) INNER JOIN categoria ON peliculas.idCategoria = categoria.idCategoria);";
        $list = $this->conn->prepare($sql_leer);
        $list->execute();

        $resultado = $list->fetchAll();

        return $resultado;
    }

}