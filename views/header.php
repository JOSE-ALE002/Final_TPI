<?php 
  session_start();
?>

<!Doctype html>
<html lang="en">
  <head>
    <title>CinePalomadasHD</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
  </head>
  <body>  
  <div class="p-5">
    <h1 class="w-50 d-inline-block"><i class="fas fa-dove fa-lg fa-fw"></i>CinePalomadasHD</h1>
        <?php if (isset($_SESSION["nombre"]) && isset($_SESSION["rol"])) { ?>
          <a class="float-right" href="<?= BASE_DIR . "Home/Salir" ?>">Salir</a>
          <a class="float-right" href="<?= BASE_DIR . "Home/about" ?>">About</a>
        <?php }else{ ?>
            <a class="float-right" href="<?= BASE_DIR . "Home/signup" ?>">Sign Up</a>
            <a class="float-right" href="<?= BASE_DIR . "Home/login" ?>">Log In</a>
        <?php } ?>
    </div>