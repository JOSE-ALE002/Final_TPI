
<?php
    if (!empty($_POST) && isset($_POST["email"])) {
        require_once "controllers/HomeController.php";
        $login = new HomeController();
        
        if($login->login($_POST["email"], $_POST["contra"]))
        {
            header("Location: " . BASE_DIR."Home/home");
        }
        else
        {
            $loginErr = "<p>Error! usuario o contraseña incorrectos</p>";
        }
        
    }
    else
    {
        $loginErr = "";
    }
?>

<main>
    <div class="row">
        <div class="mx-auto col-md-6">
            <h1>Login Usuario</h1>
            <form method="POST">
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
                <?=$loginErr?>
            </form>
        </div>
    </div>
</main>