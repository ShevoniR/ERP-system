<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="d-flex" style="min-height: 100vh;">
        <nav class="bg-dark text-white p-3" style="width: 250px;">
            <h4 class="text-center text-light mb-4">ERP System</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white">
                        <i class="bi bi-house-door-fill"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white">
                        <i class="bi bi-gear-fill"></i> Administration
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white">
                        <i class="bi bi-folder-fill"></i> Master
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white">
                        <i class="bi bi-people-fill"></i> Leads
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white">
                        <i class="bi bi-cart-fill"></i> Purchase
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white">
                        <i class="bi bi-tools"></i> Production
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white">
                        <i class="bi bi-cash"></i> Sales
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white">
                        <i class="bi bi-graph-up"></i> Reports
                    </a>
                </li>
            </ul>
        </nav>

        <div class="flex-grow-1 p-4">
            <h2 class="mb-4">Dashboard</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <a href="customer/add_customer.php" class="text-decoration-none">
                        <div class="card text-center text-white bg-danger">
                            <div class="card-body">
                                <h5 class="card-title">Add Customer</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="customer/view_customers.php" class="text-decoration-none">
                        <div class="card text-center text-white bg-success">
                            <div class="card-body">
                                <h5 class="card-title">View customer</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="item/add_item.php" class="text-decoration-none">
                        <div class="card text-center text-white bg-primary">
                            <div class="card-body">
                                <h5 class="card-title">Add Item</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="item/view_items.php" class="text-decoration-none">
                        <div class="card text-center text-white bg-warning">
                            <div class="card-body">
                                <h5 class="card-title">View Item</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="reports/invoice_item_report.php" class="text-decoration-none">
                        <div class="card text-center text-white bg-info">
                            <div class="card-body">
                                <h5 class="card-title">View invoice item report</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="reports/invoice_report.php" class="text-decoration-none">
                        <div class="card text-center text-white bg-secondary">
                            <div class="card-body">
                                <h5 class="card-title">View invoice report</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="reports/item_report.php" class="text-decoration-none">
                        <div class="card text-center text-white bg-success">
                            <div class="card-body">
                                <h5 class="card-title">View item report</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center text-white bg-dark">
                            <div class="card-body">
                                <h5 class="card-title">Settings</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
