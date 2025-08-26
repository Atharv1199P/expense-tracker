<?php
require 'nav.php';
session_start();
if (isset($_POST['delete'])) {
    $expense_id = $_POST['expense_id'];

    $conn = mysqli_connect("localhost", "root", "", "exptracker");

    $i = mysqli_query($conn, "DELETE FROM expense WHERE expense_id='$expense_id'");

    if ($i > 0) {
        echo "Expense deleted successfully!";
    } else {
        echo "Failed to delete expense. Please try again.";
    }
} else {
    echo "Please provide an Expense ID to delete.";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete - Expense</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-5">
        <div class="card" style="width: 700px; margin: 50px auto; ">

            <div class="card-header">
                <h1>Delete Expense</h1>
            </div>
            <div class="card-body">
                <p class="card-text">Enter the Expense ID to delete the expense.</p>
                <form action="" method="post">
                    <div class="mb-3 mt-3">
                        <label for="expense_id" class="form-label">Expense ID:</label>
                        <input type="text" id="expense_id" name="expense_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this expense?');">Delete Expense</button>
                    </div>
                    <div class="mb-3">
                        <p>After deleting, you can <a href="dashboard.php">view your expenses</a>.</p>
                        <p><strong>Note:</strong> Ensure the Expense ID is correct to delete the right record.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>