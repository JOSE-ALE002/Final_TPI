<div class="container-fluid bg-dark fixed-top">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
      <div class="row w-100">
        <div class="col-md-3">
          <span class="navbar-brand mb-0 h1"><a href="<?= BASE_DIR ?>" class="text-decoration-none"><span><img class="img_titulo" src="<?= BASE_DIR . "assets/img/palomadas_logo.png" ?>" alt="Logo" /></span> Cine<span class="text-danger" >Palomadas</span>HD</a></span></span>
        </div>
        <div class="col-md-6">
          <form class="form-inline">
            <label for="" class="text-white pr-3 w-25">Buscar: </label>
            <input class="form-control w-75" name="search" id="search" placeholder="Search" aria-label="Search">
          </form>
        </div>
        <div class="col-md-3">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav ml-auto">
              <?php if (isset($_SESSION["nombre"]) && isset($_SESSION["rol"])) { ?>
                <?php if ($_SESSION["rol"] != "Usuario") : ?>
                  <a class="nav-link" href="<?= BASE_DIR . "Pelicula/save" ?>">Agregar Pelicula</a>
                <?php endif ?>

                <?php if ($_SESSION["rol"] == "Usuario") : ?>
                  <a class="nav-link" href="<?= BASE_DIR . "Home/favoritos&idUser=" . $_SESSION["id"] ?>">
                    Peliculas Favoritas
                  </a>
                <?php endif ?>
                <a class="nav-link active" href="<?= BASE_DIR . "Home/Salir" ?>">
                    Salir
                </a>
              <?php } else { ?>
                <a class="nav-link" href="<?= BASE_DIR . "Home/login" ?>">Log In</a>
                <a class="nav-link" href="<?= BASE_DIR . "Home/signup" ?>">Sign Up</a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>
</div>