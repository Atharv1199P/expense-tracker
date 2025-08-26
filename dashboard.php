<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $family_id = $_SESSION['family_id'];
    $username = $_SESSION['username'];
    $role = $_SESSION['role'];

    $conn = mysqli_connect("localhost", "root", "", "exptracker");
    if ($role == 'admin') {

        $query = mysqli_query($conn, "SELECT * FROM users WHERE family_id='$family_id'");
        $query = mysqli_query($conn, "SELECT expense.expense_id, users.username, category.category_name, expense.amount, expense.expense_date from expense join users on expense.user_id = users.user_id join category on expense.category_id = category.category_id where expense.family_id='$family_id'");
    } elseif ($role == 'user') {
        $query = mysqli_query($conn, "SELECT expense.expense_id, category.category_name, users.username , expense.amount, expense.expense_date from expense join category on expense.category_id = category.category_id join users on expense.user_id = users.user_id  where expense.user_id='$user_id'");
    } else {
        echo "You do not have permission to view this page.";
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php require 'nav.php'; ?>
    <div class="container mt-5">
        <div class="header">
            <h1>Dashboard</h1>
            <p>Welcome, <?php echo $username; ?>!</p>
        </div>
        

        <div class="content">
            <h2>Expenses</h2>
            <table border="1" class="table table-bordered table-striped">
                <tr class="table-dark">
                    <th>Expense ID</th>
                    <th>UserName</th>
                    <th>Category</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<tr class='table-light'>";
                    echo "<td>" . $row['expense_id'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['category_name'] . "</td>";
                    echo "<td>" . $row['amount'] . "</td>";
                    echo "<td>" . $row['expense_date'] . "</td>";
                    echo "</tr>";
                }
                if (mysqli_num_rows($query) == 0) {
                    echo "<tr class='table-light'><td colspan='5'>No expenses found.</td></tr>";
                }
                ?>
            </table>
        </div>
</body>

</html>