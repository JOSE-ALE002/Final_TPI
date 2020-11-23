<?php
  $html = "";
  require_once "models/Pelicula.php";
  $pelicula = new Pelicula();
  $moviesList = array();

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

      $html .= '<div class="row">';
      foreach ($moviesList as $key) :
      $html .= '<div class="card mt-4 ml-2">
                  <a href="' ."Pelicula/movie&id=" . $key["idPelicula"].'"><img src="'.$key["imagen"].'" style="width: 18rem; height: 26rem;"/></a>
                  <div class="card-body text-warning">
                  <a href="'. "Home/login" . '" class="text-danger">
                      <i class="far fa-heart"></i>
                  </a>
                  <!--Es ejemplo de la cantidad de likes-->
                  10,698
              </div>
        </div>';
      endforeach;
      $html .= '</div>';
    }
  }
  echo $html;
?>
