<?php if (isset($_SESSION["nombre"]) && isset($_SESSION["rol"])) {
    header("Location: " . BASE_DIR . "Home/home");
} else { ?>
    <section class="containerLogin">
        <div class="form-container">
            <h2 class="titulo">Login Usuario</h2>
            <form action="<?= BASE_DIR ?>Home/login" method="POST">
                <div class="control">
                    <label for="">Email</label>
                    <input type="email" name="email" placeholder="Ingrese email" required>
                </div>

                <div class="control">
                    <label for="">Password</label>
                    <input type="password" name="contra" placeholder="Ingrese contraseña" required>
                </div>

                <div class="control">
                    <input type="submit" value="Login"></input>
                </div>
                                
                <div id="error" class="alert alert-danger d-none" role="alert">
                    Error! usuario o contraseña incorrectos
                </div>
            </form>
        </div>
    </section>
<?php } ?>