<?php
  require_once "config/configControllers.php";
  $html = "";
  require_once "models/Pelicula.php";
  $pelicula = new Pelicula();
  $moviesList = array();
  session_start();

  if (isset($_REQUEST['movies']) || isset($_REQUEST['orderBy']) || isset($_REQUEST['popularity'])) {
  
    $filter = $_REQUEST['movies'];

    if(isset($_REQUEST['popularity'])){
      if($_REQUEST['popularity'] == '0' ){
        $sort = ['title'=>$_REQUEST['orderBy']];
      }else{
        $sort = ['popularity'=>$_REQUEST['popularity']];
      }
    }else{
      $sort = ['title'=>$_REQUEST['orderBy']];
    }
    
    $moviesList = $pelicula->searchFilter($filter, $sort);


    if(empty($moviesList)){
      $html .= '<h2 class="text-danger mt-5">No hay coincidencias!!!</h2>';
    }else{

      $html .= '<div class="row px-1">';
      foreach ($moviesList as $key) :
      $html .= '
      <div class="row px-1 div-movie">
      <div class="card" style="  background-color: #000;">
        <a href="'.BASE_DIR ."Pelicula/movie&id=" . $key["idPelicula"].'"><img src="'.$key["imagen"].'" width="300" height="400"/></a>
        <div class="card-body text-warning">
                  <div class="row">';
                  if (isset($_SESSION["nombre"]) && isset($_SESSION["rol"])) {

                    if ($pelicula->verifyLike($key["idPelicula"], $_SESSION["id"])) {                      
                      $estado = "like";
                      
                      $html .= '
                      <div class="col">
                        <span class="text-danger">
                            <a href="#" class="like-count text-danger" data-idpelicula="'.$key["idPelicula"].'" data-idusuario="'.$_SESSION["id"].'" data-estado="'.$estado.'">
                              <i class="fas fa-heart"></i>
                              <span class="text-warning">'.$pelicula->countLikes($key["idPelicula"]).'</span>
                            </a>

                        </span>
                    </div>

                    <div class="col">  
                        <span class="float-right text-warning">$' . $key["precioCompra"] . '</span>
                    </div>';
                      
                    } else {

                      $estado = "dislike";

                      $html .= '
                      <div class="col">
                        <span class="text-danger">
                          <a href="#" class="like-count text-danger" data-idpelicula="'.$key["idPelicula"].'" data-idusuario="'.$_SESSION["id"].'" data-estado="'.$estado.'">
                            <i class="far fa-heart"></i>
                            <span class="text-warning">'.$pelicula->countLikes($key["idPelicula"]).'</span>
                          </a>

                      </span>
                    </div>

                    <div class="col">  
                        <span class="float-right text-warning">$' . $key["precioCompra"] . '</span>
                    </div>';                        
                    }
                  }else{
                    $html .= '
                      <div class="col">
                          <a href="' . BASE_DIR . "Home/login" . '" class="text-danger text-decoration-none">
                          <span>
                            <i class="far fa-heart"></i>
                          </span>

                          <span class="text-warning">'.$pelicula->countLikes($key["idPelicula"]).'</span>
                        </a>
                    </div>

                    <div class="col">  
                        <span class="float-right text-warning">$' . $key["precioCompra"] . '</span>
                    </div>';
                  }
                  $html .= '
                         
                </div>
                </div>
              </div>
        </div>';
      endforeach;
      $html .= '</div>';
    }
  }

  if(isset($_REQUEST['checked']) || isset($_REQUEST['searchAdmin'])){


    $filter = $_REQUEST['checked'];
    $search = $_REQUEST["searchAdmin"];

    if($filter == 'option1'){
      $availability = -1;
      //$moviesList = $pelicula->ordenamiento(2);
      $moviesList = $pelicula->showMoviesAdmin($search, $availability);
    }else if($filter == 'option2'){
      $availability = 1;
      $moviesList = $pelicula->showMoviesAdmin($search, $availability);
    }else{
      $availability = 0;
      $moviesList = $pelicula->showMoviesAdmin($search, $availability);
    }

    if(empty($moviesList)){
      $html .= '<h2 class="text-danger">No se encontraron Peliculas</h2>';
    }else{
      $html .= '
      <div class="mx-auto bg-secondary">
      <table class="table table-striped text-center">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Imagen</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Género</th>
                <th scope="col">Idioma</th>
                <th scope="col">Calidad</th>
                <th scope="col">Venta</th>
                <th scope="col">Alquiler</th>
                <th scope="col">Stock</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
      ';
      foreach ($moviesList as $key) {
        $html .= '
        <tr>
          <td>'. $key["idPelicula"] .'</td>
          <td><img src="'.$key["imagen"].'" style="width: 100%; height: 7rem;"/></td>
          <td>'. $key["nombre"] .'</td>
          <td>'. $key["descripcion"] .'</td>
          <td>'. $key["nombreCategoria"] .'</td>
          <td>'. $key["idioma"] .'</td>
          <td>'. $key["calidad"] .'</td>
          <td> $'. $key["precioCompra"] .'</td>
          <td> $'. $key["precioAlquiler"] .'</td>
          <td>'. $key["stock"] .'</td>
          <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="'. BASE_DIR . "Pelicula/update&id=" . $key["idPelicula"] .'" type="button" class="btn btn-primary">
                      Actualizar
                  </a>
                  <a href="'. BASE_DIR ."Pelicula/delete&id=" . $key["idPelicula"] .'" type="button" class="btn btn-danger">
                      Eliminar
                  </a>
              </div>
          </td>
      </tr>
        ';
      }
      $html .= '</tbody>
      </table>
      </div>';
    }
  }
  echo $html;