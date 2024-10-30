<?php
session_start();
require 'db.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch all restaurants from the database
$stmt = $pdo->query("
    SELECT restaurants.*, users.username 
    FROM restaurants 
    JOIN users ON restaurants.added_by = users.user_id
");
$restaurants = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Babershop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #e3f2fd; /* Light blue background */
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
            background-color: #ffffff; /* White background for container */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333; /* Dark gray color for the heading */
        }
        .table {
            margin-top: 20px;
        }
        .table thead {
            background-color: #007bff; /* Bootstrap primary color */
            color: white;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1; /* Light gray for row hover */
        }
        .btn-primary {
            background-color: #28a745; /* Green button */
            border: none;
        }
        .btn-primary:hover {
            background-color: #218838; /* Darker green on hover */
        }
        .btn-info {
            background-color: #17a2b8; /* Info button color */
        }
        .btn-info:hover {
            background-color: #138496; /* Darker info button on hover */
        }
        .btn-warning {
            background-color: #ffc107; /* Yellow button */
            border: none;
        }
        .btn-warning:hover {
            background-color: #d39e00; /* Darker yellow on hover */
        }
        .btn-danger {
            background-color: #dc3545; /* Red button */
        }
        .btn-danger:hover {
            background-color: #c82333; /* Darker red on hover */
        }
        .btn-logout {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #dc3545; /* Red for logout */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-logout:hover {
            background-color: #c82333; /* Darker red on hover */
        }
    </style>
</head>
<body>
    <!-- Logout Button -->
    <a href="logout.php" class="btn btn-logout">Logout</a>

    <div class="container">
        <h1 class="mt-4">motorshop</h1>
        <a href="edit.php" class="btn btn-primary mb-4">Add New motorshop</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Added by</th>
                    <th>Last updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($restaurants as $restaurant): ?>
                    <tr>
                        <td><?php echo $restaurant['babershop_id']; ?></td>
                        <td><?php echo $restaurant['name']; ?></td>
                        <td><?php echo $restaurant['address']; ?></td>
                        <td><?php echo $restaurant['phone_number']; ?></td>
                        <td><?php echo $restaurant['email']; ?></td>
                        <td><?php echo $restaurant['username']; ?></td>
                        <td><?php echo $restaurant['last_updated']; ?></td>
                        <td>
                            <a href="view.php?id=<?php echo $restaurant['babershop_id']; ?>" class="btn btn-info">View</a>
                            <a href="edit.php?id=<?php echo $restaurant['babershop_id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?php echo $restaurant['babershop_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this restaurant?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
