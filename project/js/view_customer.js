document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchInput');
    const customerTable = document.getElementById('customerTable');
    const rows = Array.from(customerTable.querySelectorAll('tr'));

    searchInput.addEventListener('input', () => {
        const searchTerm = searchInput.value.toLowerCase();

        rows.forEach(row => {
            const cells = Array.from(row.querySelectorAll('td'));
            const rowText = cells.map(cell => cell.textContent.toLowerCase()).join(' ');

            if (rowText.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});
