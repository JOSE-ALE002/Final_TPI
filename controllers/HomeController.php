<?php

class HomeController
{
    public function home()
    {
        require_once "models/Pelicula.php";
        $pelicula = new Pelicula();
        $pelis = $pelicula->destacados();

        require_once "views/home.php";               
    }

    public function login()
    {
        require_once "views/login.php";
        require_once 'models/Usuario.php';
        if ($_POST && isset($_POST["email"]) && isset($_POST["contra"])) {
            $user = new Usuario();
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["contra"], 2);

            return $user->login();                                            
        }         
    }

    public function Salir()
    {
        require_once 'models/Usuario.php';
        $user = new Usuario();
        $user->logout();
    }

    public function signup()
    {
        require_once "views/signup.php";
        require_once "models/Usuario.php";

        if ($_POST && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["direccion"]) && isset($_POST["email"]) && isset($_POST["contra"])) {
            $user = new Usuario();
            $user->setNombre($_POST["nombre"]);
            $user->setApellido($_POST["apellido"]);
            $user->setDireccion($_POST["direccion"]);
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["contra"], 1);

            if($user->signup()){
                $user->setPassword($_POST["contra"], 2);
                $user->login();
            }
        }
    }

    public function about()
    {
        require_once "views/about.php";        
    } 

    public function like()
    {
        require_once "models/Pelicula.php";
        $p = new Pelicula();
        
        if ($_GET) {
            $p->set_Id_Pelicula($_GET["id"]);
            $like = $p->like($_GET["idUser"]);
        }

        require_once 'views/like.php';
    }   

    public function dislike()
    {
        require_once "models/Pelicula.php";
        $p = new Pelicula();
        
        if ($_GET) {            
            $dislike = $p->dislike($_GET["id"], $_GET["idUser"]);
        }

        require_once 'views/like.php';
    }   

    public function favoritos()
    {
        require_once 'models/Pelicula.php';
        
        $pelicula = new Pelicula();
        
        if($_GET) {
            $pelis = $pelicula->Favoritos($_GET["idUser"]);
            require_once 'views/favoritas.php';
            // var_dump($pelis);
        }
        
    }
    
     
}
