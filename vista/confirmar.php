<div class="contenedorGeneral" style="background-color: rgb(240, 240, 240);">

    <div class="caja col-9">
        <h4>Resumen</h4>
        <form method="post">
        <div id="resumenPedido">

            
        </div>

        <script src="confirmar.js"></script>
        
        <div>Envío +4€</div>
        <div id="precioFinal">Precio final</div>

        <br>
        <h4>Introduce tus datos</h4>
            <label for="nombre">Nombre</label><br>
            <input style="border: 1px solid gray; margin: 2px;" type="text" placeholder="Nombre" value="<? echo $_SESSION['nombre'] ?>" required><br>
            <label for="DNI">DNI</label><br>
            <input style="border: 1px solid gray; margin: 2px;" type="text" placeholder="DNI" value="<? echo $_SESSION['dni'] ?>" required><br>
            <label for="dirEntrega">Dirección de entrega</label><br>
            <input style="border: 1px solid gray; margin: 2px;" type="text" placeholder="Dirección" name="dirEntrega" required><br>
            <label for="nTarjeta">Nº Tarjeta</label><br>
            <input style="border: 1px solid gray; margin: 2px;" type="text" placeholder="1234 5678 9101" name="nTarjeta" required><br>
            <button type="submit" name="pedidoConfirmado">Pagar</button>
        </form>
        <button><a href="verCarrito.php">Volver</a></button>

    </div>
</div>