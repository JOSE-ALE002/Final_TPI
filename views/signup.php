<?php 
    if (!empty($_POST) && isset($_POST["email"])) {
        require_once "controllers/HomeController.php";
        $signup = new HomeController();
        
        if($signup->signup($_POST["nombre"], $_POST["apellido"], $_POST["direccion"], $_POST["email"], $_POST["contra"]))
        {
            header("Location: " . BASE_DIR."Home/home");
        }
        else
        {
            $SignupErr = "<p>Error! Correo Registrado</p>";
        }
        
    }
    else
    {
        $SignupErr = "";
    }
?>
<main>
    <div class="row">
        <div class="mx-auto col-md-6">
            <h1>Guardar Usuario</h1>
            <form method="POST">
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre" required>
                </div>

                <div class="form-group">
                    <label for="">Apellido</label>
                    <input type="text" name="apellido" class="form-control" placeholder="Ingrese apellido" required>
                </div>

                <div class="form-group">
                    <label for="">Direccion</label>
                    <input type="text" name="direccion" class="form-control" placeholder="Ingrese direccion" required>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingrese email" required>
                </div>

                <div class="form-group">
                    <label for="">Contraseña</label>
                    <input type="password" class="form-control" name="contra" placeholder="Ingrese contraseña" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <?=$SignupErr?>
            </form>
        </div>
    </div>
</main>