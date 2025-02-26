<?php
require_once '../db.php';

$query = "SELECT 
            itm.item_name, 
            cat.category AS item_category, 
            subcat.sub_category AS item_subcategory, 
            itm.quantity 
          FROM item itm
          INNER JOIN item_category cat ON itm.item_category = cat.id
          INNER JOIN item_subcategory subcat ON itm.item_subcategory = subcat.id
          GROUP BY itm.item_name, cat.category, subcat.sub_category";
$results = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Item Report</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Item Report</h1>

        <?php if (!empty($results)): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Item Category</th>
                        <th>Item Subcategory</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['item_name']) ?></td>
                            <td><?= htmlspecialchars($row['item_category']) ?></td>
                            <td><?= htmlspecialchars($row['item_subcategory']) ?></td>
                            <td><?= htmlspecialchars($row['quantity']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center text-muted">No items found.</p>
        <?php endif; ?>
    </div>
</body>
</html>