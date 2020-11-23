<?php

class PeliculaController
{
    public function save()
    {
        require_once "models/Pelicula.php";

        $pelicula = new Pelicula();
        $calidad = $pelicula->getCalidad();
        $categoria = $pelicula->getCategorias();
        $idiomas = $pelicula->getIdiomas();
        $disponibles = $pelicula->getDiponibilidades();


        if ($_POST) {
            $pelicula->setNombre($_POST["titulo"]);
            $pelicula->setDescripcion($_POST["descripcion"]);
            $pelicula->set_Id_Categoria($_POST["categoria"]);
            $pelicula->setIdioma($_POST["idioma"]);
            $pelicula->set_Id_Calidad($_POST["calidad"]);
            $pelicula->setprecioCompra($_POST["P_compra"]);
            $pelicula->setprecioAlquiler($_POST["P_alquiler"]);
            $pelicula->setStock($_POST["stock"]);
            $pelicula->setImagen($_POST["imagen"]);
            $pelicula->setDisponibilidad($_POST["disponibilidad"]);

            $pelicula->save();
        }

        require_once "views/saveMovies.php";
    }

    public function update()
    {
        require_once "models/Pelicula.php";
        $pelicula = new Pelicula();
        $calidad = $pelicula->getCalidad();
        $categoria = $pelicula->getCategorias();
        $idiomas = $pelicula->getIdiomas();
        $disponibles = $pelicula->getDiponibilidades();
        $pelicula->set_Id_Pelicula($_GET["id"]);
        $peli = $pelicula->Search();
        $pelicula->get_Id_Pelicula();

        if ($_POST) {
            $pelicula->setNombre($_POST["titulo"]);
            $pelicula->setDescripcion($_POST["descripcion"]);
            $pelicula->set_Id_Categoria($_POST["categoria"]);
            $pelicula->setIdioma($_POST["idioma"]);
            $pelicula->set_Id_Calidad($_POST["calidad"]);
            $pelicula->setprecioCompra($_POST["P_compra"]);
            $pelicula->setprecioAlquiler($_POST["P_alquiler"]);
            $pelicula->setStock($_POST["stock"]);
            $pelicula->setImagen($_POST["imagen"]);
            $pelicula->setDisponibilidad($_POST["disponibilidad"]);
            $pelicula->update();
        }

        require_once "views/updateMovie.php";
    }

    public function delete()
    {
        require_once 'models/Pelicula.php';
        $pelicula = new Pelicula();
        if ($_GET) {
            $pelicula->set_Id_Pelicula($_GET["id"]);
            $pelicula->delete();
            $pelicula->ordenamiento();
        }
    }

    public function movie()
    {
        require_once "models/Pelicula.php";
        $movies = new Pelicula();
        $movies->set_Id_Pelicula($_GET["id"]);
        $movie = $movies->Search();
        require_once "views/movie.php";
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
