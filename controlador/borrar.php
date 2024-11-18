<?
require '../config/autocarga.php';
session_start(); //Indicamos que vamos a usar sesiones
$idCarrito = $_SESSION['idUnico']; //Recogemos el idCarrito de la variable de sesion
$carrito;
$bd = new Bd();

if(isset($_GET['idProducto'])){             //Si se pasa la idProducto por url
    $idProducto = $_GET['idProducto'];
    $carrito = new Carrito($idCarrito,$idProducto,'','','');
    $carrito->borrarProducto($bd->link);    //borraremos ese producto del carrito
} else{                                     //Si no,
    $carrito = new Carrito($idCarrito,'','','','');
    $carrito->borrar($bd->link);            //borraremos lel carrito
}

header("Location: verCarrito.php");