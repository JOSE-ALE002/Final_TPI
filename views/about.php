<?php
session_start();
if (!isset($_SESSION["nombre"])) {
    header("Location:" . BASE_DIR);
}
?>

<main>
    <?php if (isset($_SESSION["nombre"])) : ?>
        <h1>Estas en about <?= $_SESSION["nombre"] ?></h1>
    <?php endif ?>
</main>