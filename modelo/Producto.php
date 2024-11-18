<?php

class Producto
{
	private $idProducto;
	function __construct($idProducto)
	{
		$this->idProducto = $idProducto;
	}
	
	static function getAll($link)
	{
		$consulta = $link->prepare("SELECT * FROM productos");
		$consulta->execute();
		return $consulta;
	}

	function buscar($link)
	{
		try {
			$consulta = "SELECT * FROM productos where idProducto=$this->idProducto";
			$result = $link->prepare($consulta);
			$result->execute();
			return $result;
		} catch (PDOException $e) {
			$dato = "¡Error!: " . $e->getMessage() . "<br/>";
 			require "../vista/mensaje.php";
			die();
		}
	}
}
