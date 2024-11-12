<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vista/styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Copse&family=Jersey+10&family=Lexend:wght@100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Pixelify+Sans:wght@400..700&family=Roboto&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <title>GZZ</title>
</head>

<body>



    <nav>

        <div class="logo">GZZ</div>

        <div class="categorias d-flex justify-content-center">
            <div class="iconoPequeño"><img src="../vista/img/ri_menu-5-fill.png" alt=""></div>
            <div class="texto blanco responsive">Todas las categorías</div>
            <!--Desplegable de categorias-->
        </div>

        <div class="buscar d-flex">
            <div class="iconoPequeño"><img src="../vista/img/pixelarticons_search.png" alt=""></div>
            <input type="text" placeholder="Buscar">
        </div>

        <div class="funciones d-flex">
            <div class="icono">
                <img src="../vista/img/pixelarticons_user.png" alt="">
            </div>
            <div class="icono">
                <img src="../vista/img/memory_cart.png" alt="">
            </div>
            <div class="icono">
                <img src="../vista/img/carbon_ibm-watson-language-translator.png" alt="">
            </div>
        </div>

    </nav>

    <!-- Revisar el carrusel q no va-->

    <div class="general">

        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../vista/img/zzzposter.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../vista/img/zzzposter.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../vista/img/zzzposter.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <div class="titulo">NOVEDADES</div>

        <div class="contenedorProductos">

            <div class="producto">
                <img class="imagen" src="../vista/img/zenless-zone-zero-anby-demara-1-7-figure-5 1.png" alt="">
                <div class="cont">
                    <div class="texto nombreProducto">Figura Anby Demara 1/7</div>
                    <div class="texto serieProducto">Zenless Zone Zero</div>
                    <div class="texto precioProducto">304.95€</div>
                </div>
                <div class="anyadir d-flex">
                    <div><img class="iconoPequeño" src="../vista/img/memory_cart.png" alt=""></div>
                    <div class="textoAnyadir">AÑADIR</div>
                </div>
            </div>

            <div class="producto">
                <img class="imagen" src="../vista/img/zenless-zone-zero-anby-demara-1-7-figure-5 1.png" alt="">
                <div class="cont">
                    <div class="texto nombreProducto">Figura Anby Demara 1/7</div>
                    <div class="texto serieProducto">Zenless Zone Zero</div>
                    <div class="texto precioProducto">304.95€</div>
                </div>
                <div class="anyadir d-flex">
                    <div><img class="iconoPequeño" src="../vista/img/memory_cart.png" alt=""></div>
                    <div class="textoAnyadir">AÑADIR</div>
                </div>

            </div>

            <div class="producto">
                <img class="imagen" src="../vista/img/zenless-zone-zero-anby-demara-1-7-figure-5 1.png" alt="">
                <div class="cont">
                    <div class="texto nombreProducto">Figura Anby Demara 1/7</div>
                    <div class="texto serieProducto">Zenless Zone Zero</div>
                    <div class="texto precioProducto">304.95€</div>
                </div>
                <div class="anyadir d-flex">
                    <div><img class="iconoPequeño" src="../vista/img/memory_cart.png" alt=""></div>
                    <div class="textoAnyadir">AÑADIR</div>
                </div>
            </div>

            <div class="producto">
                <img class="imagen" src="../vista/img/zenless-zone-zero-anby-demara-1-7-figure-5 1.png" alt="">
                <div class="cont">
                    <div class="texto nombreProducto">Figura Anby Demara 1/7</div>
                    <div class="texto serieProducto">Zenless Zone Zero</div>
                    <div class="texto precioProducto">304.95€</div>
                </div>
                <div class="anyadir d-flex">
                    <div><img class="iconoPequeño" src="../vista/img/memory_cart.png" alt=""></div>
                    <div class="textoAnyadir">AÑADIR</div>
                </div>

            </div>

            <div class="producto">
                <img class="imagen" src="../vista/img/zenless-zone-zero-anby-demara-1-7-figure-5 1.png" alt="">
                <div class="cont">
                    <div class="texto nombreProducto">Figura Anby Demara 1/7</div>
                    <div class="texto serieProducto">Zenless Zone Zero</div>
                    <div class="texto precioProducto">304.95€</div>
                </div>
                <div class="anyadir d-flex">
                    <div><img class="iconoPequeño" src="../vista/img/memory_cart.png" alt=""></div>
                    <div class="textoAnyadir">AÑADIR</div>
                </div>

            </div>

        </div>

        <div class="titulo">DESTACADOS</div>

        <div class="contenedorProductos">

            <div class="producto">
                <img class="imagen" src="../vista/img/zenless-zone-zero-anby-demara-1-7-figure-5 1.png" alt="">
                <div class="cont">
                    <div class="texto nombreProducto">Figura Anby Demara 1/7</div>
                    <div class="texto serieProducto">Zenless Zone Zero</div>
                    <div class="texto precioProducto">304.95€</div>
                </div>
                <div class="anyadir d-flex">
                    <div><img class="iconoPequeño" src="../vista/img/memory_cart.png" alt=""></div>
                    <div class="textoAnyadir">AÑADIR</div>
                </div>
            </div>

            <div class="producto">
                <img class="imagen" src="../vista/img/zenless-zone-zero-anby-demara-1-7-figure-5 1.png" alt="">
                <div class="cont">
                    <div class="texto nombreProducto">Figura Anby Demara 1/7</div>
                    <div class="texto serieProducto">Zenless Zone Zero</div>
                    <div class="texto precioProducto">304.95€</div>
                </div>
                <div class="anyadir d-flex">
                    <div><img class="iconoPequeño" src="../vista/img/memory_cart.png" alt=""></div>
                    <div class="textoAnyadir">AÑADIR</div>
                </div>

            </div>

            <div class="producto">
                <img class="imagen" src="../vista/img/zenless-zone-zero-anby-demara-1-7-figure-5 1.png" alt="">
                <div class="cont">
                    <div class="texto nombreProducto">Figura Anby Demara 1/7</div>
                    <div class="texto serieProducto">Zenless Zone Zero</div>
                    <div class="texto precioProducto">304.95€</div>
                </div>
                <div class="anyadir d-flex">
                    <div><img class="iconoPequeño" src="../vista/img/memory_cart.png" alt=""></div>
                    <div class="textoAnyadir">AÑADIR</div>
                </div>
            </div>

            <div class="producto">
                <img class="imagen" src="../vista/img/zenless-zone-zero-anby-demara-1-7-figure-5 1.png" alt="">
                <div class="cont">
                    <div class="texto nombreProducto">Figura Anby Demara 1/7</div>
                    <div class="texto serieProducto">Zenless Zone Zero</div>
                    <div class="texto precioProducto">304.95€</div>
                </div>
                <div class="anyadir d-flex">
                    <div><img class="iconoPequeño" src="../vista/img/memory_cart.png" alt=""></div>
                    <div class="textoAnyadir">AÑADIR</div>
                </div>

            </div>

            <div class="producto">
                <img class="imagen" src="../vista/img/zenless-zone-zero-anby-demara-1-7-figure-5 1.png" alt="">
                <div class="cont">
                    <div class="texto nombreProducto">Figura Anby Demara 1/7</div>
                    <div class="texto serieProducto">Zenless Zone Zero</div>
                    <div class="texto precioProducto">304.95€</div>
                </div>
                <div class="anyadir d-flex">
                    <div><img class="iconoPequeño" src="../vista/img/memory_cart.png" alt=""></div>
                    <div class="textoAnyadir">AÑADIR</div>
                </div>

            </div>

        </div>

        <div class="footer"> 

            <div class="apartado a1">
                Geek Zone Zero
                <div class="localizacion">
                    <div class="ubiFoto"><img src="../vista/img/fluent_location-12-filled.png" alt=""></div>
                    <div class="ubi">
                        <p>Gzz Llíria</p>
                        <p>640 123 456</p>
                    </div>
                </div>

                <div class="localizacion">
                    <div class="ubiFoto"><img src="../vista/img/fluent_location-12-filled.png" alt=""></div>
                    <div class="ubi">
                        <p>Gzz La Pobla de Vallbona</p>
                        <p>640 999 999</p>
                    </div>
                </div>

            </div>

            <div class="apartado a2">
                PRODUCTOS
                <div class="link">Videojuegos</div>
                <div class="link">Anime y manga</div>
                <div class="link">Novedades</div>
                <div class="link">Desacados</div>
            </div>
            <div class="apartado a3">
                INFO
                <div class="link">Contacto</div>
                <div class="link">Registro</div>
                <div class="link">Cookies</div>
            </div>

        </div>

    </div>



</body>

</html>