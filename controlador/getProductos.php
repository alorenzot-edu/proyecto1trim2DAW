<?
include '../config/autocarga.php';
$bd = new Bd();
//Vamos a enviar por json los productos a mostrar
if(isset($_GET['id'])){
    $producto = new Producto($_GET['id']);
    $resultado = $producto->buscar($bd->link);
    echo json_encode($resultado->fetch(PDO::FETCH_ASSOC));
} else {
    $productos = Producto::getAll($bd->link);
        $array = array();
    while($fila=$productos->fetch(PDO::FETCH_ASSOC)){
        array_push($array, array(
            "idProducto"=>$fila['idProducto'],
            "nombre"=>$fila['nombre'],
            "foto"=>$fila['foto'],
            "marca"=>$fila['marca'],
            "categoria"=>$fila['categoria'],
            "unidades"=>$fila['unidades'],
            "precio"=>$fila['precio']
        ));
    }
    echo json_encode($array);
}


$bd=NULL;