<?
include '../config/autocarga.php';
$bd = new Bd();
//Vamos a enviar por json los productos a mostrar
$carrito = Carrito::getAll($bd->link);
$array = array();
while($fila=$carrito->fetch(PDO::FETCH_ASSOC)){
    array_push($array, array(
        "idCarrito"=>$fila['idCarrito'],
        "idProducto"=>$fila['idProducto'],
        "unidades"=>$fila['unidades'],
        "precio"=>$fila['precio'],
        "dniCliente"=>$fila['dniCliente']
    ));
}
echo json_encode($array);

$bd=NULL;