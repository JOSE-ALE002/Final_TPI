<main>
    <div class="row">    
        <div class="mx-auto col-md-6">
            <h1>Login Usuario</h1>
            <form action="<?= BASE_DIR ?>Home/login" method="POST">
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Ingrese username">
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="contra" placeholder="Ingrese contraseña">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>

</main>