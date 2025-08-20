<?php
if (isset($_POST['submit'])) {
    $category_id = $_POST['category_id'];
    $family_id = $_POST['family_id'];
    $category_name = $_POST['category_name'];
    $status = $_POST['status'];

    $conn = mysqli_connect("localhost", "root", "", "exptracker");

    $i = mysqli_query($conn, "INSERT INTO category (category_id, family_id, category_name, status) VALUES ('$category_id', '$family_id', '$category_name', '$status')");

    if ($i > 0) {
        echo "Category added successfully!";
    } else {
        echo "Failed to add category. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="card" style="width: 700px; margin: 50px auto; ">
            <div class="card-header">
                <h1>Category Registration</h1>
            </div>
            <div class="card-body">
                <p class="card-text">Add a new category to the Expense Tracker.</p>

                <form action="" method="post">

                    <div class="mb-3 mt-3">
                        <label for="category_id" class="form-label">Category ID:</label>
                        <input type="text" id="category_id" name="category_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="family_id" class="form-label">Family ID:</label>
                        <input type="text" id="family_id" name="family_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Category Name:</label>
                        <input type="text" id="category_name" name="category_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status:</label>
                        <select id="status" name="status" class="form-control" required>
                            <option value="" disabled selected>Select Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-success">Add Category</button>
                    </div>
                </form>
                <div class="mt-3">
                    <div class="mb-3">
                        <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
                    </div>
                    <p>After adding a category, you can <a href="inserte.php">add expenses</a> under this category.</p>
                    <p class="mt-3">Note: Ensure that the Category ID is unique.</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>