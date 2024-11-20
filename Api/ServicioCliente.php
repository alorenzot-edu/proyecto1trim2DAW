<?php
require "../config/autocarga.php";

$base= new Bd();
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    if (isset($_GET['dniCliente'])){
      $cli= new Cliente($_GET['dniCliente'],'','','','');
      $dato=$cli->buscar($base->link);
      header("HTTP/1.1 200 OK");
      echo json_encode($dato);
      exit();
	} else {
      $dato=Cliente::getAll($base->link);
      $dato->setFetchMode(PDO::FETCH_ASSOC);
      header("HTTP/1.1 200 OK");
      echo json_encode($dato->fetchAll());
      exit();
	}
}
header("HTTP/1.1 400 Bad Request");

