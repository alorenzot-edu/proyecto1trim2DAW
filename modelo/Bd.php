<?php
include "../config/config.php";
class Bd	
{
	private $link;
	function __construct()
	{
		try{
			$this->link= new PDO("mysql:host=".HOST.";dbname=".BASE,USUARIO,PASS,OPCIONES);
		}
		catch(PDOException $e){
			$dato= "¡Error!: " . $e->getMessage() . "<br/>";
			require "vista/mensaje.php";
			die();
		}
	}
		
	function __get($var){
		return $this->$var;
	}
}