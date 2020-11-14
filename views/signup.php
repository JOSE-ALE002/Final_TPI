<div class="row">
    <div class="mx-auto col-md-6">
        <h1>Guardar Usuario</h1>
        <form action="<?= BASE_DIR ?>Home/signup" method="POST">
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre">
            </div>

            <div class="form-group">
                <label for="">Apellido</label>
                <input type="text" name="apellido" class="form-control" placeholder="Ingrese apellido">
            </div>

            <div class="form-group">
                <label for="">Direccion</label>
                <input type="text" name="direccion" class="form-control" placeholder="Ingrese direccion">
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Ingrese email">
            </div>

            <div class="form-group">
                <label for="">Contraseña</label>
                <input type="password" class="form-control" name="contra" placeholder="Ingrese contraseña">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

        </form>
    </div>
</div>