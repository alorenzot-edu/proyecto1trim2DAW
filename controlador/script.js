const contenedoresProductos = document.getElementsByClassName("contenedorProductos");
//Para los productos destacados
let ip = "192.168.1.70"
fetch('http://'+ip+'/LorenzoToledoAlejandro1T/controlador/getProductos.php')
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
        divProducto.append(imgFoto);
        divProducto.append(divCont);
        divProducto.append(divAnyadir);

        contenedoresProductos[seccion].append(divProducto);

    }
        

}
