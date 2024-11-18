<?php

class Carrito
{
	private $idCarrito;
	private $idProducto;
	private $unidades;
	private $precio;
	private $dniCliente;
		

		static function getAll($link){
			try{
				$consulta="SELECT * FROM carrito";
				$result=$link->prepare($consulta);
				$result->execute();
				return $result;
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "../vista/mensaje.php";
 				die();
 			}
		}

		function __construct($idCarrito, $idProducto, $unidades, $precio, $dni){
			$this->idCarrito=$idCarrito;
			$this->idProducto=$idProducto;
			$this->unidades=$unidades;
			$this->precio=$precio;
			$this->dniCliente=$dni;
		}

		function buscar ($link){
			try{
				$consulta="SELECT * FROM carrito where idCarrito='$this->idCarrito'";
				$result=$link->prepare($consulta);
				$result->execute();
				return $result->fetch(PDO::FETCH_ASSOC);
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "../vista/mensaje.php";
 				die();
 			}
		}

		function buscarProducto ($link){
			try{
				$consulta="SELECT idProducto FROM carrito where idCarrito='$this->idCarrito' and idProducto='$this->idProducto'";
				$result=$link->prepare($consulta);
				$result->execute();
				return $result->fetch(PDO::FETCH_ASSOC);
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "../vista/mensaje.php";
 				die();
 			}
		}
		
		function insertar ($link){
			try{
				$consulta="INSERT INTO carrito VALUES (:idCarrito,:idProducto,:unidades,:precio,:dniCliente)";
				$result=$link->prepare($consulta);
				$result->bindParam(':idCarrito',$idCarrito);
				$result->bindParam(':idProducto',$idProducto);
				$result->bindParam(':unidades',$unidades);
				$result->bindParam(':precio',$precio);
				$result->bindParam(':dniCliente',$dniCliente);
				
				$idCarrito=$this->idCarrito;
				$idProducto=$this->idProducto;
				$unidades=$this->unidades;
				$precio=$this->precio;
				$dniCliente=$this->dniCliente;
				$result->execute();
				return $result;
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "../vista/mensaje.php";
 				die();
 			}
		}
		function modificar ($link){
			try{
				$consulta="UPDATE carrito SET idCarrito='$this->idCarrito',  idProducto='$this->idProducto',  unidades='$this->unidades', precio='$this->precio' WHERE idCarrito='$this->idCarrito'";
				$result=$link->prepare($consulta);
				return $result->execute();
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "../vista/mensaje.php";
 				die();
 			}
		}

		function sumarProducto ($link){
			try{
				$consulta="UPDATE carrito SET unidades=(SELECT c.unidades from carrito c where c.idCarrito='$this->idCarrito' and c.idProducto='$this->idProducto')+1 WHERE idCarrito='$this->idCarrito' and idProducto='$this->idProducto'";
				$result=$link->prepare($consulta);
				return $result->execute();
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "../vista/mensaje.php";
 				die();
 			}
		}

		function borrar ($link){
			try{
				$consulta="DELETE FROM carrito where idCarrito='$this->idCarrito'";
				$result=$link->prepare($consulta);
				return $result->execute();
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "../vista/mensaje.php";
 				die();
 			}
		}

		function borrarProducto ($link){
			try{
				$consulta="DELETE FROM carrito where idCarrito='$this->idCarrito' and idProducto='$this->idProducto'";
				$result=$link->prepare($consulta);
				return $result->execute();
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "../vista/mensaje.php";
 				die();
 			}
		}
}