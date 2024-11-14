<?
session_start();
unset($_SESSION['dni']);
unset($_SESSION['nombre']);
header("Location: index.php");
