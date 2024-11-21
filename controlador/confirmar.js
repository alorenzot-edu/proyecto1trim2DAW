//let ip = "192.168.1.70"
let ip = "localhost"
fetch("http://" + ip + "/LorenzoToledoAlejandro1T/Api/ServicioCarrito.php")
    .then((res) => res.json())
    .then((data) => {
        console.log("Carrito", data);
        construirInyectable(data);
    })
    .catch((error) => console.error("Error al obtener el carrito:", error));

function construirInyectable(dataCarrito) {
    let precioFinal = 0;
    for (let i = 0; i < dataCarrito.length; i++) {
        let idUnico = localStorage.getItem('idUnico')   //Recogemos el idUnico de la variable en php
        let idCarrito = dataCarrito[i].idCarrito;       //Recogemos el idCarrito de la base de datos
        if (idCarrito == idUnico) {                     //Si estos coinciden, mostraremos el producto
            const cuerpoTarjeta = document.createElement("div");
            cuerpoTarjeta.classList.add("card-body", "p-4");
            //Ahora se monta toda la estructura
            const fila = document.createElement("div");
            fila.classList.add(
                "row",
                "d-flex",
                "justify-content-between",
                "align-items-center"
            );

            const colImagen = document.createElement("div");
            colImagen.classList.add("col-md-2", "col-lg-2", "col-xl-2");

            const imagen = document.createElement("img");
            imagen.classList.add("img-fluid", "rounded-3");

            const colTexto = document.createElement("div");
            colTexto.classList.add("col-md-3", "col-lg-3", "col-xl-3");

            const titulo = document.createElement("p");
            titulo.style.fontWeight = "bold";

            const marca = document.createElement("p");
            const marcaTexto = document.createElement("span");
            marcaTexto.classList.add("text-muted");
            marcaTexto.textContent = "Marca: ";
            

            const colUnidades = document.createElement("div");
            colUnidades.classList.add("col-md-3", "col-lg-3", "col-xl-2", "d-flex");
            colUnidades.textContent = "x" + dataCarrito[i].unidades;

            const colPrecio = document.createElement("div");
            colPrecio.classList.add("col-md-3", "col-lg-2", "col-xl-2", "offset-lg-1");

            const tituloPrecio = document.createElement("h5");
            tituloPrecio.classList.add("mb-0");
            let precio = dataCarrito[i].precio;
            precioFinal+=parseInt(precio);
            tituloPrecio.textContent = precio + "€";

            const auxId = document.createElement("span"); //Esto servirá para poder enviar la id del producto a php mediante post
            auxId.style.visibility="collapse";
            const auxUd = document.createElement("span"); //Esto servirá para poder enviar las unidades del producto a php mediante post
            auxUd.style.visibility="collapse";

            auxId.innerHTML+=("<input name='unidades[]' value='" + dataCarrito[i].unidades + "'>");

            //Hacemos otro fetch para obtener los datos faltantes del producto
            fetch("http://" + ip + "/LorenzoToledoAlejandro1T/Api/ServicioProductos.php?id="+parseInt(dataCarrito[i].idProducto))
            .then((res) => res.json())
            .then((data) => {
                console.log("Producto", data);
                auxId.innerHTML+=("<input name='idProducto[]' value='" + data.idProducto + "'>");
                titulo.textContent = data.nombre;
                marca.append(data.marca);
                imagen.src = "../img/" + data.foto;
            })
            .catch((error) => console.error("Error al obtener los productos:", error));

            colImagen.appendChild(imagen);

            marca.appendChild(marcaTexto);

            colTexto.appendChild(titulo);
            colTexto.appendChild(marca);

            colPrecio.appendChild(tituloPrecio);

            fila.appendChild(colImagen);
            fila.appendChild(colTexto);
            fila.appendChild(colUnidades);
            fila.appendChild(colPrecio);
            fila.appendChild(auxId);
            fila.appendChild(auxUd);

            cuerpoTarjeta.appendChild(fila);

            document.getElementById("resumenPedido").appendChild(cuerpoTarjeta);
        }

    }
    document.getElementById("precioFinal").innerText += ": " + (precioFinal+4) + "€";
}
