<main>
    <div class="container" style="margin-top: 100px">
        <?php if (isset($_SESSION["nombre"]) && isset($_SESSION["rol"])) : ?>
            <?php if ($_SESSION["rol"] == "Usuario") : ?>
                <div class="row">
                    <?php foreach ($pelis as $key) : ?>
                        <div class="col-md-4">
                            <div class="card mb-3 px-4 color-fav">
                                
                                    <div class="front-card">
                                        <img src="<?= $key["imagen"] ?>" class="card-img" alt="...">
                                    </div>
                                    
                                    <div class="back-card card-down">
                                        <h5 class="card-title title-center">
                                            <?= $key["nombre"] ?>
                                        </h5>
                                        <p class="card-text desc-card">
                                            Descripcion:
                                            <?= $key["descripcion"] ?>
                                        </p>
                                        <p class="line-card title-center">
                                            Categoria:
                                            <small class="title-center"> <?= $key["nombreCategoria"] ?> </small>
                                        </p>
                                        <p class="line-card title-center">
                                            Calidad:
                                            <span class="badge badge-danger">
                                                <?= $key["calidad"] ?>
                                            </span>
                                        </p>
                                    </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        <?php endif ?>
    </div>
</main>