<?php session_start() ?>
<div class="contenedorGeneral row">

  <section class="h-100" style="font-family: 'copse';">
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-10" id="productosCarrito">

          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-normal mb-0">Carrito</h3>
          </div>

          <div id="mensajeVacio"></div>
          <script>
            localStorage.setItem('idUnico', "<?php echo $_SESSION['idUnico']; ?>");
          </script>
          <script src="../controlador/carrito.js"></script>

        </div>
        
        <div id="actualizar" class="card col-10">
          <div class="card-body">
            <button style="background-color: gray; border: none; color: white;" type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-block btn-lg  w-100">Actualizar carrito</button>
          </div>
        </div>

        <div id="pago" class="card col-10">
          <div class="card-body">
          <a style="text-decoration: none; color:white;" href="confirmar.php">
            <button style="background-color: #ff003c; border: none; color: white;" type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-block btn-lg  w-100">Proceder al pago</button>
          </a>
          </div>
        </div>
        
      </div>
    </div>
  </section>

</div>