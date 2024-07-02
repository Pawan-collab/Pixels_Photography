document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();

    if (!username || !password) {
        displayErrorMessage('Both fields are required.');
        return;
    }

    // Add your AJAX code here to submit the form data to the server
    // For example, using fetch API
    fetch('login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ username, password }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Redirect to the admin panel
            window.location.href = 'admin.html';
        } else {
            displayErrorMessage(data.message);
        }
    })
    .catch(error => {
        displayErrorMessage('An error occurred. Please try again.');
    });
});

function displayErrorMessage(message) {
    const errorMessage = document.getElementById('errorMessage');
    errorMessage.innerText = message;
    errorMessage.style.display = 'block';
}



document.addEventListener('DOMContentLoaded', function() {
    // Handle gallery form submission
    document.getElementById('galleryForm').addEventListener('submit', function(event) {
        event.preventDefault();
        // Add your AJAX code here to upload the gallery image
        alert('Gallery image uploaded successfully!');
    });

    // Handle content form submission
    document.getElementById('contentForm').addEventListener('submit', function(event) {
        event.preventDefault();
        // Add your AJAX code here to update the page content
        alert('Page content updated successfully!');
    });

    // Fetch and display gallery images
    function loadGalleryImages() {
        // Add your code here to fetch and display gallery images
        const galleryList = document.querySelector('.gallery-list');
        galleryList.innerHTML = '<p>Gallery images go here...</p>';
    }

    // Fetch and display contact messages
    function loadContactMessages() {
        // Add your code here to fetch and display contact messages
        const contactMessages = document.querySelector('.contact-messages');
        contactMessages.innerHTML = '<p>Contact messages go here...</p>';
    }

    // Initialize the admin panel
    loadGalleryImages();
    loadContactMessages();
});


