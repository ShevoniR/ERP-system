document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('addCustomerForm');

    form.addEventListener('submit', (event) => {
        const firstName = document.getElementById('first_name').value.trim();
        const lastName = document.getElementById('last_name').value.trim();
        const contactNo = document.getElementById('contact_no').value.trim();

        if (firstName.length < 2) {
            alert('First Name must be at least 2 characters.');
            event.preventDefault();
            return;
        }

        if (lastName.length < 2) {
            alert('Last Name must be at least 2 characters.');
            event.preventDefault();
            return;
        }

        const contactRegex = /^\d{10}$/;
        if (!contactRegex.test(contactNo)) {
            alert('Contact Number must be exactly 10 digits.');
            event.preventDefault();
            return;
        }
    });
});
