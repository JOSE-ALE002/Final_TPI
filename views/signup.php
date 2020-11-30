<?php if (isset($_SESSION["nombre"]) && isset($_SESSION["rol"])) {
    header("Location: " . BASE_DIR . "Home/home");
} else { ?>
    <section class="containerSignup">
    <div class="container pt-5">
            <a href="<?= BASE_DIR ?>">Volver</a>
        </div>
        <div class="row">
            <div class="form-container">
                <h2>Registrarse Como Usuario</h2>
                <form method="POST">
                    <div class="control">
                        <i class="fas fa-font"></i>
                        <input type="text" name="nombre" placeholder="Nombre" required>
                    </div>

                    <div class="control">
                        <i class="fas fa-font"></i>
                        <input type="text" name="apellido" placeholder="Apellido" required>
                    </div>

                    <div class="control">
                        <i class="fas fa-map"></i>
                        <input type="text" name="direccion" placeholder="Dirección" required>
                    </div>

                    <div class="control">
                        <i class="fas fa-at"></i>
                        <input type="email" name="email" placeholder="Email" required>
                    </div>

                    <div class="control">
                        <i class="fas fa-key"></i>
                        <input type="password" name="contra" placeholder="Contraseña" required>
                    </div>

                    <button type="submit">Registrarse</button>

                    <div id="error" class="alert alert-danger d-none" role="alert">
                        Error! Este correo ya se a registrado
                    </div>
                </form>
            </div>
            </main>
        </div>
    </section>
<?php } ?>