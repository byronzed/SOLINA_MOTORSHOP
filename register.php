<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert into database
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        if ($stmt->execute([$username, $hashed_password])) {
            header("Location: login.php"); // Redirect to login after successful registration
            exit();
        } else {
            $error = "An error occurred while registering. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc); /* Gradient background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Arial', sans-serif;
        }
        .auth-container {
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
        }
        .auth-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .auth-container .btn-primary {
            background-color: #007bff;
            border: none;
            width: 100%;
        }
        .auth-container .btn-primary:hover {
            background-color: #0056b3;
        }
        .auth-container .btn-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #007bff;
        }
        .auth-container .error-message {
            color: #dc3545;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="auth-container">   
        <h2>Register</h2>
        
        <?php if (isset($error)): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST" action="register.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" id="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            <a href="login.php" class="btn-link">Already have an account? Login</a>
        </form>
    </div>
</body>
</html>
