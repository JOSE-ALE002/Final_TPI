<div class="container-fluid bg-dark fixed-top">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
      <div class="row w-100">
        <div class="col-md-3">
          <span class="navbar-brand mb-0 text-danger h1">CinePalomadasHD</span>
        </div>
        <div class="col-md-6">
          <form class="">
            <div class="row">
              <div class="col-md-10">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
              </div>
              <div class="col-md-2">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </div>
            </div>
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
        </div>
      </div>
    </nav>
  </div>
</div>