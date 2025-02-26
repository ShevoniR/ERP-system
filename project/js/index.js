document.addEventListener('DOMContentLoaded', () => {
    console.log('JavaScript loaded successfully!');

    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', (event) => {
            const inputs = form.querySelectorAll('input, select');
            let valid = true;

            inputs.forEach(input => {
                if (input.hasAttribute('required') && !input.value.trim()) {
                    valid = false;
                    input.classList.add('is-invalid');
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            if (!valid) {
                event.preventDefault();
                alert('Please fill in all required fields.');
            }
        });
    }
});

document.addEventListener("DOMContentLoaded", () => {
    const listItems = document.querySelectorAll(".list-group-item");
    listItems.forEach(item => {
        item.addEventListener("mouseenter", () => {
            item.classList.add("shadow-lg");
        });
        item.addEventListener("mouseleave", () => {
            item.classList.remove("shadow-lg");
        });
    });
});
