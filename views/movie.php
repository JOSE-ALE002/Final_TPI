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
            <div class="row col">
                <div class="col-12">
                    <p class="text-muted">Comprar: $ <?= $movie["precioAlquiler"] ?></p>
                </div>
                <div class="col-12">
                    <p class="text-muted">Alquilar: $ <?= $movie["precioCompra"] ?></p>
                </div>
            </div>
            <a href="">Add Card</a>
        </div>
        </div>
    </div>
    </div>
</main>