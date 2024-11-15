<?php
session_start(); //Indicamos que vamos a usar sesiones
if(!isset($_SESSION['idUnico'])){
    $_SESSION['idUnico'] = uniqid();
}
include '../config/autocarga.php';
?><script><?
include 'script.js';
?></script><?
include '../vista/index.php';

