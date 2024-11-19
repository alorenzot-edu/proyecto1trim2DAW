<?php 
session_start();
if(!isset($_SESSION['idUnico'])){  //Nos aseguramos de que el usuario tenga variable de sesión
    header("Location: index.php");
}
require '../vista/inicio.html';
if (isset($_POST['enviar'])) {  //Si el usuario ha enviado sus datos por el formulario

    if ($_POST['pwd'] == $_POST['pwd2']) { //Nos aseguramos de que la contraseña coincide con la confirmación de contraseña
        include "../config/autocarga.php";
        $bd = new Bd();
        //Verificamos si el usuario introducido se encuentra en la base de datos
        $cli = new Cliente($_POST['dniCliente'], $_POST['nombre'], $_POST['direccion'], $_POST['email'], $_POST['pwd']);

        if ($cli->buscar($bd->link)) {  //Si ya existe no debemos insertarlo
            require "../vista/redirigir.html";
        } else { //Si no existe lo insertamos y le damos las variables de sesión, sin obligarlo a iniciar sesion otra vez
            $cli->insertar($bd->link);
            $_SESSION['nombre'] = $_POST['nombre'];
            $_SESSION['dni'] = $_POST['dniCliente'];
            require "../vista/exito.php";
        }
        $bd = NULL;
    } else require "../vista/credencialesIncorrectas.html";
} else {
    require '../vista/registro.html';
}


$consulta=json_decode(file_get_contents("http://$ip/LorenzoToledoAlejandro1T/Api/ServicioCliente.php"),true);
