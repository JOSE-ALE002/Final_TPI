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