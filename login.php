<?php
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = mysqli_connect("localhost", "root", "", "exptracker");

    $i = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($i) == 1) {
        $row = mysqli_fetch_assoc($i);

        if ($row['role'] == 'admin' || $row['role'] == 'user') {

            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['family_id'] = $row['family_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            header("Location: dashboard.php");
            exit();
        }
    } else {
        echo "Invalid username or password. Please try again.";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <p class="text-center fs-1 fw-bold mt-4">💰 Expense Tracker</p>
         <div class="card" style="width: 700px; margin: 50px auto; ">
        <div class="card-header">
            <h1>Login</h1>
        </div>
        <div class="card-body">
        <p>Please enter your username and password to login.</p>

        <form action="" method="post">
            <div class="mb-3 mt-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </div>
        </form>
        <p>Add family to expense tracker? <a href="addfamily.php">Add Family</a></p>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
        <p><a href="forgotpassword.php">Forgot Password?</a></p>

        </div>
    </div>
    </div>

</body>

</html>