<?php
include "../config/autocarga.php";
$base= new Bd();
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    if (isset($_GET['idCarrito'])){
      $car= new Carrito($_GET['idCarrito'],'','','','');
      $dato=$car->buscar($base->link);
      header("HTTP/1.1 200 OK");
      echo json_encode($dato);
      exit();
	} else {
      $dato=Carrito::getAll($base->link);
      $dato->setFetchMode(PDO::FETCH_ASSOC);
      header("HTTP/1.1 200 OK");
      echo json_encode($dato->fetchAll());
      exit();
	}
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $data = json_decode(file_get_contents("php://input"), true);
    $car = new Carrito($data['idCarrito'],$data['idProducto'],'','','');
    if($car->buscarProducto($base->link)){
        $carrito=$car->buscarPorProducto($base->link);
        $car = new Carrito($carrito['idCarrito'],$carrito['idProducto'],$carrito['unidades'],$carrito['precio'],$carrito['dni']);
        $car->modificarUnidades($base->link, $data['unidades'], $data['precio']);
    } else {
        $car = new Carrito($data['idCarrito'], $data['idProducto'],$data['unidades'],$data['precio'],$data['dni']);
        $car->insertar($base->link);
    }
    header("HTTP/1.1 200 OK");
    echo json_encode($car);
    exit(); 
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE'){
    $data = json_decode(file_get_contents("php://input"), true);
    if(!empty($data['idProducto'])){
        $idProducto = $data['idProducto'];
        $car= new Carrito($data['idCarrito'],$idProducto,'','','');
        if($dato=$car->borrarProducto($base->link)){
            header("HTTP/1.1 200 OK");
            echo json_encode($idProducto);
            exit();
        }
    } else {
        $car= new Carrito($data['idCarrito'],'','','','');
        if($dato=$car->borrar($base->link)){
        header("HTTP/1.1 200 OK");
        echo json_encode($idCarrito);
        exit();
    }
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT'){
    $data = json_decode(file_get_contents("php://input"), true);
    $dni = '';
    if(!empty($data['dni'])){
        $dni = $data['dni'];
    }
    $idCarrito = $data['idCarrito'];
    $idProducto = $data['idProducto'];
    $unidades = $data['unidades'];
    $pro = new Producto($idProducto);
    $dato = $pro->buscar($base->link)->fetch(PDO::FETCH_ASSOC);
    $precio = $dato['precio']*$unidades;
    $car = new Carrito($idCarrito, $idProducto, $unidades, $precio,$dni);
    $car->modificar($base->link);
    echo json_encode(['idProducto'=> $idProducto, 'unidades'=>$unidades, 'precio'=>$precio]);
    header("HTTP/1.1 200 OK");
    exit();
}

header("HTTP/1.1 400 Bad Request");

/**
 * Ayuda simple para depurar en la consola
 * 
 * @param  Array, Object, String $data
 * @return String
 */
function php_console_log( $data, $comment = NULL ) {    
    $output='';    
    if(is_string($comment))
        $output .= "<script>console.warn( '$comment' );";
    elseif($comment!=NULL)
        $comment==NULL;//Si se pasa algo que no sea un string se pone a NULL para que no de problemas
    if ( is_array( $data ) ) {
        if($comment==NULL)
            $output .= "<script>console.warn( 'Array PHP:' );";
        $output .= "console.log( '[" . implode( ',', $data) . "]' );</script>";
    } else if ( is_object( $data ) ) {
        $data    = var_export( $data, TRUE );
        $data    = explode( "\n", $data );
        if($comment==NULL)
            $output .= "<script>console.warn( 'Objeto PHP:' );";
        foreach( $data as $line ) {
            if ( trim( $line ) ) {
                $line    = addslashes( $line );
                $output .= "console.log( '{$line}' );";
            }
        }
        $output.="</script>";
    } else {
        if($comment==NULL)
            $output .= "<script>console.warn( 'Valor de variable PHP:' );";
        $output .= "console.log( '$data' );</script>";
    }
        
    echo $output;
}