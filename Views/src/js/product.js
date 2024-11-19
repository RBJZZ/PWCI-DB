function agregarACarrito(user, productoId, cantidad) {
    fetch('../api/CarritoAPI.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            usuario: user,
            producto_id: productoId,
            cantidad:cantidad
         })
        
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Producto agregado al carrito');
        } else {
            alert('Error al agregar al carrito');
        }
    })
    .catch(error => console.error('Error:', error));
}

function agregarALista(listaId, productoId) {
    fetch('../api/ListasAPI.php', {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            lista_id: listaId,
            producto_id: productoId,
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Producto agregado a la lista exitosamente');
        } else {
            console.error('Error:', data.message);
        }
    })
    .catch(error => console.error('Error al agregar el producto:', error));
}

document.querySelector('#Listname').addEventListener('input', habilitarBoton);
document.querySelector('#Listdesc').addEventListener('input', habilitarBoton);

function habilitarBoton() {
  const nombre = document.querySelector('#Listname').value.trim();
  const descripcion = document.querySelector('#Listdesc').value.trim();
  const botonGuardar = document.querySelector('.create-list button');

  if (nombre !== '' && descripcion !== '') {
    botonGuardar.disabled = false;
  } else {
    botonGuardar.disabled = true;
  }
}

function cargarListas() {
    fetch('../api/ListasAPI.php', {
        method: 'GET',
        headers: { 'Content-Type': 'application/json' }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            renderizarListas(data.data); 
        } else {
            console.error('Error al cargar las listas:', data.message);
            mostrarMensaje("No tienes listas creadas.");
        }
    })
    .catch(error => console.error('Error al cargar las listas:', error));
}

function renderizarListas(listas) {
    const container = document.querySelector('.lists');
    container.innerHTML = ''; 

    if (listas.length === 0) {
        mostrarMensaje("No tienes listas creadas.");
        return;
    }

    listas.forEach(lista => {
        const cardHTML = `
            <div class="card text-bg-dark checkbox" id="${lista.id}" onclick="ListClick(this)">
                <img src="${lista.imagen || '../Views/src/src/img1.png'}" class="card-img" alt="${lista.nombre}">
                <div class="card-img-overlay">
                    <h5 class="card-title">${lista.nombre}</h5>
                    <p class="card-text">${lista.descripcion || "Sin descripción disponible."}</p>
                    <p class="card-text"><small>Última actualización: ${lista.fecha_actualizacion || "Desconocida"}</small></p>
                </div>
            </div>
        `;

        container.innerHTML += cardHTML;
    });
}

function mostrarMensaje(mensaje) {
    const container = document.querySelector('.lists');
    container.innerHTML = `<p class="text-center">${mensaje}</p>`;
}

document.querySelector('.create-list').addEventListener('submit', function (event) {
    event.preventDefault(); 
  
    const nombre = document.querySelector('#Listname').value.trim();
    const descripcion = document.querySelector('#Listdesc').value.trim();
    const privada = document.querySelector('#ListVisible').checked ? 'privada' : 'publica';
  
    fetch('../api/ListasAPI.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ nombre, descripcion, privacidad: privada }) 
    })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          alert('Lista creada exitosamente');
          cargarListas();
        } else {
          console.error('Error al crear la lista:', data.message);
        }
      })
      .catch(error => console.error('Error:', error));
  });

document.addEventListener('DOMContentLoaded', () => {
    cargarListas();
});

//FUNCIONES PARA EL SISTEMA DE MENSAJERÍA

document.addEventListener("DOMContentLoaded", function () {
   
    document.querySelectorAll(".createconv").forEach(link => {
        link.addEventListener("click", function (event) {
            event.preventDefault(); 

            const userId = this.getAttribute("data-us");
            const vendedorId = this.getAttribute("data-s");
            const productoId = this.getAttribute("data-p");

            fetch("../api/ConversacionesAPI.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    chat_us1: userId,
                    chat_us2: vendedorId,
                    chat_product: productoId,
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = `../Views/messages.php?chat_id=${data.chat_id}`;
                } else {
                    alert("Error al crear la conversación: " + data.message);
                }
            })
            .catch(error => {
                console.error("Error en la solicitud:", error);
                alert("Ocurrió un error al intentar crear la conversación.");
            });
        });
    });
});
