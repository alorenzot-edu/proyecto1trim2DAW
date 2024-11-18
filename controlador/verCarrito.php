<?
session_start();
if(!isset($_SESSION['idUnico'])){  //Nos aseguramos de que el usuario tenga variable de sesión
    header("Location: index.php");
}
require '../vista/inicio.html';
require '../vista/nav.php';
require '../vista/carrito.php';
