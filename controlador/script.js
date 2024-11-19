const contenedoresProductos = document.getElementsByClassName("contenedorProductos");
//let ip = "192.168.1.70"
let ip = "localhost"
fetch('http://'+ip+'/LorenzoToledoAlejandro1T/Api/ServicioProductos.php')
.then(res => res.json())
.then(data => {
    console.log("Productos", data);
    construirInyectable(0, data);
})
.catch(error => console.error('Error al obtener los productos:', error));

//Se construye el inyectable de la página principal. Aparecerán los productos en las diferentes secciones


function construirInyectable(seccion, data){

    for (let i = 0; i < 5 && i < data.length; i++) {
        divProducto = document.createElement("div");
        divProducto.classList.add("producto");

        aEnlaceDetalle = document.createElement("a");
        aEnlaceDetalle.style="text-decoration:none; color:inherit"
        aEnlaceDetalle.href = "detalle.php?idProducto=" + data[i].idProducto;

        imgFoto = document.createElement("img");
        imgFoto.src = "../img/" + data[i].foto;

        divCont = document.createElement("div");
        divCont.classList.add("cont");

        divNombre = document.createElement("div");
        divNombre.classList.add("texto", "nombreProducto");
        divNombre.innerText = data[i].nombre;

        divSerie = document.createElement("div");
        divSerie.classList.add("texto", "serieProducto");
        divSerie.innerText = data[i].marca;

        divPrecio = document.createElement("div");
        divPrecio.classList.add("texto", "precioProducto");
        divPrecio.innerText = data[i].precio + "€";

        divAnyadir = document.createElement("div");
        divAnyadir.classList.add("anyadir", "d-flex");

        aEnlaceAnyadir = document.createElement("a");
        aEnlaceAnyadir.style = "text-decoration: none;";
        aEnlaceAnyadir.href = "anyadir.php?idProducto=" + data[i].idProducto + "&precio=" + data[i].precio;
        divIcono = document.createElement("div");
        imgCarrito = document.createElement("img");
        imgCarrito.classList.add("iconoPequeño");
        imgCarrito.src = "../vista/img/memory_cart.png";
        divTextoAnyadir = document.createElement("div");
        divTextoAnyadir.classList.add("textoAnyadir");
        divTextoAnyadir.innerText = "AÑADIR";

        divCont.append(divNombre)
        divCont.append(divSerie)
        divCont.append(divPrecio)
        divIcono.append(imgCarrito)
        divAnyadir.append(divIcono)
        divAnyadir.append(divTextoAnyadir)
        aEnlaceAnyadir.append(divAnyadir);
        aEnlaceDetalle.append(imgFoto)
        aEnlaceDetalle.append(divCont)
        divProducto.append(aEnlaceDetalle);
        divProducto.append(aEnlaceAnyadir);

        contenedoresProductos[seccion].append(divProducto);
    }
        

}
