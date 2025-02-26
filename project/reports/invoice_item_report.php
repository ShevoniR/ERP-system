<?php
require_once '../db.php';

$startDate = $endDate = $error = '';
$results = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $startDate = $_POST['start_date'] ?? '';
    $endDate = $_POST['end_date'] ?? '';

    if (!$startDate || !$endDate) {
        $error = "Both start date and end date are required.";
    } else {
       
        $query = "SELECT 
                    i.invoice_no, 
                    iv.date AS invoiced_date, 
                    c.first_name AS customer_name, 
                    itm.item_name, 
                    itm.item_code, 
                    cat.category AS item_category, 
                    itm.unit_price 
                  FROM invoice_master i
                  INNER JOIN invoice iv ON i.invoice_no = iv.invoice_no
                  INNER JOIN customer c ON iv.customer = c.id
                  INNER JOIN item itm ON i.item_id = itm.id
                  INNER JOIN item_category cat ON itm.item_category = cat.id
                  WHERE iv.date BETWEEN ? AND ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $startDate, $endDate);
        $stmt->execute();
        $results = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Invoice Item Report</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Invoice Item Report</h1>

        <form method="POST" class="mb-4">
            <div class="row g-3">
                <div class="col-md-5">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" id="start_date" name="start_date" class="form-control" required>
                </div>
                <div class="col-md-5">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" id="end_date" name="end_date" class="form-control" required>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Generate</button>
                </div>
            </div>
        </form>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <?php if (!empty($results)): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Invoice No</th>
                        <th>Invoiced Date</th>
                        <th>Customer Name</th>
                        <th>Item Name</th>
                        <th>Item Code</th>
                        <th>Item Category</th>
                        <th>Unit Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['invoice_no']) ?></td>
                            <td><?= htmlspecialchars($row['invoiced_date']) ?></td>
                            <td><?= htmlspecialchars($row['customer_name']) ?></td>
                            <td><?= htmlspecialchars($row['item_name']) ?></td>
                            <td><?= htmlspecialchars($row['item_code']) ?></td>
                            <td><?= htmlspecialchars($row['item_category']) ?></td>
                            <td><?= htmlspecialchars($row['unit_price']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
                <p class="text-center text-muted">No results found for the selected date range.</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>
</html>