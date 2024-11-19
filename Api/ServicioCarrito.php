<?php
include "../config/autocarga.php";
$base= new Bd();
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    if (isset($_GET['idCarrito'])){
      //Mostrar un Cliente
      $car= new Carrito($_GET['idCarrito'],'','','','');
      $dato=$car->buscar($base->link);
      header("HTTP/1.1 200 OK");
      echo json_encode($dato);
      exit();
	} else {
      //Mostrar lista de clientes
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
    if(isset($data['dni'])) $dni = $data['dni'];
    $car= new Carrito($data['idCarrito'],$data['idProducto'],$data['unidades'],$data['precio'],$dni);
    $error=$car->modificar($base->link);
    header("HTTP/1.1 200 OK");
    echo json_encode($data['idCarrito']);
    exit();
}

header("HTTP/1.1 400 Bad Request");