<?
session_start();
if(!isset($_SESSION['idUnico'])){  //Nos aseguramos de que el usuario tenga variable de sesión
    header("Location: index.php");
}
require '../vista/inicio.html';
if(!isset($_SESSION['dni'])){   //Como se necesita dni para el pago, redirigimos al usuario para que inicie sesión
    require '../vista/mensajeConfirmar.html';
} else {
    if(isset($_POST['pedidoConfirmado'])){  //Si se ha confirmado el pedido, iniciamos el proceso
        require '../config/autocarga.php';
        $bd = new Bd();
        try {
            $dir = $_POST['dirEntrega'];    //A la hora de meter estas dos variables
            $tar = $_POST['nTarjeta'];      //en la base de datos aparecen vacías
            $ped = new Pedido($_SESSION['idUnico'],$dir, $tar, $_SESSION['dni']); //Creamos el pedido
            $bd->link->beginTransaction();  //Iniciamos la transacción
            if (!$ped->existe($bd->link)) { //Si no existe, insertamos el pedido
                $ped->insertar($bd->link);			
            }
            $idProductos = $_POST['idProducto'];
            $unidades = $_POST['unidades'];
            for($i = 0; $i < count($idProductos) ; $i++){
                $lin = new Linea($_SESSION['idUnico'], $idProductos[$i], $unidades[$i]); //Creamos cada linea del pedido
                $lin->insertar($bd->link);                                               //y las insertamos
            }
            $carrito = new Carrito($_SESSION['idUnico'],'','','','');
            $carrito->borrar($bd->link);    //Como ya hemos terminado el pedido, borramos el carrito
            $bd->link->commit();    //Si todo va bien, hacemos commit
            header("Location: exitoPedido.php");
        } catch (Exception $e) {
            $bd->link->rollback();  //Si algo sale mal, hacemos rollback
            $dato = "Fallo: " . $e->getMessage();
        }
        $dato .= "<br><a href=index.php> volver</a>";
        require "../vista/mensaje.php";
    
    } else require '../vista/confirmar.php'; //Si no se confirma el pedido, se muestra la página de confirmar
}