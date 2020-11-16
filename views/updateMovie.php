<div class="container mb-4">
    <form method="POST">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" class="form-control" placeholder="Ingrese el titulo de la pelicula" required value="<?= $peli["nombre"] ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="Categoria">Categoria</label>
                <select name="categoria" class="form-control">
                    <?php foreach ($categoria as $key) : ?>
                        <?php if ($key["idCategoria"] == $peli["idCategoria"]) : ?>
                            <option value="<?= $key["idCategoria"] ?>" selected>
                                <?= $key["nombreCategoria"] ?>
                            </option>
                        <?php endif ?>

                        <?php if ($key["idCategoria"] != $peli["idCategoria"]) : ?>
                            <option value="<?= $key["idCategoria"] ?>">
                                <?= $key["nombreCategoria"] ?>
                            </option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="idioma">Idioma</label>
                <select name="idioma" class="form-control">
                    <?php foreach ($idiomas as $key) : ?>
                        <?php if ($key == $peli["idioma"]) : ?>
                            <option value="<?= $key ?>" selected>
                                <?= $key ?>
                            </option>
                        <?php endif ?>

                        <?php if ($key != $peli["idioma"]) : ?>
                            <option value="<?= $key ?>">
                                <?= $key ?>
                            </option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion" cols="30" rows="10" class="form-control" placeholder="Descripcion" required>
                <?= $peli["descripcion"] ?>
            </textarea>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="Calidad">Calidad</label>
                <select name="calidad" class="form-control">
                    <?php foreach ($calidad as $key) : ?>
                        <?php if ($key["calidad"] == $peli["calidad"]) : ?>
                            <option value="<?= $key["idCalidad"] ?>" selected>
                                <?= $key["calidad"] ?>
                            </option>
                        <?php endif ?>

                        <?php if ($key["calidad"] != $peli["calidad"]) : ?>
                            <option value="<?= $key["idCalidad"] ?>">
                                <?= $key["calidad"] ?>
                            </option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="PrecioCompra">Precio de compra</label>
                <input type="number" name="P_compra" id="" class="form-control" placeholder="Ingrese precio de compra" required value="<?= $peli["precioCompra"] ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="PrecioAlquiler">Precio de alquiler</label>
                <input type="number" name="P_alquiler" id="" class="form-control" placeholder="Ingrese precio de alquiler" required value="<?= $peli["precioAlquiler"] ?>">
            </div>
            <div class="form-group col-md-2">
                <label for="stock">Stock</label>
                <input placeholder="Stock" type="number" name="stock" class="form-control" required value="<?= $peli["stock"] ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="imagen">Imagen</label>
                <input type="text" placeholder="imagen" name="imagen" class="form-control" required" value="<?= $peli["imagen"] ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="disponibilidad">Disponibilidad</label>
                <select name="disponibilidad" class="form-control">
                    <option>Seleccionar</option>
                    <?php foreach ($disponibles as $key) : ?>
                        <?php if ($key["id"] == $peli["disponibilidad"]) : ?>
                            <option value="<?= $key["id"] ?>" selected>
                                <?= $key["title"] ?>
                            </option>
                        <?php endif ?>

                        <?php if ($key["id"] != $peli["disponibilidad"]) : ?>
                            <option value="<?= $key["id"] ?>">
                                <?= $key["title"] ?>
                            </option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
        <div id="error" class="alert alert-danger d-none" role="alert">
            Error! usuario o contraseña incorrectos
        </div>
    </form>
</div>

<?php
if ($_POST) {
    echo "Esto es post<br><br>";
    // var_dump($_POST);

    echo "ID de la pelicula" . $pelicula->get_Id_Pelicula() . "<br><br>";
    echo "ID de la pelicula" . $pelicula->getNombre() . "<br><br>";
    echo "ID de la pelicula" . $pelicula->getDescripcion() . "<br><br>";
    echo "ID de la pelicula" . $pelicula->get_Id_Categoria() . "<br><br>";
    echo "ID de la pelicula" . $pelicula->getIdioma() . "<br><br>";
    echo "ID de la pelicula" . $pelicula->get_Id_Calidad() . "<br><br>";
    echo "ID de la pelicula" . $pelicula->getprecioCompra() . "<br><br>";
    echo "ID de la pelicula" . $pelicula->getprecioAlquiler() . "<br><br>";
    echo "ID de la pelicula" . $pelicula->getStock() . "<br><br>";
    echo "ID de la pelicula" . $pelicula->getImagen() . "<br><br>";
    echo "ID de la pelicula" . $pelicula->getDisponibilidad() . "<br><br>";
}
?>