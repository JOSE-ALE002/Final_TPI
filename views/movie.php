<main>
    
    <div class="card mb-3 text-light" style="background-color: #212F3C;">
    <div class="row no-gutters">
        <div class="col-md-4">
        <img src="<?= $movie["imagen"] ?>" class="card-img" alt="<?= $movie["nombre"] ?>"  style="max-width: 300px;">
        </div>
        <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title"><h1 class="text-light"><?= $movie["nombre"] ?></h1></h5>
            <h4 class="card-text"><?= $movie["descripcion"] ?></h4>
            <p class="text-muted">Idioma: <?= $movie["idioma"] ?></p>
            <p class="text-muted">Calidad: <?= $movie["calidad"] ?></p>
            <p class="text-muted">Categoria: <?= $movie["nombreCategoria"] ?></p>

            <div>
            </div>

            <div class="row col-12 mt-2" data-idpelicula="<?php echo $movie["idPelicula"]; ?>" data-idusuario="<?php echo $_SESSION['id']; ?>" data-nombre="<?php echo $movie["nombre"]; ?>">
                
                <?php 
                    $peliculaAux = new Pelicula();
                ?>

                <div class="row col-12">
                    <?php if(!$peliculaAux->verifyCompra($movie["idPelicula"], $_SESSION["id"])) { ?>
                        <a class="btn btn-success btn-comprar" data-precio="<?php echo $movie['precioCompra'];?>">Comprar: $ <?= $movie["precioCompra"]; ?></a>
                    <?php } else { ?>
                        <p class="text-success">Ya compro esta pelicula</p>
                    <?php } ?>
                </div>

                <div class="row col-12 mt-3">
                    <?php if(!$peliculaAux->verifyAlquiler($movie["idPelicula"], $_SESSION["id"])) { ?>
                        <a class="btn btn-danger btn-alquilar" data-precio="<?php echo $movie['precioAlquiler'];?>">Alquilar: $ <?= $movie["precioAlquiler"]; ?></a>
                    <?php } else { ?>
                        <p class="text-success">Ya alquilo esta pelicula</p>
                    <?php } ?>
                    
                </div>
            </div>

        </div>
        </div>
    </div>
    </div>
</main>