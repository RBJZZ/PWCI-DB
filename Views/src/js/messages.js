document.addEventListener("DOMContentLoaded", function () {
    console.log("La página se ha cargado completamente.");
   
    const chatIdInput = document.getElementById("chatId");
    const senderId = document.getElementById("senderId").value;
    const conversationList = document.querySelector(".list-group");
    const messageList = document.getElementById("message-list");
    const divname = document.getElementById("convdisplayname");
    const sendButton = document.getElementById("sendButton");
    const messageInput = document.getElementById("newmessage");
    const productIdInput = document.getElementById('product-id');
    const buyerIdInput = document.getElementById('buyer-id');
    const usertype = document.getElementById("user-type").value;
    console.log("El usuario es de tipo:" + usertype)

    function cargarMensajes(chatId) {
        fetch(`../api/MessagesAPI.php?chat_id=${chatId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                   
                    messageList.innerHTML = "";

                    data.messages.forEach(message => {
                        const li = document.createElement("li");
                        li.textContent = message.chat_content;

                        if (Number(message.chat_sender) === Number(senderId)) {
                            li.className = "list-group-item m-2 p-2 rounded-pill balloon balloon-right";
                        } else {
                            li.className = "list-group-item m-2 p-2 rounded-pill balloon balloon-left";
                        }

                        messageList.appendChild(li);
                    });

                   
                    const info = data.infoExtra;
                    if (info) {
                        document.getElementById("product-name").textContent = info.prod_name;
                        document.getElementById("thumb-product").src = `../${info.prod_thumbnail}`;
                        document.getElementById("cantidad").value = "1";
                        document.getElementById("precio").value = info.prod_price;

                        productIdInput.value = info.prod_ID;
                        buyerIdInput.value = info.buyer_id;
                    }
                } else {
                    console.warn("No se encontraron mensajes o datos adicionales.");
                }
            })
            .catch(error => console.error("Error al cargar los mensajes:", error));
    }


    function cargarConversaciones() {
        fetch('../api/ConversacionesAPI.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                action: 'listar_conversaciones',
                user_id: userId,
                usertype: usertype
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                
                conversationList.innerHTML = "";
    
                data.conversations.forEach(conversation => {
                
                    const li = document.createElement("li");
                    li.className = "list-group-item d-flex justify-content-between align-items-center p-3 my-1";
                    li.dataset.chatId = conversation.chat_ID;
    
                    let displayName = usertype === "seller" 
                        ? conversation.client_name 
                        : conversation.product_name;
                    
                    
                        
                    li.innerHTML = `
                        <span>${displayName +' : '+ conversation.product_name}</span>
                        <span class="badge text-bg-primary rounded-pill">${conversation.unread_messages}</span>
                    `;
    
                    li.addEventListener("click", function () {
                        chatIdInput.value = conversation.chat_ID;
                        cargarMensajes(conversation.chat_ID);
                    });
    
                    conversationList.appendChild(li);
                });
            } else {
                console.warn("No se encontraron conversaciones.");
            }
        })
        .catch(error => console.error("Error al cargar las conversaciones:", error));
    }
    
 
    function enviarMensaje() {
        const chatId = chatIdInput.value;
        const messageContent = messageInput.value.trim();

        if (!chatId || !messageContent) {
            alert("El mensaje no puede estar vacío o falta seleccionar un chat.");
            return;
        }

        fetch("../api/MessagesAPI.php", {
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
                  
                    const newMessage = document.createElement("li");
                    newMessage.className = "list-group-item m-2 p-2 rounded-pill balloon balloon-right";
                    newMessage.textContent = messageContent;
                    messageList.appendChild(newMessage);
                    messageInput.value = "";

                } else {
                    console.error("Error al enviar el mensaje:", data.message);
                }
            })
            .catch(error => console.error("Error al enviar el mensaje:", error));
    }

    
    const userId = senderId;
    cargarConversaciones(userId);

    sendButton.addEventListener("click", enviarMensaje);
});

document.getElementById("generate-link-button").addEventListener("click", function () {
    const productId = document.getElementById("product-id").value.trim();
    const buyerId = document.getElementById("buyer-id").value.trim();
    const cantidad = document.getElementById("cantidad").value.trim();
    const precio = document.getElementById("precio").value.trim();

    if (!productId || !buyerId || !cantidad || !precio || isNaN(cantidad) || isNaN(precio)) {
        alert("Por favor, ingrese todos los datos necesarios.");
        return;
    }

    fetch("../api/AutoCarritoAPI.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            product_id: productId,
            buyer_id: buyerId,
            cantidad: Number(cantidad),
            precio: parseFloat(precio).toFixed(2),
        }),
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("¡Producto agregado correctamente al carrito!");
            } else {
                alert(`Error: ${data.message}`);
            }
        })
        .catch(error => console.error("Error al generar el enlace:", error));
});
