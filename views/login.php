<?php if (isset($_SESSION["nombre"]) && isset($_SESSION["rol"])) {
    header("Location: " . BASE_DIR . "Home/home");
} else { ?>
    <section class="containerLogin">   
        <div class="container pt-5">
            <a href="<?= BASE_DIR ?>">Volver</a>
        </div>
        <div class="form-container">
            <h2>Login</h2>
            <form action="<?= BASE_DIR ?>Home/login" method="POST">
                <div class="control">
                    <i class="fas fa-user"></i>
                    <input type="email" name="email" placeholder="Username or Email" required>
                </div>

                <div class="control">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="contra" placeholder="Password" required>
                </div>

                <input type="submit" value="Sign in" />

                <div class="container">
                    <h6 class="text-white text-center">¿No estas registrado?</h6>
                    <a href="<?= BASE_DIR ?>/Home/signup" class="d-block btn-sm text-center">Crear una cuenta</a>
                </div>

                <div id="error" class="alert alert-danger d-none" role="alert">
                    Error! usuario o contraseña incorrectos
                </div>
            </form>
        </div>
    </section>
<?php } ?>