<?php
session_start(); //Indicamos que vamos a usar sesiones
include '../config/autocarga.php';
include '../vista/index.php';
$base = new Bd();
$clientes = Cliente::getAll($base->link);
while($fila=$clientes->fetch(PDO::FETCH_ASSOC)){
	echo "Nombre: ".$fila['nombre']."<br/>";
	echo "Dni: ".$fila['dniCliente']."<br/>";
	echo "Dirección: ".$fila['direccion']."<br/>";
	echo "Correo: ".$fila['email']."<br/>";
	echo "PWD: ".$fila['pwd']."<br/>";
}
$productos = Producto::getAll($base->link);
while($fila=$productos->fetch(PDO::FETCH_ASSOC)){
	echo "Nombre: ".$fila['nombre']."<br/>";
	echo "id: ".$fila['idProducto']."<br/>";
	echo "foto: "."<img src='../img/".$fila['foto']."' alt=''>"."<br/>";
	echo "marca: ".$fila['marca']."<br/>";
	echo "categoria: ".$fila['categoria']."<br/>";
	echo "unidades: ".$fila['unidades']."<br/>";
	echo "precio: ".$fila['precio']."<br/>";
}
$bd=NULL;

