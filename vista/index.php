<?php
include 'inicio.html';
?>
<title>GZZ</title>
</head>

<body>

    <?require "nav.php";?>

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
                    <div style="background-color: #ff003c; width:200px;">
                        <h5>Zenless Zone Zero</h5>
                        <p>Colección ya disponible</p>
                    </div>    
                    </div>
                </div>
                <div class="carousel-item">
                <img src="../vista/img/zzzposter.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-md-block">
                    <div style="background-color: #ff003c; width:200px;">
                        <h5>Zenless Zone Zero</h5>
                        <p>Colección ya disponible</p>
                    </div>    
                    </div>
                </div>
                <div class="carousel-item">
                <img src="../vista/img/zzzposter.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-md-block">
                    <div style="background-color: #ff003c; width:200px;">
                        <h5>Zenless Zone Zero</h5>
                        <p>Colección ya disponible</p>
                    </div>    
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span style="background-color: black; height: 100px;"  class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span style="background-color: black; height: 100px;"  class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <div class="titulo">NOVEDADES</div>

        <div class="contenedorProductos">
            <!--Aqui se inyectan los productos con js-->
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