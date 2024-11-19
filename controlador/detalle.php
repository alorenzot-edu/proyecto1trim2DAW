<?
session_start();
if(!isset($_SESSION['idUnico'])){  //Nos aseguramos de que el usuario tenga variable de sesión
    header("Location: index.php");
}
require '../vista/inicio.html';
require '../vista/nav.php';
require '../vista/detalle.php';
require '../vista/footer.html';

if(isset($_POST['anyadir'])){
    $idCarrito = $_SESSION['idUnico'];
    $idProducto = $_POST['idProducto'];
    $precio = $_POST['precio'];
    $unidades = $_POST['unidades'];
    $precio *= $unidades;
    $dni = '';
    if(isset($_SESSION['dni'])) $dni = $_SESSION['dni'];

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
}