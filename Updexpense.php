<?php
require 'nav.php';
session_start();
if (isset($_POST['update'])) {
    $expense_id = $_POST['expense_id'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];

    $conn = mysqli_connect("localhost", "root", "", "exptracker");


    $i = mysqli_query($conn, "UPDATE expense SET amount='$amount', expense_date='$date' WHERE expense_id='$expense_id'");

    if ($i > 0) {
        echo "Expense updated successfully!";
    } else {
        echo "Failed to update expense. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update - Expense</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="card" style="width: 700px; margin: 50px auto; ">

            <div class="card-header">
                <h1>Update Expense</h1>
            </div>
            <div class="card-body">
                <p class="card-text">Update the details of an existing expense.</p>
                <form action="" method="post">
                    <div class="mb-3 mt-3">
                        <label for="expense_id" class="form-label">Expense ID:</label>
                        <input type="text" id="expense_id" name="expense_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount:</label>
                        <input type="number" id="amount" name="amount" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date:</label>
                        <input type="date" id="date" name="date" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <button type="submit" name="update" class="btn btn-secondary">Update Expense</button>
                    </div>
                    <div class="mb-3">
                        <p>After updating, you can <a href="dashboard.php">view your expenses</a>.</p>
                        <p><strong>Note:</strong> Ensure the Expense ID is correct to update the right record.</p>
                    </div>


                </form>
            </div>
        </div>
    </div>

</body>

</html>