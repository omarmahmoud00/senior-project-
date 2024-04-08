document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const businessName = document.querySelector('input[name="business_name"]');
    const businessEmail = document.querySelector('input[name="business_email"]');
    const businessPassword = document.querySelector('input[name="business_password"]');
    const businessPasswordConfirmation = document.querySelector('input[name="business_password_confirmation"]');
    const businessTypeSelect = document.querySelector('select[name="business_type"]');
    const phoneNumber = document.querySelector('input[name="phone_number"]');
    const address = document.querySelector('textarea[name="address"]');
    const sessionServiceTypeInput = document.getElementById('sessionServiceType');
    const sessionServiceType = sessionServiceTypeInput.value;

    form.addEventListener('submit', function (e) {
        let isValid = true;
        let messages = [];

        // Validate business name
        if (!businessName.value.trim() || businessName.value.length > 255) {
            messages.push("Business name is required and must be less than 256 characters.");
            isValid = false;
        }

        // Validate business email
        if (!businessEmail.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/) || businessEmail.value.length > 255) {
            messages.push("A valid business email is required and must be less than 256 characters.");
            isValid = false;
        }

        // Validate business password
        if (businessPassword.value.length < 8) {
            messages.push("Business password is required and must be at least 8 characters long.");
            isValid = false;
        }

        // Validate password confirmation
        if (businessPassword.value !== businessPasswordConfirmation.value) {
            messages.push("The password confirmation does not match.");
            isValid = false;
        }

        // Validate business type selection against session-stored service
        if (sessionServiceType && businessTypeSelect.value !== sessionServiceType) {
            messages.push("Please select the correct business type based on your service selection.");
            isValid = false;
        }

        // Validate phone number
        if (!phoneNumber.value.trim() || phoneNumber.value.length > 255) {
            messages.push("Phone number is required and must be less than 256 characters.");
            isValid = false;
        }

        // Validate address
        if (!address.value.trim() || address.value.length > 255) {
            messages.push("Address is required and must be less than 256 characters.");
            isValid = false;
        }

        if (!isValid) {
            e.preventDefault(); // Prevent form submission
            alert(messages.join('\n'));
        }
    });
});
