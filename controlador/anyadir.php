<?
session_start();
require '../config/autocarga.php';
$idProducto = $_GET['idProducto'];
$precio = $_GET['precio'];
echo $precio;
$dni = '';
if(isset($_SESSION['dni'])){
    $dni = $_SESSION['dni'];
}
$bd = new Bd();
$carrito = new Carrito($_SESSION['idUnico'],$idProducto,1,$precio,$dni);
$carrito->insertar($bd->link);
header("Location: index.php");