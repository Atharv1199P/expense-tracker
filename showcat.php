<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $family_id = $_SESSION['family_id'];
    $username = $_SESSION['username'];
    $role = $_SESSION['role'];

    $conn = mysqli_connect("localhost", "root", "", "exptracker");
    $result = mysqli_query($conn, "SELECT * FROM category WHERE family_id='$family_id'");
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
    <title>Categories</title>
</head>
<body>
<?php require 'nav.php'; ?>
    <div class="container mt-5">

        

        <div class="content">
            <div class="header">
                <h1>Categories</h1>
                <p>Welcome, <?php echo $username; ?>!</p>
          
            <table border="1" class="table table-bordered table-striped">
                <tr class="table-dark">
                    <th>Category ID</th>
                    <th>Family ID</th>
                    <th>Category Name</th>
                    <th>Status</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr class='table-light'>";
                    echo "<td>" . $row['category_id'] . "</td>";
                    echo "<td>" . $row['family_id'] . "</td>";
                    echo "<td>" . $row['category_name'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
    
    <div class="container mt-3">
        <a href="addcategory.php" class="btn btn-primary">Add New Category</a>
    </div>

    
</body>
</html>