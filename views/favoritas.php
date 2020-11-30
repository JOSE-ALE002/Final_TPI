<main>
    <div class="container" style="margin-top: 100px">
        <?php if (isset($_SESSION["nombre"]) && isset($_SESSION["rol"])) : ?>
            <?php if ($_SESSION["rol"] == "Usuario") : ?>
                <div class="row">
                    <?php foreach ($pelis as $key) : ?>
                        <div class="col-md-4">
                            <div class="card mb-3 px-4 color-fav">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <img src="<?= $key["imagen"] ?>" class="card-img" alt="...">
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="card-body ">
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
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        <?php endif ?>
    </div>
</main>