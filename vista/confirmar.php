<div class="contenedorGeneral" style="background-color: rgb(240, 240, 240);">

    <div class="caja col-9">
        <h4>Resumen</h4>
        <form method="post">
        <div id="resumenPedido">

            
        </div>

        <script src="confirmar.js"></script>
        
        <h5>Envío +4€</h5>
        <h5 style="font-weight: bold;" id="precioFinal">Precio final</h5>

        <br>
        <h4>Introduce tus datos</h4>
            <label for="nombre">Nombre</label><br>
            <input class="inputPago" type="text" placeholder="Nombre" value="<? echo $_SESSION['nombre'] ?>" required><br>
            <label for="DNI">DNI</label><br>
            <input class="inputPago" type="text" placeholder="DNI" value="<? echo $_SESSION['dni'] ?>" required><br>
            <label for="dirEntrega">Dirección de entrega</label><br>
            <input class="inputPago" type="text" placeholder="Dirección" name="dirEntrega" required><br>
            <label for="nTarjeta">Nº Tarjeta</label><br>
            <input class="inputPago" type="text" placeholder="1234 5678 9101" name="nTarjeta" required><br>
            <button class="btn btn-warning btn-block btn-lg  w-100" style="background-color: #ff003c; border: none; color: white;" type="submit" name="pedidoConfirmado">Pagar</button>
        </form>
        <a href="verCarrito.php">Cancelar y volver</a>

    </div>
</div>

