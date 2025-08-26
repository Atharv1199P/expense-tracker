<?php
if (isset($_POST['submit'])) {
    $family_id = $_POST['family_id'];
    $family_name = $_POST['family_name'];
    $family_code = $_POST['family_code'];

    $conn = mysqli_connect("localhost", "root", "", "exptracker");

    $i = mysqli_query($conn, "INSERT INTO family (family_id, family_name, family_code) VALUES ('$family_id', '$family_name', '$family_code')");

    if ($i > 0) {
        echo "Family added successfully!";
    } else {
        echo "Failed to add family. Please try again.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add family</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="card" style="width: 700px; margin: 50px auto; ">

            <div class="card-header">
                <h1>Family Registration</h1>
            </div>
            <div class="card-body">
                <p class="card-text">Add a new family to the Expense Tracker.</p>

                <form action="" method="post">

                    <div class="mb-3 mt-3">
                        <label for="family_id" class="form-label">Family ID:</label>
                        <input type="text" id="family_id" name="family_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="family_name" class="form-label">Family Name:</label>
                        <input type="text" id="family_name" name="family_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="family_code" class="form-label">Family Code:</label>
                        <input type="text" id="family_code" name="family_code" class="form-control" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Add Family</button>
                </form>
                <div class="mt-3">
                    <p>After adding a family, you can <a href="register.php">register users</a> to the family.</p>
                    <p><a href="login.php">Login</a> to access your family dashboard.</p>
                    <p class="mt-3">Note: Ensure that the Family ID and code is unique.</p>

                </div>
            </div>
        </div>


</body>

</html>