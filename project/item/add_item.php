<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_code = $_POST['item_code'];
    $item_name = $_POST['item_name'];
    $item_category = $_POST['item_category'];
    $item_subcategory = $_POST['item_subcategory'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['unit_price'];

    $sql = "INSERT INTO item (item_code, item_name, item_category, item_subcategory, quantity, unit_price) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $item_code, $item_name, $item_category, $item_subcategory, $quantity, $unit_price);

    if ($stmt->execute()) {
        echo "Item added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Add Item</h1>
        <form method="POST" action="add_item.php" class="row g-3">
            <div class="col-md-6">
                <label for="item_code" class="form-label">Item Code</label>
                <input type="text" class="form-control" name="item_code" required>
            </div>
            <div class="col-md-6">
                <label for="item_name" class="form-label">Item Name</label>
                <input type="text" class="form-control" name="item_name" required>
            </div>
            <div class="col-md-6">
                <label for="item_category" class="form-label">Item Category</label>
                <select class="form-select" name="item_category" required>
                    <option value="" selected>Select Category</option>
                    <?php
                    $result = $conn->query("SELECT * FROM item_category");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['category']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="item_subcategory" class="form-label">Item Subcategory</label>
                <select class="form-select" name="item_subcategory" required>
                    <option value="" selected>Select Subcategory</option>
                    <?php
                    $result = $conn->query("SELECT * FROM item_subcategory");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['sub_category']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" name="quantity" required>
            </div>
            <div class="col-md-6">
                <label for="unit_price" class="form-label">Unit Price</label>
                <input type="number" class="form-control" name="unit_price" step="0.01" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Add Item</button>
            </div>
        </form>
    </div>
</body>
</html>