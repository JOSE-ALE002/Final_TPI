<?php
  require_once "config/configControllers.php";
  $html = "";
  require_once "models/Pelicula.php";
  $pelicula = new Pelicula();
  $moviesList = array();
  session_start();

  if (isset($_REQUEST['movies']) || isset($_REQUEST['orderBy']) || isset($_REQUEST['popularity'])) {
  
    $filter = $_REQUEST['movies'];

    if($_REQUEST['popularity'] == '0' ){
      $sort = ['title'=>$_REQUEST['orderBy']];
    }else{
      $sort = ['popularity'=>$_REQUEST['popularity']];
    }
    
    $moviesList = $pelicula->searchFilter($filter, $sort);


    if(empty($moviesList)){
      $html .= '<h2 class="text-danger">No hay coincidencias!!!</h2>';
    }else{

      $html .= '<div class="row px-1">';
      foreach ($moviesList as $key) :
      $html .= '
      <div class="col-md-3 px-1">
      <div class="card" style="  background-color: #000;">
                  <a href="'.BASE_DIR ."Pelicula/movie&id=" . $key["idPelicula"].'"><img src="'.$key["imagen"].'" style="width: 100%; height: 26rem;"/></a>
                  <div class="card-body text-warning">
                  <div class="row">';
                  if (isset($_SESSION["nombre"]) && isset($_SESSION["rol"])) {
                    if ($pelicula->verifyLike($key["idPelicula"], $_SESSION["id"])) {                      
                      $html .= '
                      <div class="col">
                          <a href="'.BASE_DIR . "Home/dislike&id=" . $key["idPelicula"] . "&idUser=" . $_SESSION["id"] .'" type="button" class="text-danger"
                          style="color: white;">
                          <span>
                            <i class="fas fa-heart"></i>
                          </span>

                          <span class="text-warning">10,900</span>
                        </a>
                    </div>

                    <div class="col">  
                        <span class="float-right text-warning">$' . $key["precioCompra"] . '</span>
                    </div>';
                      
                    } else {
                      $html .= '
                      <div class="col">
                          <a href="'.BASE_DIR . "Home/like&id=" . $key["idPelicula"] . "&idUser=" . $_SESSION["id"] .'" type="button" class="text-danger"
                          style="color: white;">
                          <span>
                            <i class="far fa-heart"></i>
                          </span>

                          <span class="text-warning">10,900</span>
                        </a>
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

                          <span class="text-warning">10,900</span>
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
  echo $html;
