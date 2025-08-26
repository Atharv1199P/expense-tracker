<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "You are not logged in.";
    exit();
}
$conn = mysqli_connect("localhost", "root", "", "exptracker");
$user_id = $_SESSION['user_id'];
$family_id = $_SESSION['family_id'];
$role = $_SESSION['role'];
$username = $_SESSION['username'];
if (isset($_POST['filter'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $category_id = $_POST['category_id'];

    $conn = mysqli_connect("localhost", "root", "", "exptracker");

    if ($role == 'admin') {
        $i = mysqli_query($conn, "SELECT expense.*, users.username, category.category_name FROM expense 
            JOIN users ON expense.user_id = users.user_id 
            JOIN category ON expense.category_id = category.category_id 
            WHERE expense.expense_date BETWEEN '$start_date' AND '$end_date' AND expense.family_id='$family_id' AND expense.category_id = '$category_id'");
    } elseif ($role == 'user') {
        $i = mysqli_query($conn, "SELECT expense.*, users.username, category.category_name FROM expense 
            JOIN users ON expense.user_id = users.user_id 
            JOIN category ON expense.category_id = category 
            WHERE expense.expense_date BETWEEN '$start_date' AND '$end_date' AND expense.user_id='$user_id' AND expense.category_id = '$category_id'");
    } else {
        echo "You do not have permission to view this page.";
        exit();
    }
} else {
    echo "Please provide a start date, end date, and category ID to filter expenses.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter by date and category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="card" style="width: 700px; margin: 50px auto; ">
            <div class="card-header">
                <h1>Filter Expenses by Date and Category</h1>
            </div>
            <div class="card-body">
                <p>Please enter the start date, end date, and category ID to filter expenses.</p>

                <form action="" method="post">
                    <div class="mb-3 mt-3">
                        <label for="start_date" class="form-label">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date:</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category ID:</label>
                        <input type="text" id="category_id" name="category_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="filter" class="btn btn-primary">Filter Expenses</button>
                    </div>
                </form>

                <p>After filtering, you can view the expenses related to the selected date range and category.</p>
                <p class="mt-3"><strong>Note:</strong> Ensure that the dates are in the correct format (YYYY-MM-DD) and the Category ID is valid.</p>
                <div>
                    <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>

                </div>
            </div>
            <div class="results">
                <?php
                if (isset($i) && mysqli_num_rows($i) > 0) {
                    echo "<table border='1'>
                    <tr>
                        <th>Expense ID</th>
                        <th>UserName</th>
                        <th>Category</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>";
                    while ($row = mysqli_fetch_assoc($i)) {
                        echo "<tr>";
                        echo "<td>" . $row['expense_id'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['category_name'] . "</td>";
                        echo "<td>" . $row['amount'] . "</td>";
                        echo "<td>" . $row['expense_date'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                ?>

</body>

</html>