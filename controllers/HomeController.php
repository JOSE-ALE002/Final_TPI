<?php

class HomeController
{
    public function home()
    {
        require_once "views/home.php";               
    }

    public function login()
    {
        require_once "views/login.php";
        require_once 'models/Usuarios.php';
        if ($_POST && isset($_POST["nombre"]) && isset($_POST["contra"])) {
            $user = new Usuario();
            $user->setNombre($_POST["nombre"]);
            $user->setPassword($_POST["contra"], 2);

            $user->login();                                            
        }         
    }

    public function Salir()
    {
        require_once 'models/Usuarios.php';
        $user = new Usuario();
        $user->logout();
    }

    public function save()
    {        
        require_once "models/Usuarios.php";

        if ($_POST && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["direccion"]) && isset($_POST["email"]) && isset($_POST["contra"])) {
            $user = new Usuario();
            $user->setNombre($_POST["nombre"]);
            $user->setApellido($_POST["apellido"]);
            $user->setDireccion($_POST["direccion"]);
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["contra"], 1);

            $user->save();
        }
    }

    public function about()
    {
        require_once "views/about.php";
        
    } 
}
