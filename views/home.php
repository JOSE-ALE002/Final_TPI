<?php  session_start() ?>

<main>
    <div class="p-5">
        <h1 class="w-50 d-inline-block"><i class="fas fa-dove fa-lg fa-fw"></i>CinePalomadasHD</h1>
        <a class="float-right" href="<?= BASE_DIR . "Home/Salir" ?>">Salir</a>
    </div>

    <?php if (isset($_SESSION["nombre"]) && isset($_SESSION["rol"])) : ?>
        <?php if ($_SESSION["rol"] != "Usuario") : ?>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Bienvenido de nuevo Administrador: <?= $_SESSION["nombre"] ?></h4>
                <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                <hr>
                <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
            </div>
        <?php endif ?>

        <?php if ($_SESSION["rol"] == "Usuario") : ?>
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Bienvenido de nuevo Usuario: <?= $_SESSION["nombre"] ?></h4>
                <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                <hr>
                <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
            </div>
        <?php endif ?>
    <?php endif ?>
</main>