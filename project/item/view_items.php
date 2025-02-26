<?php
include '../db.php';

$result = $conn->query("SELECT i.item_code, i.item_name, ic.category AS item_category, 
    isc.sub_category AS item_subcategory, i.quantity, i.unit_price
    FROM item i
    JOIN item_category ic ON i.item_category = ic.id
    JOIN item_subcategory isc ON i.item_subcategory = isc.id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Items</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Item List</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Item Code</th>
                    <th>Item Name</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['item_code'] ?></td>
                    <td><?= $row['item_name'] ?></td>
                    <td><?= $row['item_category'] ?></td>
                    <td><?= $row['item_subcategory'] ?></td>
                    <td><?= $row['quantity'] ?></td>
                    <td><?= $row['unit_price'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>