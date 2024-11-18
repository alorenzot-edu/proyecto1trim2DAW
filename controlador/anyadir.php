<?
session_start(); //Indicamos que vamos a usar sesiones
require '../config/autocarga.php';
$idProducto = $_GET['idProducto']; //Recogemos los valores por get
$precio = $_GET['precio'];
$dni = '';
if(isset($_SESSION['dni'])){
    $dni = $_SESSION['dni']; //Si el usuario tiene sesión, añadiremos el dni en el carrito
}
$bd = new Bd();
$unidades = 1;
if(isset($_GET['unidades'])){
    $unidades = $_GET['unidades'];
}
//Creamos el objeto carrito para insertarlo en la base de datos
$carrito = new Carrito($_SESSION['idUnico'],$idProducto,$unidades,$precio,$dni);
if($carrito->buscarProducto($bd->link)){    //Si el carrito ya tiene el producto
    $carrito->sumarProducto($bd->link);     //Se le suma una unidad
} else {                                    //si no tiene el producto
    $carrito->insertar($bd->link);          //se inserta como uno nuevo
}
header("Location: index.php");