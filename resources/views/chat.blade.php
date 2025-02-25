<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot Perpustakaan</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .chat-box {
            border: 1px solid #ddd;
            padding: 10px;
            height: 300px;
            overflow-y: auto;
            margin-bottom: 10px;
        }

        .chat-message {
            margin-bottom: 5px;
        }

        .chat-message.user {
            text-align: right;
        }

        .chat-message.bot {
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Chatbot Perpustakaan</h1>
    <div id="chat-box" class="chat-box"></div>
    <form id="chat-form">
        <input type="text" id="message" placeholder="Tulis pesan..." style="width: 80%;">
        <button type="submit">Kirim</button>
    </form>

    <script>
        const chatBox = document.getElementById('chat-box');
        const chatForm = document.getElementById('chat-form');
        const messageInput = document.getElementById('message');

        chatForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const message = messageInput.value;
            if (!message) return;

            addMessageToChatBox('user', message);

            axios.post('{{ route('chat.send') }}', {
                    message
                })
                .then(response => {
                    addMessageToChatBox('bot', response.data.response);
                })
                .catch(() => {
                    addMessageToChatBox('bot', 'Terjadi kesalahan.');
                });

            messageInput.value = '';
        });

        function addMessageToChatBox(sender, message) {
            const div = document.createElement('div');
            div.classList.add('chat-message', sender);
            div.textContent = message;
            chatBox.appendChild(div);
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    </script>
</body>

</html>
