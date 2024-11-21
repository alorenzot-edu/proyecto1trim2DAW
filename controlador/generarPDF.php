<?ob_start();
require '../config/autocarga.php';
$bd = new Bd();
session_start();
$carrito = file_get_contents('http://localhost/LorenzoToledoAlejandro1T/Api/ServicioCarrito.php?idCarrito='.$_SESSION['idUnico'],true);
$pedido = new Pedido($_SESSION['idUnico'],'','','');
$ped = $pedido->existe($bd->link);
$idPedido = $ped['idPedido'];
$fecha = $ped['fecha'];
$dni = $ped['dniCliente'];
$lineas = Linea::getall($bd->link);

function verTabla($array, $idPedido){
    $str = '';
    $total = 0;
    while($fila = $array->fetch(PDO::FETCH_ASSOC)){
        if($idPedido==$fila['idPedido']){
            $pro = recibirProducto($fila['idProducto']);
            $total+=(int)$fila['cantidad']*(int)$pro['precio'];
            $str.="<tr><td>".$pro['nombre']."</td><td>".$fila['cantidad']."</td><td>".(int)$fila['cantidad']*(int)$pro['precio']."</td></tr>";
        }
        
    }
    $str.="<tr><th>Total</th><td></td><th>$total €</th></tr>";
    return $str;
}

function recibirProducto($idProducto){
    $producto = file_get_contents("http://localhost/LorenzoToledoAlejandro1T/Api/ServicioProductos.php?id=$idProducto", true);
    return json_decode($producto, true);
}

?>
<h1>Pedido</h1>
<table>
    <tr><th>Factura</th><td><?echo $_SESSION['idUnico']?></td><td><?echo $fecha?></td></tr>
    <tr><th>Cliente</th><td><?echo $_SESSION['nombre']?></td><td><?echo $dni?></td></tr>
    <tr><th>Producto</th><th>Cantidad</th><th>Precio</th></tr>
    <?echo verTabla($lineas, $idPedido)?>
</table>

<style>
    table{
        width: 100%;
    }
    table *{
        text-align: left;
    }
</style>
<?
$html=ob_get_clean();

require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml($html); 
$dompdf->setPaper("A4", "portrait");
$dompdf->render();
$dompdf->stream("factura.pdf", array("Attachment" => false));
