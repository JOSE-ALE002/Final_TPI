<main>
    <?php if (isset($_SESSION["nombre"]) && isset($_SESSION["rol"])) { ?>
        <?php if ($_SESSION["rol"] != "Usuario") : ?>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Bienvenido de nuevo Administrador: <?= $_SESSION["nombre"] ?></h4>
                <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                <hr>
                <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
            </div>
            <div>
                Este es el Inicio con sesion de "Administrador"
            </div>
        <?php endif ?>

        <?php if ($_SESSION["rol"] == "Usuario") : ?>
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Bienvenido de nuevo Usuario: <?= $_SESSION["nombre"] ?></h4>
                <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                <hr>
                <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
            </div>
            <div>
                Este es el Inicio con sesion de "USUARIO"
            </div>
        <?php endif ?>
        <?php }else{ ?>
            Este es el Incio "SIN" sesion, aqui iran las pelis babosos
    <?php } ?>



    <div class="container p-4">
        <div class="row">
            <?php foreach ($pelis as $key) : ?>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                                <h3 class="card-title text-upercase">
                                    <?= $key["nombrePeli"] ?>
                                </h3>
                                <p class="m-2"><?= $key["descripcionPeli"] ?></p>
                            <?php if (isset($_SESSION["nombre"]) && isset($_SESSION["rol"])) { ?>
                                <?php if ($_SESSION["rol"] != "Usuario") : ?>
                                    <a href="" class="btn btn-danger">Eliminar</a>
                                    <a href="" class="btn btn-secondary">Editar</a>
                                <?php endif ?>
                                <?php if ($_SESSION["rol"] == "Usuario") : ?>
                                    <a href="" class="btn btn-danger">Me gusta</a>
                                <?php endif ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>


</main>