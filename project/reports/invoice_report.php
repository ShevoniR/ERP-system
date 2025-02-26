<?php
include '../db.php';

$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['start_date'], $_GET['end_date'])) {
    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];

    $sql = "SELECT i.invoice_no, i.date, c.first_name, c.district, i.item_count, i.amount
            FROM invoice i
            JOIN customer c ON i.customer = c.id
            WHERE i.date BETWEEN ? AND ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $start_date, $end_date);
    $stmt->execute();
    $result = $stmt->get_result();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Report</title>
    <link rel="stylesheet" href="../css/invoice_report.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/invoice_report.js" defer></script>

</head>
<body>
    <header>
        <h1>Invoice Report</h1>
        <p>Generate reports for your invoices with date filters</p>
    </header>

    <div class="container">
        <form id="reportForm" method="GET" action="invoice_report.php" class="form-inline">
            <div class="mb-3">
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Generate Report</button>
        </form>

        <?php if ($result && $result->num_rows > 0) { ?>
            <h2>Invoice Report</h2>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Invoice No</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>District</th>
                        <th>Item Count</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= htmlspecialchars($row['invoice_no']) ?></td>
                            <td><?= htmlspecialchars($row['date']) ?></td>
                            <td><?= htmlspecialchars($row['first_name']) ?></td>
                            <td><?= htmlspecialchars($row['district']) ?></td>
                            <td><?= htmlspecialchars($row['item_count']) ?></td>
                            <td><?= htmlspecialchars($row['amount']) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } elseif ($result) { ?>
            <p class="no-results">No results found for the selected date range.</p>
        <?php } ?>
    </div>

    <footer>
        <p>© 2024 ERP System. All rights reserved.</p>
    </footer>
</body>
</html>
