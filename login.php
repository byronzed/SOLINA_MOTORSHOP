<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        header("Location: index.php"); // Redirect to a protected page
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc); /* Gradient background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Arial', sans-serif;
            color: #fff;
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .login-container .btn-primary {
            background-color: #007bff; /* Bootstrap primary color */
            border: none;
            width: 100%;
        }
        .login-container .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
        .login-container .btn-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #007bff;
        }
        .login-container .error-message {
            color: #dc3545;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="login-container">   
        <h2>Login</h2>
        
        <?php if (isset($error)): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="register.php" class="btn-link">Register</a>
        </form>
    </div>
</body>
</html>
