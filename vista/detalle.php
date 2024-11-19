<script>
    localStorage.setItem('idProductoDetalle', <?php echo $_GET['idProducto'] ?>)
</script>
<script src="detalle.js"></script>

<div style="position: relative; top: 80px; height:100vh;" class="d-flex justify-content-center align-items-center row w-100 flex-wrap">
    <div class="col col-md-5">
        <img id="imagenProducto" style="min-height: 200px; max-height: 400px; min-width: 200px; max-width: 400px; margin:20px; border-radius: 10px;" src="" alt="">
    </div>
    <div class="col col-md-5">
        <div class="row">
            <div class="col col-12 texto">
                <h1 id="nombre">Nombre</h1>
                <p id="marca"></p>
                <h3 id="precio">Precio</h3>
            </div>

            <div class="row">
                <form method="post">
                    <div class="col-2">
                        <input id="input" style="height: 100%; border: 1px solid black; border-radius: 5px;" type="number" name="unidades" placeholder="Cantidad" min="1" value="1">
                    </div>
                    <div style="visibility: collapse;">
                        <input type="text" name="idProducto" value="<?php echo $_GET['idProducto'] ?>">
                        <input id="precioProducto" type="number" name="precio" value="">
                    </div>
                        <div class="anyadir d-flex justify-content-center">
                            <img class="iconoPequeño" src="../vista/img/memory_cart.png">
                            <button style="background: none; border: none" type="submit" name="anyadir" class="textoAnyadir">AÑADIR</button>
                        </div>
                    </a>
                </form>
            </div>
        </div>


    </div>
</div>