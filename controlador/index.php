<?php
session_start(); //Indicamos que vamos a usar sesiones
if(!isset($_SESSION['idUnico'])){   //Al entrar aquí se le creará la sesión si no la tiene
    $_SESSION['idUnico'] = uniqid();
}
?><script><?
include 'script.js';
?></script><?
include '../vista/index.php';

