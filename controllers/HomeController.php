<?php

class HomeController
{
    public function home()
    {
        require_once "models/Usuarios.php";
        $pelicula = new Usuario();
        $pelis = $pelicula->home();

        require_once "views/home.php";               
    }

    public function login()
    {
        require_once "views/login.php";
        require_once 'models/Usuarios.php';
        if ($_POST && isset($_POST["email"]) && isset($_POST["contra"])) {
            $user = new Usuario();
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["contra"], 2);

            return $user->login();                                            
        }         
    }

    public function Salir()
    {
        require_once 'models/Usuarios.php';
        $user = new Usuario();
        $user->logout();
    }

    public function signup()
    {
        require_once "views/signup.php";
        require_once "models/Usuarios.php";

        if ($_POST && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["direccion"]) && isset($_POST["email"]) && isset($_POST["contra"])) {
            $user = new Usuario();
            $user->setNombre($_POST["nombre"]);
            $user->setApellido($_POST["apellido"]);
            $user->setDireccion($_POST["direccion"]);
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["contra"], 1);

            return $user->signup();
        }
    }
}
