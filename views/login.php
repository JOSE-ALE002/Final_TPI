<?php if (isset($_SESSION["nombre"]) && isset($_SESSION["rol"])) {
    header("Location: " . BASE_DIR . "Home/home"); 
}else{ ?>
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
                    <!-- <p id="error"></p> -->
                    <div id="error" class="alert alert-danger d-none" role="alert">
                        Error! usuario o contraseña incorrectos
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php } ?>