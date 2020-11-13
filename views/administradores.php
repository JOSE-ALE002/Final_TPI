<?php
session_start();
if (!isset($_SESSION["nombre"])) {
    header("Location:" . BASE_DIR);
}
?>

<main>
<?php if (isset($_SESSION["nombre"]) && isset($_SESSION["rol"])) : ?>        
        <?php if ($_SESSION["rol"] == "Administrador") : ?>
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Bienvenido de nuevo Administrador: <?= $_SESSION["nombre"] ?></h4>
                <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                <hr>
                <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
            </div>
        <?php endif ?>
    <?php endif ?>
    <div class="container">
        <div class="row d-flex justify-content-between p-5">
            <h1>Clientes</h1>
            <div class="float-right btn-group" role="group" aria-label="Basic example">
                <a type="button" href="<?= BASE_DIR ?>About/save" class="btn btn-primary">Nuevo registro</a>
                <button type="button" class="btn btn-light">Actualizar</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">email</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mostrar as $key) : ?>
                            <tr>
                                <td><?= $key["id"] ?></td>
                                <td><?= $key["nombre"] ?></td>
                                <td><?= $key["apellidos"] ?></td>
                                <td><?= $key["direccion"] ?></td>
                                <td><?= $key["email"] ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary">Vizualizar</button>
                                        <button type="button" class="btn btn-success">Editar</button>
                                        <a href="<?= BASE_DIR ?>About/delete&id=<?= $key["id"] ?>" type="button" class="btn btn-danger">Borrar</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>