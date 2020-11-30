<main>
    <?php if (isset($_SESSION["nombre"]) && isset($_SESSION["rol"])) : ?>
        <div class="mx-auto ">
            <?php if ($_SESSION["rol"] != "Usuario") : ?>                
                <div class=" p-5 mt-5">
                    <p class=" txt_white text_20">Filtrar por:</p>
                    <div class="form-check txt_white text_20 form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                        <label class="form-check-label" for="inlineRadio1">Todas</label>
                    </div>
                    <div class="form-check txt_white text_20 form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">Disponible</label>
                    </div>
                    <div class="form-check txt_white text_20 form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                        <label class="form-check-label" for="inlineRadio3">Indisponible</label>
                    </div>
                    <div class="form-input form-check-inline buscar_">
                        <i class="fas fa-search txt_white"></i>
                        <input type="text" name="search" id="searchAdmin" class=" buscar_input" placeholder="Buscar...">
                    </div>
                </div>
                <section role="main" class="table_container mx-auto" id="results-admin-movies">
                </section>
            </div>
        <?php endif ?>

        <?php if ($_SESSION["rol"] == "Usuario") : ?>
            <div id="main-container">
            <div class="jumbotron jumbotron-fluid d-flex align-items-center">
                <div class="container text-white">
                    <h2 class="display-4 font-weight-bold">John Wick 3: Parabellum</h2>
                    <p class="lead w-50">John Wick escapa luego de matar a un miembro de la asociación internacional de asesinos y, con una recompensa de 14 millones de dólares por su cabeza, es el objetivo de sicarios en todas partes.
                        Trilogía John Wick</p>
                    <button class="btn-jumbotron">
                        <i class="fas fa-play"></i>
                        <span class="ml-2">Ver trailer</span>
                    </button>
                    <button class="btn-jumbotron">
                        <i class="fas fa-info-circle"></i>
                        <span class="ml-2">Más informacion</span>
                    </button>
                </div>
            </div>
            <div class="container">
                <h3 class="text-danger">Peliculas recomendadas</h3>
            </div>
            <div class="wrapper">
                <section id="section1">
                    <?php foreach ($pelis as $i => $key) : ?>
                        <?php if ($i < 5) : ?>
                            <div class="item">
                                <a href="<?php echo BASE_DIR . "Pelicula/movie&id=" . $key["idPelicula"] ?>">
                                    <img src="<?= $key["imagen"] ?>" />
                                </a>
                                <div class="row">
                                    <div class="col-md-6 text-warning">
                                        <?php
                                        require_once "models/Pelicula.php";
                                        $p = new Pelicula();

                                        if ($p->verifyLike($key["idPelicula"], $_SESSION["id"])) { ?>
                                            <a href="#" class="like-count text-danger" data-idpelicula=<?php echo $key['idPelicula']; ?> data-idusuario="<?php echo $_SESSION['id']; ?>" data-estado="like">
                                                <i class="fas fa-heart"></i>
                                                <span class="text-warning"><?php echo $p->countLikes($key["idPelicula"]); ?></span>
                                            </a>
                                        <?php
                                        } else { ?>
                                            <a href="#" class="like-count text-danger" data-idpelicula=<?php echo $key['idPelicula']; ?> data-idusuario="<?php echo $_SESSION['id']; ?>" data-estado="dislike">
                                                <i class="far fa-heart"></i>
                                                <span class="text-warning"><?php echo $p->countLikes($key["idPelicula"]); ?></span>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>
                </section>
                <section id="section2">
                    <?php foreach ($pelis as $i => $key) : ?>
                        <?php if ($i >= 5 &&  $i < 10) : ?>
                            <div class="item">
                                <a href="<?php echo BASE_DIR . "Pelicula/movie&id=" . $key["idPelicula"] ?>"><img src="<?= $key["imagen"] ?>" />
                                </a>

                                <div class="row">
                                    <div class="col-md-6 text-warning">
                                        <?php
                                        require_once "models/Pelicula.php";
                                        $p = new Pelicula();

                                        if ($p->verifyLike($key["idPelicula"], $_SESSION["id"])) { ?>
                                            <a href="#" class="like-count text-danger" data-idpelicula=<?php echo $key['idPelicula']; ?> data-idusuario="<?php echo $_SESSION['id']; ?>" data-estado="like">
                                                <i class="fas fa-heart"></i>
                                                <span class="text-warning"><?php echo $p->countLikes($key["idPelicula"]); ?></span>
                                            </a>
                                        <?php
                                        } else { ?>
                                            <a href="#" class="like-count text-danger" data-idpelicula=<?php echo $key['idPelicula']; ?> data-idusuario="<?php echo $_SESSION['id']; ?>" data-estado="dislike">
                                                <i class="far fa-heart"></i>
                                                <span class="text-warning"><?php echo $p->countLikes($key["idPelicula"]); ?></span>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>
                </section>

                <!-- SECCION OPCIONAL -->

                <!-- <section id="section3">
                    <a href="#section2" class="arrow__btn">‹</a>
                    <div class="item">
                        <img src="https://occ-0-243-299.1.nflxso.net/dnm/api/v5/rendition/412e4119fb212e3ca9f1add558e2e7fed42f8fb4/AAAABRr4YxdaABuAuH_3FmSQZn7BCvLp-UUPsXE9MiYpvFP3CSUHV2zOew5oVqKqqdaOd3tbFVS0Uf67uIs7_eZydlCghg4nK0nMatRpPImABwTOhnNzCLCxdKrua7pPIcPCZqBYTeAO5g.jpg" />
                    </div>
                    <div class="item">
                        <img src="https://occ-0-243-299.1.nflxso.net/dnm/api/v5/rendition/412e4119fb212e3ca9f1add558e2e7fed42f8fb4/AAAABTyWK1MKaw8GcObtz47R2Tj7wkLJ7qQu9tk6TVpcoyxpzD4B-zZ569bQ5vGrREBL-MWFkGilXUwy7tCDaj2XOGkUB4RsbbFAmp9NgSr6lygMpUGNHSlyfrFbUORsRkrxSIoh_ggOvg.jpg" />
                    </div>
                    <div class="item">
                        <img src="https://occ-0-243-299.1.nflxso.net/dnm/api/v5/rendition/a76057bcfd003711a76fb3985b1f2cf74beee3b8/AAAABY7NwkWEJIfXsn6t3Li4bGSCQ1nEErPisI5ZZtXlC-_VRBZOUrhWK5X3vt3t6SR_cpgVhCwxgQqFFDJhk62Kk8hawOnYGZMr0LKeLczMFV2zalCFjkcdLksvT4HB2LEi6LFyruyk3Uu0LmNGsHfC2A8Bly60smr_3sDbz4RruXcklPOG1qYq9wUVu3zfaiwNvqmG4b8aFA.jpg" />
                    </div>
                    <div class="item">
                        <img src="https://occ-0-243-299.1.nflxso.net/dnm/api/v5/rendition/a76057bcfd003711a76fb3985b1f2cf74beee3b8/AAAABemXHOga9feFnOux6I2YyACBD94wvM7N3vcTGIfMpQ_BcaXeoeM9XyzdVdamKtxt0SHXZfvsl6czcp3E48tXMLtHBxuQsh1BjHtPGgJDZ81je_FjItINiqzLtir0A30s_e4KR8G3d7AYAPDjZVOY97bNpzNqtkcHcGp7fGnJByVCps1uLfG9U9tK3Ma1A_3JbRt0NiT2_Q.jpg" />
                    </div>
                    <div class="item">
                        <img src="https://occ-0-243-299.1.nflxso.net/dnm/api/v5/rendition/a76057bcfd003711a76fb3985b1f2cf74beee3b8/AAAABVxuRB932hvre-XP0gh6ar5ztoR3Oe3QjKHkyvcDnRak2MKXOrx5H7mFQSvggefMFOppwEs7ZCCpiqrJ_CYGvtvYB9NpU4SWUtNO6uV2u-DTID267AcHjHcGvGBQJ1ufddDkxcGOZyi5MlOQ5QUmBun4652FbYUnib3zMYQDgcna_Pvz8y_HO5fbokxezrRR1JZAAiqFSQ.jpg" />
                    </div>
                    <a href="#section1" class="arrow__btn">›</a>
                </section> -->
            </div>
            <!-- Codigo para el resto de las pelis-->
            <div class="container-fluid">
                <div class="row">
                    <nav id="sidebarMenu" class="col-md-2 bg-light d-md-block sidebar collapse">
                        <div class="sidebar-sticky pt-3">
                            <form action="">
                                <div class="input-group pt-3">
                                    <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                        <option value="ASC" selected>Ascendente</option>
                                        <option value="DESC">Descendente</option>
                                    </select>
                                </div>
                                <div class="form-check pt-3">
                                    <input class="form-check-input" type="checkbox" value="DESC" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Mas Populares
                                    </label>
                                </div>
                            </form>
                        </div>
                    </nav>
                    <section role="main" class="col-md-10" id="results-movies">
                    </section>
                </div>
        <?php endif ?>
    <?php endif ?>

    <?php if (!(isset($_SESSION["nombre"]) && isset($_SESSION["rol"]))) : ?>
        <div id="main-container">
            <div class="jumbotron jumbotron-fluid d-flex align-items-center">
                <div class="container text-white">
                    <h2 class="display-4 font-weight-bold">John Wick 3: Parabellum</h2>
                    <p class="lead w-50">John Wick escapa luego de matar a un miembro de la asociación internacional de asesinos y, con una recompensa de 14 millones de dólares por su cabeza, es el objetivo de sicarios en todas partes.
                        Trilogía John Wick</p>
                    <button class="btn-jumbotron">
                        <i class="fas fa-play"></i>
                        <span class="ml-2">Ver trailer</span>
                    </button>
                    <button class="btn-jumbotron">
                        <i class="fas fa-info-circle"></i>
                        <span class="ml-2">Más informacion</span>
                    </button>
                </div>
            </div>
            <div class="container">
                <h3 class="text-danger">Peliculas recomendadas</h3>
            </div>
            <div class="wrapper">
                <section id="section1">
                    <?php foreach ($pelis as $i => $key) : ?>
                        <?php if ($i < 5) : ?>
                            <div class="item bg-black">
                                <a href="<?php echo BASE_DIR . "Pelicula/movie&id=" . $key["idPelicula"] ?>"><img src="<?= $key["imagen"] ?>" /></a>

                                <div class="row">
                                    <div class="col-md-6 text-warning">
                                        <a href="<?php echo BASE_DIR?>Home/login" class="like-count text-danger text-decoration-none" data-idpelicula=<?php echo $key['idPelicula']; ?> data-idusuario="<?php echo $_SESSION['id']; ?>" data-estado="like">
                                            <i class="far fa-heart"></i>
                                            <span class="text-warning"><?php echo $pelicula->countLikes($key["idPelicula"]); ?></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>
                </section>
                <section id="section2">
                    <?php foreach ($pelis as $i => $key) : ?>
                        <?php if ($i >= 5 &&  $i < 10) : ?>
                            <div class="item bg-black">
                                <a href="<?php echo BASE_DIR . "Pelicula/movie&id=" . $key["idPelicula"] ?>">
                                    <img src="<?= $key["imagen"] ?>" />
                                </a>

                                <div class="row">
                                    <div class="col-md-6 text-warning">
                                        <a href="<?php echo BASE_DIR?>Home/login" class="like-count text-danger text-decoration-none" data-idpelicula=<?php echo $key['idPelicula']; ?> data-idusuario="<?php echo $_SESSION['id']; ?>" data-estado="like">
                                            <i class="far fa-heart"></i>
                                            <span class="text-warning"><?php echo $pelicula->countLikes($key["idPelicula"]); ?></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>
                </section>

                <!-- SECCION OPCIONAL -->

                <!-- <section id="section3">
                <a href="#section2" class="arrow__btn">‹</a>
                <div class="item">
                    <img src="https://occ-0-243-299.1.nflxso.net/dnm/api/v5/rendition/412e4119fb212e3ca9f1add558e2e7fed42f8fb4/AAAABRr4YxdaABuAuH_3FmSQZn7BCvLp-UUPsXE9MiYpvFP3CSUHV2zOew5oVqKqqdaOd3tbFVS0Uf67uIs7_eZydlCghg4nK0nMatRpPImABwTOhnNzCLCxdKrua7pPIcPCZqBYTeAO5g.jpg" />
                </div>
                <div class="item">
                    <img src="https://occ-0-243-299.1.nflxso.net/dnm/api/v5/rendition/412e4119fb212e3ca9f1add558e2e7fed42f8fb4/AAAABTyWK1MKaw8GcObtz47R2Tj7wkLJ7qQu9tk6TVpcoyxpzD4B-zZ569bQ5vGrREBL-MWFkGilXUwy7tCDaj2XOGkUB4RsbbFAmp9NgSr6lygMpUGNHSlyfrFbUORsRkrxSIoh_ggOvg.jpg" />
                </div>
                <div class="item">
                    <img src="https://occ-0-243-299.1.nflxso.net/dnm/api/v5/rendition/a76057bcfd003711a76fb3985b1f2cf74beee3b8/AAAABY7NwkWEJIfXsn6t3Li4bGSCQ1nEErPisI5ZZtXlC-_VRBZOUrhWK5X3vt3t6SR_cpgVhCwxgQqFFDJhk62Kk8hawOnYGZMr0LKeLczMFV2zalCFjkcdLksvT4HB2LEi6LFyruyk3Uu0LmNGsHfC2A8Bly60smr_3sDbz4RruXcklPOG1qYq9wUVu3zfaiwNvqmG4b8aFA.jpg" />
                </div>
                <div class="item">
                    <img src="https://occ-0-243-299.1.nflxso.net/dnm/api/v5/rendition/a76057bcfd003711a76fb3985b1f2cf74beee3b8/AAAABemXHOga9feFnOux6I2YyACBD94wvM7N3vcTGIfMpQ_BcaXeoeM9XyzdVdamKtxt0SHXZfvsl6czcp3E48tXMLtHBxuQsh1BjHtPGgJDZ81je_FjItINiqzLtir0A30s_e4KR8G3d7AYAPDjZVOY97bNpzNqtkcHcGp7fGnJByVCps1uLfG9U9tK3Ma1A_3JbRt0NiT2_Q.jpg" />
                </div>
                <div class="item">
                    <img src="https://occ-0-243-299.1.nflxso.net/dnm/api/v5/rendition/a76057bcfd003711a76fb3985b1f2cf74beee3b8/AAAABVxuRB932hvre-XP0gh6ar5ztoR3Oe3QjKHkyvcDnRak2MKXOrx5H7mFQSvggefMFOppwEs7ZCCpiqrJ_CYGvtvYB9NpU4SWUtNO6uV2u-DTID267AcHjHcGvGBQJ1ufddDkxcGOZyi5MlOQ5QUmBun4652FbYUnib3zMYQDgcna_Pvz8y_HO5fbokxezrRR1JZAAiqFSQ.jpg" />
                </div>
                <a href="#section1" class="arrow__btn">›</a>
            </section> -->
            </div>

            <!-- Codigo para el resto de las pelis sin secion-->
            <div class="container-fluid">
                <div class="row">
                    <nav id="sidebarMenu" class="col-md-2 bg-light d-md-block sidebar collapse"
                    style="background-color: #1a1a1a;">
                        <div class="sidebar-sticky pt-3">
                            <form action="">
                                <div class="input-group pt-3">
                                    <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                        <option value="ASC" selected>Ascendente</option>
                                        <option value="DESC">Descendente</option>
                                    </select>
                                </div>
                                <div class="form-check pt-3">
                                    <input class="form-check-input" type="checkbox" value="DESC" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Mas Populares
                                    </label>
                                </div>
                            </form>
                        </div>
                    </nav>
                    <section role="main" class="col-md-10" id="results-movies">
                    </section>
        </div>
    <?php endif ?>
</main>