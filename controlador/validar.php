<?php
require '../vista/inicio.html';
if (isset($_POST['enviar'])) {
    //Opciones de usuario con sesion
    echo $_POST['email'];
    echo $_POST['pwd'];
    include "../config/autocarga.php";
    $bd = new Bd();
    //Verificamos si el usuario introducido se encuentra en la base de datos, y si es así, se le iniciará sesión
    $clienteAux = new Cliente('','','',$_POST['email'],$_POST['pwd']);
    $validar = $clienteAux->validar($bd->link);
    echo "<br>";
    if($validar == true){
        //Si llegamos aquí, las credenciales son correctas
        $cliente = $clienteAux->buscar($bd->link);
        session_start();
        $_SESSION['nombre'] = $cliente['nombre'];
        $_SESSION['dni'] = $cliente['dniCliente']; 
        if(!isset($_SESSION['idUnico'])){
            $_SESSION['idUnico'] = uniqid();
        }        
        header("Location: index.php");
    } else {
        //Si llegamos aquí, las credenciales son incorrectas
        include "../vista/credencialesIncorrectas.html";
    }
    $bd=NULL;  
} else {
    //Opciones de usuario sin sesion
    require '../vista/login.html';
}
