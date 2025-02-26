<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact_no = $_POST['contact_no'];
    $district = $_POST['district'];

    $sql = "INSERT INTO customer (title, first_name, last_name, contact_no, district) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $title, $first_name, $last_name, $contact_no, $district);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Customer added successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
    <link rel="stylesheet" href="../css/add_customer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="../js/add_customer.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Add Customer</h2>
        <form id="addCustomerForm" method="POST" action="add_customer.php" class="shadow p-4 bg-light rounded">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <select name="title" id="title" class="form-select" required>
                    <option value="Mr">Mr</option>
                    <option value="Mrs">Mrs</option>
                    <option value="Miss">Miss</option>
                    <option value="Dr">Dr</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name:</label>
                <input type="text" name="first_name" id="first_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name:</label>
                <input type="text" name="last_name" id="last_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="contact_no" class="form-label">Contact No:</label>
                <input type="text" name="contact_no" id="contact_no" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="district" class="form-label">District:</label>
                <select name="district" id="district" class="form-select" required>
                    <?php
                    $result = $conn->query("SELECT district FROM district WHERE active = 'yes'");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['district']}'>{$row['district']}</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Add Customer</button>
        </form>
    </div>
</body>
</html>
