<?php
require '../vista/inicio.html';
if (isset($_POST['enviar'])) {

    if ($_POST['pwd'] == $_POST['pwd2']) {
        include "../config/autocarga.php";
        $bd = new Bd();
        //Verificamos si el usuario introducido se encuentra en la base de datos
        $cli = new Cliente($_POST['dniCliente'], $_POST['nombre'], $_POST['direccion'], $_POST['email'], $_POST['pwd']);

        if ($cli->buscar($bd->link)) {
            require "../vista/redirigir.html";
        } else {
            $cli->insertar($bd->link);
            session_start();
            $_SESSION['nombre'] = $_POST['nombre'];
            $_SESSION['dni'] = $_POST['dniCliente'];
            require "../vista/exito.php";
        }
        $bd = NULL;
    } else require "../vista/credencialesIncorrectas.html";
} else {
    require '../vista/registro.html';
}
