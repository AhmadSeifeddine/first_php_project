<?php
include('db_config/conn.php');
session_start();
$id = $_GET['id'];

// Redirect to home page if the product ID is empty
if (empty($id)) {
    header('location:home.php');
    exit;
}

// Retrieve product details based on the given ID
$sql = "SELECT * FROM PRODUCTS WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$price = $row['price'];
$image = $row['image'];
$description = $row['description'];

$user = $_SESSION['logged_in'];

// Redirect to the registration page if the user is not logged in
if (!isset($user)) {
    header("location:register.php");
    exit;
}

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quantity = $_POST['quantity'];
    
    // Validate the quantity input
    if (empty($quantity)) {
        $errorMessage = 'Quantity is required';
    } elseif ($quantity < 0) {
        $errorMessage = 'Quantity cannot be negative';
    } else {
        $userId = $_SESSION['userId'];
        $total = $price * $quantity;
        
        // Insert the order into the "orders" table
        $insertQuery = "INSERT INTO orders (user_id, product_id, quantity, total, ordered_at) VALUES ('$userId', '$id', '$quantity', '$total', NOW())";
        
        // Execute the insert query
        if (mysqli_query($conn, $insertQuery)) {
            // Display a success message and redirect to the shop page
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "success",
                    title: "Added To Cart",
                    showConfirmButton: true,
                    timer: 4000
                }).then(function() {
                    window.location.href = "shop.php";
                });
            });
            </script>';
            exit;
        } else {
            $errorMessage = 'Error in inserting the order';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/css/all-min.css">
    <link rel="stylesheet" href="/css/detail.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Product Details</title>
</head>
<style>
    input::placeholder { 
        color: white;
        font-weight: 300;
    }
    .options {
        margin-bottom: 10px;
    }
</style>
<body>
    <div class="container">
        <div class="box">
            <div class="images">
                <div class="img-holder active">
                    <img src="/images/<?=$image?>">
                </div>
            </div>
            <div class="basic-info">
                <h1><?=$name?></h1>
                <div class="rate">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                </div>
                <span><?=$price?>$</span>
                <form action="detail.php?id=<?=$id?>" method="post">
                    <div class="options">
                        <button type="submit" name="submit" style="color:white; background-color: #aa3ea1; padding: 10px 15px; font-size: 20px; border-radius: 5px; border: transparent; font-weight: 600;">Add to Cart</button>&nbsp;
                        <a href="shop.php">Go To Shop</a>
                    </div>
                    <input type="number" name="quantity" placeholder="Enter Product Quantity..." style="padding: 5px 15px; text-align: center; color:white; background-color:#aa3ea1; border:transparent; border-radius: 5px; font-size: 20px; width: fit-content; margin-bottom: 20px;">
                    <?php if (!empty($errorMessage)): ?>
                        <p class="error-message" style="color: red; margin-top: 5px;"><?php echo $errorMessage; ?></p>
                    <?php endif; ?>
                </form>
            </div>
            <div class="description">
                <p><?=$description?></p>
                <ul class="features">
                    <li><i class="bi bi-check-circle-fill"></i>Supported Feature</li>
                    <li><i class="bi bi-check-circle-fill"></i>Supported Feature</li>
                    <li><i class="bi bi-check-circle-fill"></i>Supported Feature</li>
                    <li><i class="bi bi-file-x-fill"></i>Unsupported Feature</li>
                    <li><i class="bi bi-file-x-fill"></i>Unsupported Feature</li>
                </ul>
                <ul class="social">
                    <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                    <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                    <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
