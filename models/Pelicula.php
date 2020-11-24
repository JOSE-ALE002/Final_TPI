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
    private $idCalidad;
    private $precioCompra;
    private $precioAlquiler;
    private $stock;
    private $imagen;
    private $disponibilidad;

    public function __construct()
    {
        parent::__construct();
    }

    public function set_Id_Pelicula($idPelicula)
    {
        $this->idPelicula = $idPelicula;
    }

    public function get_Id_Pelicula()
    {
        return $this->idPelicula;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function set_Id_Categoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }

    public function get_Id_Categoria()
    {
        return $this->idCategoria;
    }

    public function setIdioma($idioma)
    {
        $this->idioma = $idioma;
    }

    public function getIdioma()
    {
        return $this->idioma;
    }

    public function setSubtitulos($subtitulos)
    {
        $this->subtitulos = $subtitulos;
    }

    public function getSubtitulos()
    {
        return $this->subtitulos;
    }

    public function setDirector($director)
    {
        $this->director = $director;
    }

    public function getDirector()
    {
        return $this->director;
    }

    public function setElenco($elenco)
    {
        $this->elenco = $elenco;
    }

    public function getElenco()
    {
        return $this->elenco;
    }

    public function setfechaEstreno($fechaEstreno)
    {
        $this->fechaEstreno = $fechaEstreno;
    }

    public function getfechaEstreno()
    {
        return $this->fechaEstreno;
    }

    public function set_Id_Calidad($IdCalidad)
    {
        $this->idCalidad = $IdCalidad;
    }

    public function get_Id_Calidad()
    {
        return $this->idCalidad;
    }

    public function setprecioCompra($precioCompra)
    {
        $this->precioCompra = $precioCompra;
    }

    public function getprecioCompra()
    {
        return $this->precioCompra;
    }

    public function setprecioAlquiler($precioAlquiler)
    {
        $this->precioAlquiler = $precioAlquiler;
    }

    public function getprecioAlquiler()
    {
        return $this->precioAlquiler;
    }

    public function setStock($Stock)
    {
        $this->stock = $Stock;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setDisponibilidad($disponibilidad)
    {
        $this->disponibilidad = $disponibilidad;
    }

    public function getDisponibilidad()
    {
        return $this->disponibilidad;
    }

    public function getCalidad()
    {
        $sql_leer = "SELECT * FROM calidad";
        $list = $this->conn->prepare($sql_leer);
        $list->execute();

        $resultado = $list->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;
    }

    public function getCategorias()
    {
        $sql_leer = "SELECT * FROM categoria";
        $list = $this->conn->prepare($sql_leer);
        $list->execute();

        $resultado = $list->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;
    }

    public function getIdiomas()
    {
        $idiomas = array("Español", "Ingles", "Frances", "Italiano", "Portugues");
        return $idiomas;
    }

    public function getDiponibilidades()
    {
        $disponibilidades = [
            array(
                "id" => 1,
                "title" => "Disponible"
            ),
            array(
                "id" => 0,
                "title" => "No disponible"
            )
        ];
        return $disponibilidades;
    }

    // FUNCIONES DEL CRUD

    public function showMovies()
    {
        $sql_leer = "SELECT * FROM ((peliculas INNER JOIN calidad ON peliculas.idCalidad = calidad.idCalidad) INNER JOIN categoria ON peliculas.idCategoria = categoria.idCategoria);";
        $list = $this->conn->prepare($sql_leer);
        $list->execute();

        $resultado = $list->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;
    }

    public function save()
    {

        $sql = "INSERT INTO peliculas(nombre, descripcion, idCategoria, idioma, idCalidad, precioCompra, precioAlquiler, stock, imagen, disponibilidad)";
        $sql .= "VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $result = $stmt->execute(array($this->getNombre(), $this->getDescripcion(), $this->get_Id_Categoria(), $this->getIdioma(), $this->get_Id_Calidad(), $this->getprecioCompra(), $this->getprecioAlquiler(), $this->getStock(), $this->getImagen(), $this->getDisponibilidad()));

        if ($result) {
            header('location:' . BASE_DIR);
        } else {
            echo "            
            <script>
                document.getElementById('error').innerHTML='Error! usuario o contraseña incorrectos';
                setTimeout(function() {
                    document.getElementById('error').innerHTML='';
                }, 3000);
            </script>;";
        }
    }

    public function Search()
    {
        $sql = "SELECT * FROM ((peliculas INNER JOIN calidad ON peliculas.idCalidad = calidad.idCalidad) INNER JOIN categoria ON peliculas.idCategoria = categoria.idCategoria) WHERE idPelicula = ?";
        $stmt = $this->conn->prepare($sql);
        $result = $stmt->execute(array($this->get_Id_Pelicula()));

        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        return $result;
    }

    public function searchFilter($movie,  $sort = [])
    {
        $sql = "SELECT * FROM peliculas WHERE 
            nombre LIKE '%" . $movie . "%' OR
            descripcion LIKE '%" . $movie . "%' OR
            idCategoria LIKE '%" . $movie . "%'";

        $sql .= $this->moviesSort($sort);

        $data = array();

        $list = $this->conn->prepare($sql);
        $list->execute();

        $data = $list->fetchAll(PDO::FETCH_ASSOC);

        return $data;
        //var_dump($data);
    }

    public function update()
    {
        $sql = "UPDATE peliculas SET nombre = ?, descripcion = ?, idCategoria = ?, idioma = ?, idCalidad = ?, precioCompra = ?, precioAlquiler = ?, stock = ?, imagen = ?, disponibilidad = ? WHERE idPelicula = ?";

        $stmt = $this->conn->prepare($sql);
        $result = $stmt->execute(array($this->getNombre(), $this->getDescripcion(), $this->get_Id_Categoria(), $this->getIdioma(), $this->get_Id_Calidad(), $this->getprecioCompra(), $this->getprecioAlquiler(), $this->getStock(), $this->getImagen(), $this->getDisponibilidad(), $this->get_Id_Pelicula()));

        if ($result) {
            header("Location: " . BASE_DIR);
        } else {
            echo ";    
            <script>
                document.getElementById('error').classList.remove('d-none');
                setTimeout(function() {
                    document.getElementById('error').classList.add('d-none');
            }, 3000);
        </script>";
        }
    }

    public function delete()
    {
        $sql = "DELETE FROM Peliculas WHERE idPelicula = ?";
        $stmt = $this->conn->prepare($sql);

        if ($stmt->execute(array($this->get_Id_Pelicula()))) {
            header("Location: " . BASE_DIR);
        }
    }

    public function verifyLike($idPelicula, $idUsuario)
    {
        $sql = "SELECT * FROM valoraciones WHERE idPelicula = ? AND idUsuario = ?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute(array($idPelicula, $idUsuario))) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            } else {
                return false;
            }
        }
    }

    public function like($user)
    {
        $sql = "INSERT INTO valoraciones VALUES(NULL, ?, ?, 1, '2020-11-03')";
        $stmt = $this->conn->prepare($sql);

        if ($stmt->execute(array($user, $this->get_Id_Pelicula()))) {
            header('location:' . BASE_DIR);
        } else {
            echo "Error";
        }
    }

    public function dislike($idPelicula, $idUsuario)
    {
        $sql = "DELETE FROM `valoraciones` WHERE idPelicula = ? AND idUsuario = ?";
        $stmt = $this->conn->prepare($sql);

        if ($stmt->execute(array($idPelicula, $idUsuario))) {
            header('location:' . BASE_DIR);
        } else {
            echo "Error";
        }
    }

    public function Favoritos($user)
    {
        $fav = [];
        $sql_leer = "SELECT * FROM valoraciones INNER JOIN peliculas ON valoraciones.idPelicula = peliculas.idPelicula WHERE idUsuario = ?";
        $list = $this->conn->prepare($sql_leer);
        $list->execute(array($user));

        $resultado = $list->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resultado as $key) {
            $sql = $sql = "SELECT * FROM ((peliculas INNER JOIN calidad ON peliculas.idCalidad = calidad.idCalidad) INNER JOIN categoria ON peliculas.idCategoria = categoria.idCategoria) WHERE idPelicula = ?";

            $list = $this->conn->prepare($sql);
            $list->execute(array($key["idPelicula"]));
            $fav[] = $list->fetch(PDO::FETCH_ASSOC);
        }

        return $fav;
    }

    public function ordenamiento()
    {
        $original = $this->showMovies();
        $arr = [];

        foreach ($original as $key) {
            $arr[] = $key["idPelicula"];
        }

        $lenght = count($arr);
        for ($i = 0; $i < $lenght; $i++) {
            $arr[$i] = $i + 1;
        }

        $index = 0;
        foreach ($original as $key) {
            $sql = "UPDATE peliculas SET idPelicula = ? WHERE idPelicula = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array($arr[$index], $key["idPelicula"]));
            $index++;
        }
    }

    public function moviesSort($rules)
    {
        $sql = "";
        $fields = ['title', 'popularity']; // set available filters here
        if (count($rules)) {
            $i = 0;
            foreach ($rules as $key => $value) {
                $searchInFilters = array_search($key, $fields);
                if ($searchInFilters === false) $searchInFilters = -1;
                // echo "<br>";
                if ($searchInFilters >= 0) {
                    $value = strtoupper($value);
                    if ($value == 'ASC' || $value == 'DESC') $sql .= ($i == 0) ? " ORDER BY " : " , ";
                    switch ($key) {
                        case 'title':
                            if ($value == 'ASC' || $value == 'DESC') $sql .= " nombre " . $value . " ";
                            break;
                        case 'popularity':
                            if ($value == 'DESC') $sql .= " stock " . $value . " ";
                            break;

                        default:
                            # code...
                            break;
                    }
                }
                $i++;
            }
        }
        return $sql;
    }

    public function countLikes($idPelicula)
    {
        $sql = "SELECT COUNT(*) FROM valoraciones WHERE idPelicula = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array($idPelicula));
        $resp = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resp["COUNT(*)"];
    }
}
