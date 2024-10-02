document.getElementById('sendButton').addEventListener('click', function() {
    var messageInput = document.getElementById('newmessage');
    var messageText = messageInput.value.trim();

    if (messageText !== "") {
        var messageList = document.getElementById('message-list');
        var newMessage = document.createElement('li');
        newMessage.className = 'list-group-item m-2 p-2 rounded-pill balloon balloon-right';
        newMessage.textContent = messageText;

        messageList.appendChild(newMessage);
        messageInput.value = "";
    }
});