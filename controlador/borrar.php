<?
require '../config/autocarga.php';
session_start();
$idCarrito = $_SESSION['idUnico'];
$carrito;
$bd = new Bd();

if(isset($_GET['idProducto'])){
    $idProducto = $_GET['idProducto'];
    $carrito = new Carrito($idCarrito,$idProducto,'','','');
    $carrito->borrarProducto($bd->link);
} else{
    $carrito = new Carrito($idCarrito,'','','','');
    $carrito->borrar($bd->link);
}

header("Location: verCarrito.php");