<?php
require 'sendmail.php';
if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $family_id = $_POST['family_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    function generateRandomPassword(int $length = 12): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+-=[]{}|;:,.<>?';
        $password = '';
        $charLength = strlen($characters);

        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[random_int(0, $charLength - 1)];
        }

        return $password;
    }
    $password = generateRandomPassword(12);


    $conn = mysqli_connect("localhost", "root", "", "exptracker");

    $i = mysqli_query($conn, "INSERT INTO users (user_id, family_id, username, password, email, role) VALUES ('$user_id', '$family_id', '$username', '$password', '$email', '$role')");

    if ($i > 0) {
        sendRegistrationEmail($email, $username, $password);
        echo "<strong>Inserted successfully.</strong>";
    } else {
        echo "Failed";
    }
} else {
    echo "<strong>Please fill in all fields.</strong>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="card" style="width: 700px; margin: 50px auto; ">

            <div class="card-header">
                <h1>User Registration</h1>
            </div>
            <div class="card-body">
                <p class="card-text">Add a new user to the Family.</p>


                <form action="" method="post" onsubmit="showName(event)" class="needs-validation" novalidate>

                    <div class="mb-3 mt-3">
                        <label for="user_id" class="form-label">User ID:</label>
                        <input type="text" id="user_id" name="user_id" class="form-control" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="family_id" class="form-label">Family ID:</label>
                        <input type="text" id="family_id" name="family_id" class="form-control" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" id="password" name="password" class="form-control">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role:</label>
                        <select id="role" name="role" class="form-control" required>
                            <option value="" disabled selected>Select Role</option>
                            <option value="admin">admin</option>
                            <option value="user">user</option>
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-primary">Add User</button>
                    </div>
                    <div class="mb-3">
                        <p>Already have an account? <a href="login.php">Login here</a></p>
                    </div>

                </form>
            </div>
        </div>
        <script>
            function showName(event) {
                const form = event.target;
                event.preventDefault();
                form.classList.add('was-validated'); 
            


                let isValid = true;

                function setError(id, message) {
                    let input = document.getElementById(id);
                    let feedback = input.nextElementSibling;
                    input.classList.add("is-invalid");
                    input.classList.remove("is-valid");
                    feedback.innerHTML = message;
                    isValid = false;
                }

                function clearError(id) {
                    let input = document.getElementById(id);
                    let feedback = input.nextElementSibling;
                    input.classList.remove("is-invalid");
                    input.classList.add("is-valid");
                    feedback.innerHTML = "";

                   
                }

                let u = document.getElementById("user_id").value;
                if (isNaN(u) || u.trim() === "") {
                    setError("user_id", "User ID must be a number");
                } else {
                    clearError("user_id");
                }

                let f = document.getElementById("family_id").value;
                if (isNaN(f) || f.trim() === "") {
                    setError("family_id", "Family ID must be a number");
                } else {
                    clearError("family_id");
                }

                let n = document.getElementById("username").value;
                if (n.length < 3 || n.length > 20 ) {
                    setError("username", "Username must be between 3 and 20 characters");
                } else {
                    clearError("username");
                }

                let e = document.getElementById("email").value;
                if (!e.includes("@") ||
                    e.indexOf("@") < 1 ||
                    e.lastIndexOf(".") < e.indexOf("@") + 2 ||
                    e.lastIndexOf(".") >= e.length - 1) {
                    setError("email", "Email must be valid");
                } else {
                    clearError("email");
                }



                let r = document.getElementById("role").value;
                if (r === "") {
                    setError("role", "Role must be selected");
                } else {
                    clearError("role");
                }
                if (isValid) {
                    form.submit();
                } else {
                    event.preventDefault();
                }
            }
        </script>
    </div>

</body>

</html>