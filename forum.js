let previousImageURL = '';

function sendMessage() {
    const messageInput = document.getElementById('message-input');
    const imageInput = document.getElementById('image-input');
    const messageText = messageInput.value;

    if (messageText.trim() !== '' || imageInput.files.length > 0) {
        const messageList = document.getElementById('message-list');

        if (imageInput.files.length > 0) {
            const imageFile = imageInput.files[0];
            const imageURL = URL.createObjectURL(imageFile);
            const imageElement = document.createElement('img');
            imageElement.src = imageURL;

            if (messageText.trim() !== '') {
                const userName = "User Name"; // Replace with the actual user's name
                const currentDate = new Date().toLocaleString();

                // Create an object to hold the message data
                const messageData = {
                    userName: userName,
                    messageText: messageText,
                    imageURL: imageURL,
                };

                // Send the message data to the server using a POST request
                fetch('your_php_script.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(messageData),
                })
                    .then(response => {
                        if (response.ok) {
                            // Message sent successfully
                        } else {
                            console.error('Error sending message.');
                        }
                    })
                    .catch(error => {
                        console.error('Error sending message:', error);
                    });

                const messageItem = document.createElement('li');
                messageItem.innerHTML = `<strong>${userName}</strong> (${currentDate}): ${messageText}<br /><img src="${imageURL}" />`;
                messageList.appendChild(messageItem);
                messageInput.value = ''; // Clear the message input field
            } else {
                messageList.appendChild(imageElement);
            }

            previousImageURL = imageURL;
        } else if (messageText.trim() !== '') {
            const userName = "User Name"; // Replace with the actual user's name
            const currentDate = new Date().toLocaleString();

            // Create an object to hold the message data
            const messageData = {
                userName: userName,
                messageText: messageText,
                imageURL: '', // No image URL for text messages
            };

            // Send the message data to the server using a POST request
            fetch('your_php_script.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(messageData),
            })
                .then(response => {
                    if (response.ok) {
                        // Message sent successfully
                    } else {
                        console.error('Error sending message.');
                    }
                })
                .catch(error => {
                    console.error('Error sending message:', error);
                });

            const messageItem = document.createElement('li');
            messageItem.innerHTML = `<strong>${userName}</strong> (${currentDate}): ${messageText}`;
            messageList.appendChild(messageItem);
            messageInput.value = ''; // Clear the message input field
        }
    }
}
