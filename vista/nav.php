<nav>

    <div class="logo"><a style="color:white; text-decoration: none;" href="index.php">GZZ</a></div>

    <div class="categorias d-flex justify-content-center">
        <div class="iconoPequeño"><img src="../vista/img/ri_menu-5-fill.png" alt=""></div>
        <a style="text-decoration: none;" href="productos.php"><div class="texto blanco responsive">Todos los productos</div></a>
        <!--Desplegable de categorias-->
    </div>

    <div class="buscar d-flex">
        <div class="iconoPequeño"><img src="../vista/img/pixelarticons_search.png" alt=""></div>
        <input type="text" placeholder="Buscar">
    </div>

    <div class="funciones d-flex">
        <div class="icono">
            <div class="dropdown" style="margin-right: 50px;">
                <button class="btn btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../vista/img/pixelarticons_user.png" alt="">
                </button>     
                <ul class="dropdown-menu">
                    <?if(!isset($_SESSION['nombre'])){?>
                    <li><a class="dropdown-item" href="validar.php">Inicia Sesión</a></li>
                    <?} else {?>
                    <li class="dropdown-item">Usuario: <?echo $_SESSION['nombre']?></li>
                    <li><a class="dropdown-item" href="salir.php">Cerrar Sesión</a></li>
                    <?}?>
                </ul>
            </div>

        </div>
        <div class="icono">
            <a href="verCarrito.php"><img src="../vista/img/memory_cart.png" alt=""></a>
        </div>
    </div>

</nav>