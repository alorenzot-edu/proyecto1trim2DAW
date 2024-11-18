<?php

class Cliente
{
		private $dniCliente;
		private $nombre;
		private $direccion;
		private $email;
		private $pwd;

		static function getAll($link){
			try{
				$consulta="SELECT * FROM clientes";
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
		function __construct($dni, $nombre, $direccion,$email,$pwd){
			$this->dniCliente=$dni;
			$this->nombre=$nombre;
			$this->direccion=$direccion;
			$this->email=$email;
			$this->pwd=$pwd;
		}
		function buscar ($link){
			try{
				$consulta="SELECT * FROM clientes where email='$this->email'";
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
		function validar ($link){
			try{
				$cli=$this->buscar($link);
                if (password_verify($this->pwd,$cli['pwd']))
				    return $cli;
                else return false;
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "../vista/mensaje.php";
 				die();
 			}
		}
		function insertar ($link){
			try{
				$consulta="INSERT INTO clientes VALUES (:dniCliente,:nombre,:direccion,:email,:pwd)";
				$result=$link->prepare($consulta);
				$result->bindParam(':dniCliente',$dniCliente);
				$result->bindParam(':nombre',$nombre);
				$result->bindParam(':direccion',$direccion);
				$result->bindParam(':email',$email);
				$result->bindParam(':pwd',$pwd);
				$dniCliente=$this->dniCliente;
				$nombre=$this->nombre;
				$direccion=$this->direccion;
				$email=$this->email;
				$pwd=password_hash($this->pwd, PASSWORD_DEFAULT);
				$result->execute();
				return $result;
			}
			catch(PDOException $e){
				$dato= "¡Error!: " . $e->getMessage() . "<br/>";
 				require "../vista/mensaje.php";
 				die();
 			}
		}	
}