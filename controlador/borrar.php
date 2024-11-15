<?
require '../config/autocarga.php';
session_start();
$idCarrito = $_SESSION['idUnico'];
$idProducto = $_GET['idProducto'];

$bd = new Bd();
$carrito = new Carrito($idCarrito,$idProducto,'','','');
$carrito->borrar($bd->link);
header("Location: verCarrito.php");