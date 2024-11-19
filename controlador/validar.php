<?php
require '../vista/inicio.html';
include "../config/autocarga.php";
$bd = new Bd();
if (isset($_POST['enviar'])) {  
        $cliente = new Cliente('','','',$_POST['email'],$_POST['pwd']);
        if($cliente->buscar($bd->link)){
            if($cliente->validar($bd->link)){
                $cliente = $cliente->buscar($bd->link);
                session_start();
                $_SESSION['nombre'] = $cliente['nombre'];
                $_SESSION['dni'] = $cliente['dniCliente'];
                require '../vista/exito.php';
            } else {
                require '../vista/credencialesIncorrectas.html';
            }

        } else {
            echo "no existe el cliente";
        }
        
    
    
    
} else {
    require '../vista/login.html';
}