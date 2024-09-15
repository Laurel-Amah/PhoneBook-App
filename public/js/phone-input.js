document.addEventListener('DOMContentLoaded', function () {
    const phoneFlagInput = document.querySelector("#phone-flag");

    // Initialize the intl-tel-input for the flag input
    const iti = window.intlTelInput(phoneFlagInput, {
        initialCountry: "auto",
        separateDialCode: false,  // Prevents showing the dial code in the input
        nationalMode: true,
        preferredCountries: ["cm"],
        geoIpLookup: function (callback) {
            fetch('https://ipinfo.io/json?token=YOUR_TOKEN_HERE')
                .then(response => response.json())
                .then(data => callback(data.country))
                .catch(() => callback('cm'));
        },
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });

    // Sync the dial code with the phone number input when a country is selected
    phoneFlagInput.addEventListener('countrychange', function () {
        const dialCode = iti.getSelectedCountryData().dialCode;
        // Optionally, you can also update the phone input
        document.querySelector("#phone-number").value = ''; // Start fresh without a dial code
    });
});
