<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body>





    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">

        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-light" href="dashboard.php">💰 Expense Tracker</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="dashboard.php"><i class="bi bi-speedometer2"></i>Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="Updateexpense.php"><i class="bi bi-pencil-square"></i>Update expense</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addexpense.php"><i class="bi bi-plus-circle"></i>Add expense</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="addcategory.php"><i class="bi bi-tags"></i>Add Category</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" id="filtersDropdown" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-funnel"></i>
                        Filters
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="filtersDropdown">
                        <li><a class="dropdown-item" href="filterbydate.php">📅 By Date Range</a></li>
                        <li><a class="dropdown-item" href="filterbycategory.php">🏷 By Category</a></li>
                        <li><a class="dropdown-item" href="filterbydatecat.php">📊 By Date & Category</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="DeleteExpense.php"><i class="bi bi-trash"></i>Delete expense</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"><i class="bi bi-box-arrow-right"></i>Logout</a>
                </li>
            </ul>
        </div>
        </div>

    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>