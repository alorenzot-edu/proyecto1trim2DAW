<?
session_start();
require '../vista/inicio.html';
if(!isset($_SESSION['dni'])){
    require '../vista/mensajeConfirmar.html';
} else {
    if(isset($_POST['pedidoConfirmado'])){
        require '../config/autocarga.php';
        $bd = new Bd();
        try {
            $dir = $_POST['dirEntrega'];    //A la hora de meter estas dos variables
            $tar = $_POST['nTarjeta'];      //en la base de datos aparecen vacías
            $ped = new Pedido($_SESSION['idUnico'],$dir, $tar, $_SESSION['dni']);
            $bd->link->beginTransaction();
            if (!$ped->existe($bd->link)) {			
                $ped->insertar($bd->link);			
            }
            $idProductos = $_POST['idProducto'];
            $unidades = $_POST['unidades'];
            for($i = 0; $i < count($idProductos) ; $i++){
                $lin = new Linea($_SESSION['idUnico'], $idProductos[$i], $unidades[$i]);
                $lin->insertar($bd->link);
            }
            $carrito = new Carrito($_SESSION['idUnico'],'','','','');
            $carrito->borrar($bd->link);
            $bd->link->commit();
            header("Location: exitoPedido.php");
        } catch (Exception $e) {
            $bd->link->rollback();
            $dato = "Fallo: " . $e->getMessage();
        }
        $dato .= "<br><a href=index.php> volver</a>";
        require "../vista/mensaje.php";
    
    } else require '../vista/confirmar.php';
}