<?
session_start(); //Indicamos que vamos a usar sesiones
require '../config/autocarga.php';
$bd = new Bd();
$idCarrito = $_SESSION['idUnico'];
$idProducto = $_GET['idProducto'];
$precio = $_GET['precio'];
$unidades = 1;
$dni = '';
if (isset($_SESSION['dni'])) $dni = $_SESSION['dni'];

$url = 'http://localhost/LorenzoToledoAlejandro1T/Api/ServicioCarrito.php';
$data = [
    "idCarrito" => $idCarrito,
    "idProducto" => $idProducto,
    "precio" => $precio,
    "unidades" => $unidades,
    "dni" => $dni
];
$jsonData = json_encode($data);
$options = [
    'http' => [
        'method'  => 'POST',
        'header'  => "Content-Type: application/json\r\n" .
                     "Content-Length: " . strlen($jsonData) . "\r\n",
        'content' => $jsonData
    ]
];
$context  = stream_context_create($options);
$response = file_get_contents($url, false, $context);
if ($response === FALSE) {
    echo 'Error al realizar la solicitud';
} else {
    echo 'Respuesta: ' . $response;
}

header("Location: index.php");
