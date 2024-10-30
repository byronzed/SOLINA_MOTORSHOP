<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $stmt = $pdo->prepare("SELECT * FROM restaurants WHERE babershop_id = ?");
    $stmt->execute([$id]);
    $restaurant = $stmt->fetch();

    if (!$restaurant) {
        echo "Restaurant not found!";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Restaurant</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h1>MOTOR SHOP BRANDS details</h1>
    <table class="table table-bordered">
        <tr>
            <th>Name:</th>
            <td><?php echo $restaurant['name']; ?></td>
        </tr>
        <tr>
            <th>Address:</th>
            <td><?php echo $restaurant['address']; ?></td>
        </tr>
        <tr>
            <th>Phone:</th>
            <td><?php echo $restaurant['phone_number']; ?></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><?php echo $restaurant['email']; ?></td>
        </tr>
    </table>
    <a href="index.php" class="btn btn-secondary">Back</a>
</div>
</body>
</html>
