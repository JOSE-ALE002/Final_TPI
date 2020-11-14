<main>    
    <?php if (isset($_SESSION["nombre"]) && isset($_SESSION["rol"])) : ?>        
        <?php if ($_SESSION["rol"] == "Usuario") : ?>
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Bienvenido de nuevo Usuario: <?= $_SESSION["nombre"] ?></h4>
                <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                <hr>
                <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
            </div>
        <?php endif ?>
    <?php endif ?>

    <p>Peliculas</p>
</main>