document.addEventListener('DOMContentLoaded', function () {
    const phoneInput = document.querySelector("#phone");

    // Initialize the intl-tel-input
    window.intlTelInput(phoneInput, {
        initialCountry: "auto",
        separateDialCode: false, // Ensures the dial code is not separated visually
        nationalMode: true,      // Shows only the national number without the international dial code
        preferredCountries: ["cm"], // Optional: Set preferred countries
        geoIpLookup: function (callback) {
            fetch('https://ipinfo.io/json?token=YOUR_TOKEN_HERE') // Replace with your IPInfo token
                .then(response => response.json())
                .then(data => callback(data.country))
                .catch(() => callback('cm'));
        },
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" // for formatting/validation etc.
    });
});
