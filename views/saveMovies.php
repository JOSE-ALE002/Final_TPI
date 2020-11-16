<div class="container mb-4">
    <form method="POST">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" class="form-control" placeholder="Ingrese el titulo de la pelicula" required>
            </div>
            <div class="form-group col-md-3">
                <label for="Categoria">Categoria</label>
                <select name="categoria" aria-selected="Terror" class="form-control">
                    <?php foreach ($categoria as $key) : ?>
                        <option value="<?= $key["idCategoria"] ?>">
                            <?= $key["nombreCategoria"] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="idioma">Idioma</label>
                <select name="idioma" class="form-control">
                    <?php foreach ($idiomas as $key) : ?>
                        <option value="<?= $key ?>">
                            <?= $key ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion" cols="30" rows="10" class="form-control" placeholder="Descripcion" required>
            </textarea>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="Calidad">Calidad</label>
                <select name="calidad" class="form-control">
                    <?php foreach ($calidad as $key) : ?>
                        <option value="<?= $key["idCalidad"] ?>">
                            <?= $key["calidad"] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="PrecioCompra">Precio de compra</label>
                <input type="number" name="P_compra" id="" class="form-control" placeholder="Ingrese precio de compra" required>
            </div>
            <div class="form-group col-md-3">
                <label for="PrecioAlquiler">Precio de alquiler</label>
                <input type="number" name="P_alquiler" id="" class="form-control" placeholder="Ingrese precio de alquiler" required>
            </div>
            <div class="form-group col-md-2">
                <label for="stock">Stock</label>
                <input placeholder="Stock" type="number" name="stock" class="form-control" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="imagen">Imagen</label>
                <input type="text" placeholder="imagen" name="imagen" class="form-control" required>
            </div>
            <div class="form-group col-md-4">
                <label for="disponibilidad">Disponibilidad</label>
                <select name="disponibilidad" class="form-control">
                    <option>Selecccionar</option>
                    <?php foreach ($disponibles as $key) : ?>
                        <option value="<?= $key["id"] ?>" selected>
                            <?= $key["title"] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
        <p id="error"></p>
    </form>
</div>