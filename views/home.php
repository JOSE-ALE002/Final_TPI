<main>
    <div class="container">
        <?php if (isset($_SESSION["nombre"]) && isset($_SESSION["rol"])) : ?>
            <?php if ($_SESSION["rol"] != "Usuario") : ?>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Bienvenido de nuevo Administrador: <?= $_SESSION["nombre"] ?></h4>
                    <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                    <hr>
                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>
                <table class="table table-striped text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Género</th>
                            <th scope="col">Idioma</th>
                            <th scope="col">Calidad</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pelis as $key) : ?>
                            <tr>
                                <td><?= $key["idPelicula"] ?></td>
                                <td><?= $key["nombre"] ?></td>
                                <td><?= $key["descripcion"] ?></td>
                                <td><?= $key["nombreCategoria"] ?></td>
                                <td><?= $key["idioma"] ?></td>
                                <td><?= $key["calidad"] ?></td>
                                <td><?= $key["stock"] ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="<?php echo BASE_DIR . "Pelicula/update&id=" . $key["idPelicula"] ?>" type="button" class="btn btn-primary">
                                            Actualizar
                                        </a>
                                        <a href="<?= BASE_DIR ?>Pelicula/delete&id=<?= $key["idPelicula"] ?>" type="button" class="btn btn-danger">
                                            Eliminar
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            <?php endif ?>

            <?php if ($_SESSION["rol"] == "Usuario") : ?>
                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">Bienvenido de nuevo Usuario: <?= $_SESSION["nombre"] ?></h4>
                    <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                    <hr>
                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>
                <div class="row">
                    <?php foreach ($pelis as $key) : ?>
                        <div class="col-md-6">
                            <div class="card mb-3 px-4">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <img src="<?= $key["imagen"] ?>" class="card-img" alt="...">
                                        <div class="container d-flex justify-content-center">

                                            <?php
                                            require_once "models/Pelicula.php";
                                            $p = new Pelicula();

                                            if ($p->verifyLike($key["idPelicula"], $_SESSION["id"])) { ?>
                                                <a href="<?php echo BASE_DIR . "Home/dislike&id=" . $key["idPelicula"] . "&idUser=" . $_SESSION["id"] ?>" type="button" class="btn btn-danger btn-sm my-3">
                                                    Ya no me gusta
                                                </a>
                                            <?php
                                            } else { ?>
                                                <a href="<?php echo BASE_DIR . "Home/like&id=" . $key["idPelicula"] . "&idUser=" . $_SESSION["id"] ?>" type="button" class="btn btn-danger btn-sm my-3">
                                                    Me gusta
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                Titulo:
                                                <?= $key["nombre"] ?>
                                            </h5>
                                            <p class="card-text">
                                                Descripcion:
                                                <?= $key["descripcion"] ?>
                                            </p>
                                            <p class="card-text">
                                                Categoria:
                                                <small class="text-muted"> <?= $key["nombreCategoria"] ?> </small>
                                            </p>
                                            <p class="card-text">
                                                Calidad:
                                                <span class="badge badge-danger">
                                                    <?= $key["calidad"] ?>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row no-gutters">
                                        <div class="px-1 col-md-6">
                                            <a href="" class="btn btn-primary btn-block ">
                                                Comprar
                                            </a>
                                        </div>
                                        <div class="px-1 col-md-6">
                                            <a href="" class="btn btn-primary btn-block">
                                                Alquilar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        <?php endif ?>

        <?php if (!(isset($_SESSION["nombre"]) && isset($_SESSION["rol"]))) : ?>
            <div class="row">
                <?php foreach ($pelis as $key) : ?>
                    <div class="col-md-6">
                        <div class="card mb-3 px-4">
                            <div class="row no-gutters">
                                <div class="col-md-6">
                                    <img src="<?= $key["imagen"] ?>" class="card-img" alt="...">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?= $key["nombre"] ?>
                                        </h5>
                                        <p class="card-text">
                                            <span class="font-italic">Descripcion:</span>
                                            <?= $key["descripcion"] ?>
                                        </p>
                                        <p class="card-text">
                                            Categoria:
                                            <small class="text-muted"> <?= $key["nombreCategoria"] ?> </small>
                                        </p>
                                        <p class="card-text">
                                            Calidad:
                                            <span class="badge badge-danger">
                                                <?= $key["calidad"] ?>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">

                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif ?>
    </div>
</main>