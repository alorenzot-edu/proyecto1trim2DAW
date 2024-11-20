let idProd = [];
let idCarr;
let dni;

//let ip = "192.168.1.70"
const ip = "localhost"
fetch('http://'+ip+'/LorenzoToledoAlejandro1T/Api/ServicioCarrito.php')
.then(res => res.json())
.then(data => {
    console.log("Carrito", data);
    construirInyectable(data);

})
.catch(error => console.error('Error al obtener el carrito:', error));



function construirInyectable(dataCarrito) { 
    document.getElementById('mensajeVacio').innerText = "El carrito está vacío";    //En primer lugar diremos que el carrito esta vacío
    document.getElementById('pago').style = "visibility: hidden;";  //Si no hay productos en el carrito, no se podrá pagar
    document.getElementById('actualizar').style = "visibility: hidden;";  //Si no hay productos en el carrito, no se podrá actualizar
    for (let i = 0; i < dataCarrito.length; i++) {  //Si hemos llegado aquí significa que el carrito no está vacío
        let idUnico = localStorage.getItem('idUnico');  //Recogemos el idUnico de la variable en php
        let idCarrito = dataCarrito[i].idCarrito;       //Recogemos el idCarrito de la base de datos
        if(idCarrito == idUnico){                       //Si estos coinciden, mostraremos el producto
            idCarr = idCarrito;
            dni = dataCarrito[i].dniCliente
            document.getElementById('mensajeVacio').innerText = "";  //Y por tanto retiramos el mensaje de vacío
            document.getElementById('pago').style = "visibility: visible;"; //Ahora se puede pagar
            document.getElementById('actualizar').style = "visibility: visible;"; //Ahora se puede actualizar
            //Ahora se monta toda la estructura
            const card = document.createElement("div");
            card.classList.add("card", "rounded-3", "mb-4");
    
            const cardBody = document.createElement("div");
            cardBody.classList.add("card-body", "p-4");
    
            const row = document.createElement("div");
            row.classList.add("row","d-flex","justify-content-between","align-items-center");
    
            const colImage = document.createElement("div");
            colImage.classList.add("col-md-2", "col-lg-2", "col-xl-2");
            const img = document.createElement("img");
            img.classList.add("img-fluid", "rounded-3");
    
            const colText = document.createElement("div");
            colText.classList.add("col-md-3", "col-lg-3", "col-xl-3");
            const title = document.createElement("p");
            title.classList.add("lead", "fw-normal", "mb-2");
            const brand = document.createElement("p");
    
            const colQuantity = document.createElement("div");
            colQuantity.classList.add("col-md-3", "col-lg-3", "col-xl-2", "d-flex");
            const input = document.createElement("input");
            input.id = "unidades";
            input.type = "number";
            input.name = "unidades[]";
            input.min = 1;
            input.value = dataCarrito[i].unidades;
            
    
            const colPrice = document.createElement("div");
            colPrice.classList.add("col-md-3", "col-lg-2", "col-xl-2", "offset-lg-1");
            const price = document.createElement("h5");
            price.classList.add("mb-0", "precios");
            price.id = "precios"
            price.textContent = dataCarrito[i].precio + "€";
    
            const colDelete = document.createElement("div");
            colDelete.classList.add("col-md-1", "col-lg-1", "col-xl-1", "text-end");
            const deleteLink = document.createElement("a");
            deleteLink.href = "borrar.php?idProducto=" + dataCarrito[i].idProducto;
            deleteLink.classList.add("text-danger");
            const deleteIcon = document.createElement("i");
            deleteIcon.classList.add("fas", "fa-trash", "fa-lg");
            deleteIcon.innerText = "Borrar";
    
            //Hacemos otro fetch para obtener los datos faltantes del producto
            fetch("http://" + ip + "/LorenzoToledoAlejandro1T/controlador/getProductos.php?id="+parseInt(dataCarrito[i].idProducto))
            .then((res) => res.json())
            .then((data) => {
                console.log("Producto", data);
                let id = data.idProducto;
                idProd.push(id);
                img.src = "../img/" + data.foto;
                title.textContent = data.nombre; 
                brand.innerHTML = '<span class="text-muted">Marca: </span>' + data.marca;
            })
            .catch((error) => console.error("Error al obtener los productos:", error));
    
            colImage.appendChild(img);
    
            colText.appendChild(title);
            colText.appendChild(brand);
    
            colQuantity.appendChild(document.createTextNode("x "));
            colQuantity.appendChild(input);
    
            colPrice.appendChild(price);
    
            deleteLink.appendChild(deleteIcon);
            colDelete.appendChild(deleteLink);
    
            row.appendChild(colImage);
            row.appendChild(colText);
            row.appendChild(colQuantity);
            row.appendChild(colPrice);
            row.appendChild(colDelete);
    
            cardBody.appendChild(row);
    
            card.appendChild(cardBody);
    
            document.getElementById("productosCarrito").appendChild(card);
        }
        

  }
  let botonActualizar = document.getElementById("actualizar");
  botonActualizar.addEventListener(
    "click",
    async () => {
      //Deberia recoger todos los productosy enviarlos
      let nuevasUnidades = document.querySelectorAll("#unidades");
      for(let i = 0 ; i < nuevasUnidades.length ; i ++){
        let unidades = (nuevasUnidades[i].value);
        await actualizarCarrito(i, unidades);
      }
    },
    true
  );
}

async function actualizarCarrito(posicion, unidades){
  let data = {
        idCarrito: idCarr,
        idProducto: parseInt(idProd[posicion]),
        unidades: parseInt(unidades),
        dni: dni
    };
    data = JSON.stringify(data)
    await fetch('http://'+ip+'/LorenzoToledoAlejandro1T/Api/ServicioCarrito.php', {
        method: "PUT",
        headers:{
            "Content-type":"application/json"
        },
        body: data,
    })
    .then((res) => res.json())
    .then((data) => {
      actualizarPrecio(data, posicion);
    })    
    .catch(error => console.error("Error:", error));

}

function actualizarPrecio(data, posicion){
  let precios = document.querySelectorAll("#precios");
  precios[posicion].innerText = data.precio + "€";
}
