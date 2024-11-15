<?
session_start();
require '../config/autocarga.php';
$idProducto = $_GET['idProducto'];
$precio = $_GET['precio'];
$dni = '';
if(isset($_SESSION['dni'])){
    $dni = $_SESSION['dni'];
}
$bd = new Bd();
$unidades = 1;
$carrito = new Carrito($_SESSION['idUnico'],$idProducto,$unidades,$precio,$dni);
if($carrito->buscarProducto($bd->link)){
    $carrito->sumarProducto($bd->link);
} else {
    $carrito->insertar($bd->link);
}
header("Location: index.php");