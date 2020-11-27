<?php

    require_once "config/configControllers.php";
    require_once "models/Pelicula.php";

    if(isset($_POST["idUsuario"]) && isset($_POST["idPelicula"]) && isset($_POST["estado"])) {
        
        $pelicula = new Pelicula();
        $pelicula->set_Id_Pelicula($_POST["idPelicula"]);
        
        $resultado = array();

        if($_POST["estado"] == "dislike") {
            
            if($pelicula->like($_POST["idUsuario"])) {
                $resultado = array(
                    "result" => "exito",
                    "accion" => "like",
                    "numLikes" => $pelicula->countLikes($_POST["idPelicula"])
                );              
            } else{
                $resultado = array(
                    "result" => "fracaso"
                ); 
            }


        } else if($_POST["estado"] == "like") {
            
            if($pelicula->dislike($_POST["idUsuario"])) {
                $resultado = array(
                    "result" => "exito",
                    "accion" => "dislike",
                    "numLikes" => $pelicula->countLikes($_POST["idPelicula"])
                ); 
            } else {
                $resultado = array(
                    "result" => "fracaso"
                ); 
            }

        } else {
            $resultado = array(
                "result" => "desconocido"
            ); 
        }

        echo json_encode($resultado);
        
    }
    

?>