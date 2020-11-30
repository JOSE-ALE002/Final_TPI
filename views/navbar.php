<div class="container-fluid fixed-top" style="background-color: #1a1a1a;">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark py-3" style="background-color: #1a1a1a;">
      <a class="navbar-brand" href="<?= BASE_DIR ?>">
        <img class="img_titulo" src="<?= BASE_DIR ?>assets/img/palomadas_logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
        CinePalomadasHD
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="row ml-1">
          <form class="form-inline my-2 my-lg-0">
            <a class="nav-link text-white" id="buscar" href="#">
              <i class="fa fa-search" aria-hidden="true"></i>
            </a>
            <input class="search_peli" name="search" id="search" type="search" placeholder="Search . . ." aria-label="Search">
          </form>
        </div>
        <ul class="navbar-nav">
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li> -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categorias
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
        <div class="navbar-nav ml-auto">
          <?php if (isset($_SESSION["nombre"]) && isset($_SESSION["rol"])) { ?>
            <?php if ($_SESSION["rol"] != "Usuario") : ?>
              <a class="nav-link" href="<?= BASE_DIR . "Pelicula/save" ?>">Agregar Pelicula</a>
              <a class="nav-link active" href="<?= BASE_DIR . "Home/Salir" ?>">
                Salir
              </a>
            <?php endif ?>

            <?php if ($_SESSION["rol"] == "Usuario") : ?>
              <a class="nav-link" href="<?= BASE_DIR . "Home/favoritos&idUser=" . $_SESSION["id"] ?>">
                Peliculas Favoritas
              </a>
              <a class="nav-link active" href="<?= BASE_DIR . "Home/Salir" ?>">
                Salir
              </a>
            <?php endif ?>
          <?php } else { ?>
            <a class="nav-link" href="<?= BASE_DIR . "Home/login" ?>">Log In</a>
            <a class="nav-link" href="<?= BASE_DIR . "Home/signup" ?>">Sign Up</a>
          <?php } ?>
        </div>
      </div>
    </nav>
  </div>
</div>