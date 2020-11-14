<?php

require_once 'database/Conexion.php';

class Usuario extends Conexion
{
    private $nombre;
    private $pass;
    private $apellido;
    private $Direccion;
    private $email;
    private $age;

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setPassword($pass, $clave)
    {
        switch ($clave) {
            case 1: {
                    $this->pass = password_hash($pass, PASSWORD_DEFAULT);
                    break;
                }

            case 2: {
                    $this->pass = $pass;
                    break;
                }
        }
    }

    public function getPassword()
    {
        return $this->pass;
    }

    public function setApellido($apelido)
    {
        $this->apellido = $apelido;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setDireccion($Direccion)
    {
        $this->Direccion = $Direccion;
    }

    public function getDireccion()
    {
        return $this->Direccion;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getAge()
    {
        return $this->age;
    }


    // Acciones de usuario 
    public function login()
    {
        $sql = "SELECT usuarios.email, usuarios.nombre, roles.cargo, usuarios.idUsuario, usuarios.pass FROM usuarios INNER JOIN roles ON usuarios.idRol= roles.idRol  WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":email", $this->getEmail());

        if ($stmt->execute() == true) {
            $nRow = $stmt->rowCount();
            if ($nRow == 1) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($this->getPassword(), $result["pass"])) {
                    session_start();
                    $_SESSION["nombre"] = $result["nombre"];
                    $_SESSION["id"] = $result["idUsuario"];
                    $_SESSION["rol"] = $result["cargo"];

                    switch ($_SESSION["rol"]) {
                        case 'Usuario': {
                                header("Location: " . BASE_DIR . "Home/home");
                                break;
                        }

                        case 'Administrador': {
                                header("Location: " . BASE_DIR . "Admin/home");
                                break;
                        }

                        return;
                    }
                }
            }
        }

        echo "
        <script>
            document.getElementById('error').innerHTML='Error! usuario o contraseña incorrectos';
            setTimeout(function() {
                document.getElementById('error').innerHTML='';
            }, 3000);
        </script>";
    }

    public function logout()
    {
        //DESTRUIR TODAS LAS VARIABLES DE SESSION
        $_SESSION = array();

        //SI SE DESEA DESTRUIR LA SESION COMPLETAMENTE, BORRE TAMBIEN LAS COOKIE DE LA SESION
        //NOTA: ESTO DESTRUIRA LA SESION PERO NO LA INFORMACION DE LA SESION
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        //FINALMENTE DESTRUIMOS LA SESION
        session_destroy();

        header('location:' . BASE_DIR);
    }



    public function save()
    {

        $sql = "INSERT INTO Usuarios(nombre, apellido, email, direccion, pass)";
        $sql .= "VALUES(?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $result = $stmt->execute(array($this->getNombre(), $this->getApellido(), $this->getEmail(), $this->getDireccion(), $this->getPassword()));

        if ($result) {
            header('location:' . BASE_DIR);
        } else {
            echo "Ha ocurrido un error";
        }
    }

    public function about()
    {
        header("Location: " . BASE_DIR . "Home/about");
    }
}
