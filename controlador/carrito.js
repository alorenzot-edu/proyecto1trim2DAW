//let ip = "192.168.1.70"
let ip = "localhost"
fetch('http://'+ip+'/LorenzoToledoAlejandro1T/controlador/getCarrito.php')
.then(res => res.json())
.then(data => {
    console.log("Carrito", data);
    construirInyectable(data);

})
.catch(error => console.error('Error al obtener el carrito:', error));

function construirInyectable(dataCarrito) { 
    document.getElementById('mensajeVacio').innerText = "El carrito está vacío";
    document.getElementById('pago').style = "visibility: hidden;";
    for (let i = 0; i < dataCarrito.length; i++) {
        let idUnico = localStorage.getItem('idUnico')
        let idCarrito = dataCarrito[i].idCarrito;
        if(idCarrito == idUnico){
            document.getElementById('mensajeVacio').innerText = "";  
            document.getElementById('pago').style = "visibility: visible;";
      
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
            input.id = "form1";
            input.type = "number";
            input.name = "unidades";
            input.min = 0;
            input.max = 10;
            input.value = dataCarrito[i].unidades;
            
    
            const colPrice = document.createElement("div");
            colPrice.classList.add("col-md-3", "col-lg-2", "col-xl-2", "offset-lg-1");
            const price = document.createElement("h5");
            price.classList.add("mb-0");
            price.textContent = dataCarrito[i].precio + "€/u";
    
            const colDelete = document.createElement("div");
            colDelete.classList.add("col-md-1", "col-lg-1", "col-xl-1", "text-end");
            const deleteLink = document.createElement("a");
            deleteLink.href = "borrar.php?idProducto=" + dataCarrito[i].idProducto;
            deleteLink.classList.add("text-danger");
            const deleteIcon = document.createElement("i");
            deleteIcon.classList.add("fas", "fa-trash", "fa-lg");
            deleteIcon.innerText = "Borrar";
    
            fetch("http://" + ip + "/LorenzoToledoAlejandro1T/controlador/getProductos.php?id="+parseInt(dataCarrito[i].idProducto))
            .then((res) => res.json())
            .then((data) => {
                console.log("Producto", data);
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
}

