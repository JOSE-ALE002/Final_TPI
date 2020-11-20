<main>
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
        <div class="jumbotron jumbotron-fluid d-flex align-items-center">
            <div class="container text-white">
                <h2 class="display-4 font-weight-bold">John Wick 3: Parabellum</h2>
                <p class="lead w-50">John Wick escapa luego de matar a un miembro de la asociación internacional de asesinos y, con una recompensa de 14 millones de dólares por su cabeza, es el objetivo de sicarios en todas partes.
                    Trilogía John Wick</p>
                <button class="btn-jumbotron">
                    <i class="fas fa-play"></i>
                    <span class="ml-2">Ver trailer</span>
                </button>
                <button class="btn-jumbotron">
                    <i class="fas fa-info-circle"></i>
                    <span class="ml-2">Más informacion</span>
                </button>
            </div>
        </div>
        <div class="container">
            <h3 class="text-danger">Peliculas recomendadas</h3>
        </div>
        <div class="wrapper">
            <section id="section1">
                <a href="#section2" class="arrow__btn">‹</a>
                <?php foreach ($pelis as $key) : ?>
                    <?php if ($key["idPelicula"] <= 5) : ?>
                        <div class="item" onClick='showMovie(<?php echo $key["idPelicula"] ?>);'>
                            <img src="<?= $key["imagen"] ?>" />
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
                <a href="#section2" class="arrow__btn">›</a>
            </section>
            <section id="section2">
                <a href="#section1" class="arrow__btn">‹</a>
                <?php foreach ($pelis as $key) : ?>
                    <?php if ($key["idPelicula"] > 5 && $key["idPelicula"] <= 10) : ?>
                        <div class="item" onClick='showMovie(<?php echo $key["idPelicula"] ?>);'>
                            <img src="<?= $key["imagen"] ?>" />
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
                <a href="#section1" class="arrow__btn">›</a>
            </section>

            <!-- SECCION OPCIONAL -->

            <!-- <section id="section3">
                <a href="#section2" class="arrow__btn">‹</a>
                <div class="item">
                    <img src="https://occ-0-243-299.1.nflxso.net/dnm/api/v5/rendition/412e4119fb212e3ca9f1add558e2e7fed42f8fb4/AAAABRr4YxdaABuAuH_3FmSQZn7BCvLp-UUPsXE9MiYpvFP3CSUHV2zOew5oVqKqqdaOd3tbFVS0Uf67uIs7_eZydlCghg4nK0nMatRpPImABwTOhnNzCLCxdKrua7pPIcPCZqBYTeAO5g.jpg" />
                </div>
                <div class="item">
                    <img src="https://occ-0-243-299.1.nflxso.net/dnm/api/v5/rendition/412e4119fb212e3ca9f1add558e2e7fed42f8fb4/AAAABTyWK1MKaw8GcObtz47R2Tj7wkLJ7qQu9tk6TVpcoyxpzD4B-zZ569bQ5vGrREBL-MWFkGilXUwy7tCDaj2XOGkUB4RsbbFAmp9NgSr6lygMpUGNHSlyfrFbUORsRkrxSIoh_ggOvg.jpg" />
                </div>
                <div class="item">
                    <img src="https://occ-0-243-299.1.nflxso.net/dnm/api/v5/rendition/a76057bcfd003711a76fb3985b1f2cf74beee3b8/AAAABY7NwkWEJIfXsn6t3Li4bGSCQ1nEErPisI5ZZtXlC-_VRBZOUrhWK5X3vt3t6SR_cpgVhCwxgQqFFDJhk62Kk8hawOnYGZMr0LKeLczMFV2zalCFjkcdLksvT4HB2LEi6LFyruyk3Uu0LmNGsHfC2A8Bly60smr_3sDbz4RruXcklPOG1qYq9wUVu3zfaiwNvqmG4b8aFA.jpg" />
                </div>
                <div class="item">
                    <img src="https://occ-0-243-299.1.nflxso.net/dnm/api/v5/rendition/a76057bcfd003711a76fb3985b1f2cf74beee3b8/AAAABemXHOga9feFnOux6I2YyACBD94wvM7N3vcTGIfMpQ_BcaXeoeM9XyzdVdamKtxt0SHXZfvsl6czcp3E48tXMLtHBxuQsh1BjHtPGgJDZ81je_FjItINiqzLtir0A30s_e4KR8G3d7AYAPDjZVOY97bNpzNqtkcHcGp7fGnJByVCps1uLfG9U9tK3Ma1A_3JbRt0NiT2_Q.jpg" />
                </div>
                <div class="item">
                    <img src="https://occ-0-243-299.1.nflxso.net/dnm/api/v5/rendition/a76057bcfd003711a76fb3985b1f2cf74beee3b8/AAAABVxuRB932hvre-XP0gh6ar5ztoR3Oe3QjKHkyvcDnRak2MKXOrx5H7mFQSvggefMFOppwEs7ZCCpiqrJ_CYGvtvYB9NpU4SWUtNO6uV2u-DTID267AcHjHcGvGBQJ1ufddDkxcGOZyi5MlOQ5QUmBun4652FbYUnib3zMYQDgcna_Pvz8y_HO5fbokxezrRR1JZAAiqFSQ.jpg" />
                </div>
                <a href="#section1" class="arrow__btn">›</a>
            </section> -->
        </div>
    <?php endif ?>
</main>