<?php
require 'emailsend.php';
session_start();
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $conn = mysqli_connect("localhost", "root", "", "exptracker");

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND email='$email'");

    if (mysqli_num_rows($query) == 1) {
        $row = mysqli_fetch_assoc($query);
        $username = $row['username'];
        $password = $row['password'];

        sendpass($email, $username, $password);
        echo "Password reset link has been sent to your email.";
    } else {
        echo "Invalid username or email. Please try again.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot - Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="card" style="width: 700px; margin: 50px auto; ">
            <div class="card-header">
                <h1>Forgot Password</h1>
            </div>
            <div class="card-body">
                <p>Please enter your username and email to reset your password.</p>

                <form action="" method="post">
                    <div class="mb-3 mt-3">
                        <label for="uname" class="form-label">Enter your username:</label>
                        <input type="text" name="username" id="uname" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Enter your email:</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
</body>

</html>