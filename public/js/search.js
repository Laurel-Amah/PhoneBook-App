document.getElementById('searchInput').addEventListener('input', function () {
    let query = this.value;

    fetch(`/search?query=${encodeURIComponent(query)}`, {
        headers: {
            'X-Requested-Width': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        let resultsDiv = document.getElementById('searchResults');
        resultsDiv.innerHTML = '';

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
            resultsDiv.innerHTML = '<h3>No contacts found!</h3>';
        }
    })
    .catch(error => console.error('Error:', error));
});