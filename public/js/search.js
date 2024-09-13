document.getElementById('searchInput').addEventListener('input', function () {
    let query = this.value;

    fetch(`/search?query=${encodeURIComponent(query)}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        let resultsDiv = document.getElementById('searchResults');
        resultsDiv.innerHTML = '';

        // Check if the input field is empty and reset the result section
        if (query === '') {
            resultsDiv.innerHTML = ''; // Optionally clear the search result if input is empty
            return;
        }

        if (data.contacts.length > 0) {
            data.contacts.forEach(contact => {
                let contactElement = document.createElement('div');
                contactElement.innerHTML = `<p>${contact.fname} ${contact.lname}</p>`;
                resultsDiv.appendChild(contactElement);
            });
        } else {
            // If no contacts are found, display the message
            resultsDiv.innerHTML = '<p>No contacts found.</p>';
        }
    })
    .catch(error => console.error('Error:', error));
});
