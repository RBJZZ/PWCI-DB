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

function cargarRatingProducto() {
    const productId = document.querySelector('#producto-id').value;
    console.log('El ID del producto es:' + productId);

    if (productId) {
        fetch(`../api/ProductosAPI.php?ratings=true&id=${productId}`)
            .then(response => response.json())
            .then(data => {
                console.log('Datos del rating:', data);

                if (data) {
             
                    const {
                        total_ratings = 0,
                        avg_rating = 0,
                        five_stars = 0,
                        four_stars = 0,
                        three_stars = 0,
                        two_stars = 0,
                        one_star = 0
                    } = {
                        total_ratings: data.total_ratings || 0,
                        avg_rating: data.avg_rating || 0,
                        five_stars: data.five_stars || 0,
                        four_stars: data.four_stars || 0,
                        three_stars: data.three_stars || 0,
                        two_stars: data.two_stars || 0,
                        one_star: data.one_star || 0,
                    };

                 
                    document.querySelector('.rating__average h2').innerText = avg_rating.toFixed(1);
                    document.querySelector('.rating__average p').innerText = total_ratings.toLocaleString();

                  
                    const ratings = [
                        { star: 5, count: five_stars },
                        { star: 4, count: four_stars },
                        { star: 3, count: three_stars },
                        { star: 2, count: two_stars },
                        { star: 1, count: one_star }
                    ];

                   
                    document.querySelector('.rating__progress').innerHTML = '';
                    ratings.forEach(rating => {
                        const percentage = total_ratings > 0 ? (rating.count / total_ratings) * 100 : 0;
                        const progressHTML = `
                            <div class="rating__progress-value">
                                <p>${rating.star}<span class="star">&#9733;</span></p>
                                <div class="prog">
                                    <div class="bar" style="width: ${percentage}%;"></div>
                                </div>
                                <p>${rating.count.toLocaleString()}</p>
                            </div>
                        `;
                        document.querySelector('.rating__progress').innerHTML += progressHTML;
                    });

                 
                    const starWidth = (avg_rating / 5) * 100 + '%';
                    document.querySelector('.star-inner').style.width = starWidth;
                    document.querySelector('.star-inner-top').style.width = starWidth; 
                } else {
                    console.error('Error al cargar ratings:', data.error);
                }
            })
            .catch(error => console.error('Error al cargar el rating del producto:', error));
    }
}


function cargarComentarios() {
const productId = document.querySelector('#producto-id').value;
  fetch(`../api/ProductosAPI.php?comments=true&id=${productId}`)
    .then(response => response.json())
    .then(comentarios => {
      const comentariosContainer = document.getElementById('comentarios-dinamicos');
      comentariosContainer.innerHTML = ''; 

      if (comentarios.length > 0) {
        comentarios.forEach(comentario => {
          const comentarioHTML = `
            <article class="media">
              <figure class="media-left">
                <p class="image is-64x64">
                  <img src="../Views/${comentario.profile_pic || 'https://bulma.io/assets/images/placeholders/128x128.png'}" alt="${comentario.username}" />
                </p>
              </figure>
              <div class="media-content">
                <div class="content">
                  <p>
                    <strong style="color:black !important;">${comentario.username}</strong>
                    <br />
                    ${comentario.comment}
                    <br />
                    <small>Calificación: ${comentario.rating_value} estrellas · ${new Date(comentario.rating_date).toLocaleDateString()}</small>
                  </p>
                </div>
              </div>
            </article>
          `;
          comentariosContainer.innerHTML += comentarioHTML;
        });
      } else {
        comentariosContainer.innerHTML = '<h4>No hay comentarios para este producto.</h4>';
      }
    })
    .catch(error => console.error('Error al cargar comentarios:', error));
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
    cargarRatingProducto();
    cargarComentarios();
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
                    action: 'crear_conversacion',
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
