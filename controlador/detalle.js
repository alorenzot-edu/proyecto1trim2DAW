//let ip = "192.168.1.70"
let ip = "localhost"
fetch("http://" + ip + "/LorenzoToledoAlejandro1T/controlador/getProductos.php?id="+localStorage.getItem('idProductoDetalle'))
    .then((res) => res.json())
    .then((data) => {
        console.log("Producto", data);
        anyadirDatos(data);
})
//L afunción inserta los datos del producto en el html
function anyadirDatos(datos){
    document.getElementById('nombre').innerText=datos.nombre
    document.getElementById('imagenProducto').src = "../img/" + datos.foto
    document.getElementById('precio').innerText = datos.precio + "€"
    document.getElementById('marca').innerText = datos.marca
    document.getElementById('enlaceAnyadir').href += datos.precio + "&unidades=" + document.getElementById('input').value
}