<main>
    <?php if (isset($_SESSION["nombre"])) : ?>
        <h1>Estas en about <?= $_SESSION["nombre"] ?></h1>
    <?php endif ?>
</main>