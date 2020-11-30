<?php

class PeliculaController
{
    public function save()
    {
        require_once "models/Pelicula.php";

        $movie = new Pelicula();
        $calidad = $movie->getCalidad();
        $categoria = $movie->getCategorias();
        $idiomas = $movie->getIdiomas();
        $disponibles = $movie->getDiponibilidades();


        if ($_POST) {
            $movie->setNombre($_POST["titulo"]);
            $movie->setDescripcion($_POST["descripcion"]);
            $movie->set_Id_Categoria($_POST["categoria"]);
            $movie->setIdioma($_POST["idioma"]);
            $movie->set_Id_Calidad($_POST["calidad"]);
            $movie->setprecioCompra($_POST["P_compra"]);
            $movie->setprecioAlquiler($_POST["P_alquiler"]);
            $movie->setStock($_POST["stock"]);
            $movie->setImagen($_POST["imagen"]);
            $movie->setDisponibilidad($_POST["disponibilidad"]);

            $movie->save();
        }

        require_once "views/saveMovies.php";
    }

    public function update()
    {
        require_once "models/Pelicula.php";
        $movie = new Pelicula();
        $calidad = $movie->getCalidad();
        $categoria = $movie->getCategorias();
        $idiomas = $movie->getIdiomas();
        $disponibles = $movie->getDiponibilidades();
        $movie->set_Id_Pelicula($_GET["id"]);
        $peli = $movie->Search();
        $movie->get_Id_Pelicula();

        if ($_POST) {
            $movie->setNombre($_POST["titulo"]);
            $movie->setDescripcion($_POST["descripcion"]);
            $movie->set_Id_Categoria($_POST["categoria"]);
            $movie->setIdioma($_POST["idioma"]);
            $movie->set_Id_Calidad($_POST["calidad"]);
            $movie->setprecioCompra($_POST["P_compra"]);
            $movie->setprecioAlquiler($_POST["P_alquiler"]);
            $movie->setStock($_POST["stock"]);
            $movie->setImagen($_POST["imagen"]);
            $movie->setDisponibilidad($_POST["disponibilidad"]);
            $movie->update();
        }

        require_once "views/updateMovie.php";
    }

    public function delete()
    {
        require_once 'models/Pelicula.php';
        $movie = new Pelicula();
        if ($_GET) {
            $movie->set_Id_Pelicula($_GET["id"]);
            $movie->delete();
            //$movie->ordenamiento(1);
        }
    }

    public function movie()
    {
        require_once "models/Pelicula.php";
        $movies = new Pelicula();
        $movies->set_Id_Pelicula($_GET["id"]);

        if(isset($_GET["idUsuario"]) && isset($_GET["fechaCompra"])) {
            $movies->comprar($_GET["idUsuario"], $_GET["fechaCompra"]);

            $movies->stockUpdate($_GET["id"]);

        } else if(isset($_GET["idUsuario"]) && isset($_GET["fechaEntrega"]) && isset($_GET["fechaDevolucion"])) {
            $movies->alquilar($_GET["idUsuario"], $_GET["fechaEntrega"], $_GET["fechaDevolucion"]);

            $movies->stockUpdate($_GET["id"]);
        } 

        $movie = $movies->Search();

        require_once "views/movie.php";
    }

    public function pagar()
    {
        require_once "pagar.php";
    }

    //Metodo creado solo para pruevas en el desarrollo
    public function show(){
        $movie = (!isset($_GET['filter'])) ? [] : $_GET['filter'];
        $sort = (!isset($_GET['sort'])) ? [] : $_GET['sort'];

        var_dump($sort);

        require_once "models/Pelicula.php";
        $movies = new Pelicula();
        $movies->searchFilter($movie, $sort);
    }

    

}