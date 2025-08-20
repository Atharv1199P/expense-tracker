<?php
if (isset($_POST['submit'])) {
    $expense_id = $_POST['expense_id'];
    $family_id = $_POST['family_id'];
    $user_id = $_POST['user_id'];
    $category_id = $_POST['category_id'];
    $amount = $_POST['amount'];
    $expense_date = $_POST['expense_date'];

    $conn = mysqli_connect("localhost", "root", "", "exptracker");

    $i = mysqli_query($conn, "INSERT INTO expense (expense_id, family_id, user_id, category_id, amount, expense_date) VALUES ('$expense_id', '$family_id', '$user_id', '$category_id', '$amount
', '$expense_date')");
    if ($i > 0) {
        echo "Expense added successfully!";
    } else {
        echo "Failed to add expense. Please try again.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add expense</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="card" style="width: 700px; margin: 50px auto; ">

            <div class="card-header">
                <h1>Add Expense</h1>
            </div>
            <div class="card-body">
                <p class="card-text">Add a new expense to the Expense Tracker.</p>

                <form action="" method="post">
                    <div class="mb-3 mt-3">
                        <label for="expense_id" class="form-label">Expense ID:</label>
                        <input type="text" id="expense_id" name="expense_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="family_id" class="form-label">Family ID:</label>
                        <input type="text" id="family_id" name="family_id" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="user_id" class="form-label">User ID:</label>
                        <input type="text" id="user_id" name="user_id" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category ID:</label>
                        <input type="text" id="category_id" name="category_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Expense Amount:</label>
                        <input type="number" id="amount" name="amount" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="expense_date" class="form-label">Expense Date:</label>
                        <input type="date" id="expense_date" name="expense_date" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-success">Add Expense</button>
                    </div>

                </form>
                <div class="mt-3">
                    <p>After adding an expense, you can <a href="dashboard.php">view expenses</a>.</p>
                    <p class="mt-3">Note that the Expense ID should be unique.</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>