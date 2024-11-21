<?
include '../config/autocarga.php';
$bd = new Bd();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['id'])) { //Si se pide el producto por id a través de la url
        $producto = new Producto($_GET['id']);
        $resultado = $producto->buscar($bd->link);  //Se busca el producto
        header("HTTP/1.1 200 OK");
        echo json_encode($resultado->fetch(PDO::FETCH_ASSOC)); //y se envía
    } else {  //Si no hay un id, se enviarán todos los productos
        $productos = Producto::getAll($bd->link);
        $array = array();
        while ($fila = $productos->fetch(PDO::FETCH_ASSOC)) {
            array_push($array, array(
                "idProducto" => $fila['idProducto'],
                "nombre" => $fila['nombre'],
                "foto" => $fila['foto'],
                "marca" => $fila['marca'],
                "categoria" => $fila['categoria'],
                "unidades" => $fila['unidades'],
                "precio" => $fila['precio']
            ));
        }
        header("HTTP/1.1 200 OK");
        echo json_encode($array);
    }
}


