<div class="p-5">
  <h1 class="w-50 d-inline-block"><a href="<?= BASE_DIR ?>" class="text-decoration-none text-white"><i class="fas fa-dove fa-lg fa-fw"></i>CinePalomadasHD</a></h1>
  <ul class="nav justify-content-end">
    <?php if (isset($_SESSION["nombre"]) && isset($_SESSION["rol"])) { ?>
      <?php if ($_SESSION["rol"] != "Usuario") : ?>
        <li class="nav-item">
        <a class="nav-link" href="<?= BASE_DIR . "Pelicula/save" ?>">Agregar Pelicula</a>
      </li>
      <?php endif ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= BASE_DIR . "Home/favoritos&idUser=" . $_SESSION["id"]?>">Peliculas Favoritas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="<?= BASE_DIR . "Home/Salir" ?>">Salir</a>
      </li>
    <?php }else{ ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= BASE_DIR . "Home/login" ?>">Log In</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= BASE_DIR . "Home/signup" ?>">Sign Up</a>
      </li>
    <?php } ?>
    </ul>
</div>
