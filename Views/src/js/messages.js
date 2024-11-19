function cargarMensajes(chatId) {
    fetch(`../api/MessagesAPI.php?chat_id=${chatId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log(data);
                const messageList = document.getElementById("message-list");
                data.messages.forEach(message => {
                    const li = document.createElement("li");
                    li.className = "list-group-item m-2 p-2 rounded-pill";
                    li.textContent = message.chat_content;
                    messageList.appendChild(li);
                });
            } else {
                console.error("Error al cargar mensajes:", data.message);
            }
        })
        .catch(error => console.error("Error en la solicitud AJAX:", error));
}

document.getElementById("sendButton").addEventListener("click", function () {
    const chatId = document.getElementById("chatId").value;
    const senderId = document.getElementById("senderId").value; 
    const messageContent = document.getElementById("newmessage").value;

    if (!messageContent.trim()) {
        alert("El mensaje no puede estar vacío.");
        return;
    }

    fetch("/api/mensajes.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            chat_id: chatId,
            sender_id: senderId,
            content: messageContent,
        }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const messageList = document.getElementById("message-list");
            const newMessage = document.createElement("li");
            newMessage.className = "list-group-item m-2 p-2 rounded-pill balloon balloon-right";
            newMessage.textContent = messageContent;
            messageList.appendChild(newMessage);

            document.getElementById("newmessage").value = "";
        } else {
            alert("Error al enviar el mensaje: " + data.message);
        }
    })
    .catch(error => {
        console.error("Error en la solicitud:", error);
        alert("Ocurrió un error al intentar enviar el mensaje.");
    });
});

document.addEventListener("DOMContentLoaded", function () {
    console.log("DOMContentLoaded: La página se ha cargado completamente.");

    function getQueryParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }

    const chatId = getQueryParam('chat_id');
    console.log("ID de la conversación:", chatId);

    if (chatId) {
        cargarMensajes(chatId);
    } else {
        console.warn("No se encontró el chat_id en la URL.");
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const messageList = document.getElementById("message-list");
    const chatId = document.getElementById("chatId").value;

    function cargarMensajes(chatId) {
        fetch(`../api/MessagesAPI.php?chat_id=${chatId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Error HTTP: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    renderizarMensajes(data.messages);
                } else {
                    console.error("Error al cargar mensajes:", data.message);
                }
            })
            .catch(error => console.error("Error en la solicitud AJAX:", error));
    }

   
    function renderizarMensajes(mensajes) {
      
        messageList.innerHTML = "";
        mensajes.forEach(mensaje => {
            const li = document.createElement("li");
            li.className = `list-group-item m-2 p-2 rounded-pill balloon ${
                mensaje.chat_sender === "1" ? "balloon-right" : "balloon-left"
            }`;
            li.textContent = mensaje.chat_content;
            messageList.appendChild(li);
        });
    }

    cargarMensajes(chatId);
});


