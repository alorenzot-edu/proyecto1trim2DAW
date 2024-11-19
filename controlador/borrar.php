<?
require '../config/autocarga.php';
session_start();
$bd = new Bd();
$idCarrito = $_SESSION['idUnico']; 
$idProducto = '';
if(isset($_GET['idProducto'])){
    $idProducto = $_GET['idProducto'];
} 

$url = 'http://localhost/LorenzoToledoAlejandro1T/Api/ServicioCarrito.php';
$data = [
    "idCarrito" => $idCarrito,
    "idProducto" => $idProducto
];
$jsonData = json_encode($data);
$options = [
    'http' => [
        'method'  => 'DELETE',
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

header("Location: verCarrito.php");
