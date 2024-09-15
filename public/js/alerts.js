// Function to show the custom alert
function showAlert() {
    const alertElement = document.getElementById('customAlert');
    alertElement.style.display = 'flex';
}

// Function to hide the alert
function closeAlert() {
    const alertElement = document.getElementById('customAlert');
    alertElement.style.display = 'none';
}

// Ensure the alert only shows if there's a session flash message
document.addEventListener('DOMContentLoaded', function () {
    const alertMetaTag = document.querySelector('meta[name="alert-message"]');
    if (alertMetaTag && alertMetaTag.content === 'true') {
        showAlert();
    }
});
