<main>
    <div class="row">
        <div class="mx-auto col-md-6">
            <h1>Login Usuario</h1>
            <form action="<?= BASE_DIR ?>Home/login" method="POST">
            <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingrese email" required>
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="contra" placeholder="Ingrese contraseña" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <p id="error"></p>
            </form>
        </div>
    </div>
</main>