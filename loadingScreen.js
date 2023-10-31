document.addEventListener('DOMContentLoaded', function (){
        // Messages to be displayed in intervals
    const messages = [
        "Loading...",
        "Almost there...",
        "Please wait...",
        "Just a moment...",
        "Done!"
    ];
        
    // Function to create and animate bounce elements
    function createAndAnimateBounceElements() {
        const loader = document.getElementById("loader");
        loader.style.display = "block"; // Make sure the loader is visible

        // Create and add bounce elements
        for (let i = 1; i <= 5; i++) {
            const bounceElement = document.createElement("div");
            bounceElement.id = "bounce" + i;
            bounceElement.classList.add("animate");
            bounceElement.style.animationDelay = (i * 0.2) + "s"; // Adjust the delay as needed
            loader.appendChild(bounceElement);
        }
    }

    // Function to display messages in intervals
    function displayMessagesInIntervals() {
        const messageElement = document.getElementById("message");
        let index = 0;

        const intervalId = setInterval(() => {
            messageElement.textContent = messages[index];
            index++;

            // Stop displaying messages when all messages have been shown
            if (index === messages.length) {
                clearInterval(intervalId);
                messageElement.style.display = "none"; // Hide the message container
                window.location.href = 'index.php';
            }
        }, 2000); // Display messages every 2 seconds
    }

    // Simulate loading by calling the functions after a delay
    setTimeout(() => {
        createAndAnimateBounceElements();
        displayMessagesInIntervals();
        
    }, 1000); // Simulating a 1-second delay before starting the animation
});
        