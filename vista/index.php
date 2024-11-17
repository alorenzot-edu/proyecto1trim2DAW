<?php
require 'inicio.html';
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
                <img src="../vista/img/ataque a los titanes.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-md-block">
                    <div style="background-color: black; width:200px;">
                        <h5>Ataque a los Titanes</h5>
                        <p>Descubre todos los productos</p>
                    </div>    
                    </div>
                </div>
                <div class="carousel-item">
                <img src="../vista/img/fortnite.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-md-block">
                    <div style="background-color: black; width:200px;">
                        <h5>Fortnite</h5>
                        <p>¿Dónde caemos?</p>
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

        <?require '../vista/footer.html';?>

    </div>



</body>

</html>