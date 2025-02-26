document.getElementById('reportForm').addEventListener('submit', function(event) {
    const startDate = document.getElementById('start_date').value;
    const endDate = document.getElementById('end_date').value;

    if (new Date(startDate) > new Date(endDate)) {
        event.preventDefault();
        alert('Start date cannot be later than end date.');
    }
});