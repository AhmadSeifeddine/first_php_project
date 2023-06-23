<?php
include('db_config/conn.php');
session_start();
$userid = $_SESSION['userId'];

// Select all orders for the current user that are still in the cart status
$sql = "SELECT * FROM orders WHERE user_id = $userid AND status = 'cart'";
$result = mysqli_query($conn, $sql);

// Calculate the subtotal for the cart
$subtotalquery = "SELECT user_id, SUM(total) as subtotal
                  FROM orders
                  WHERE user_id = $userid AND status = 'cart'
                  GROUP BY user_id";
$subtotalresult = mysqli_query($conn, $subtotalquery);
$subtotalrow = mysqli_fetch_assoc($subtotalresult);

// If no items in the cart, set subtotal to 0
if(mysqli_num_rows($subtotalresult) == 0){
    $subtotal = 0;
}
else{
    $subtotal = $subtotalrow['subtotal'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/cart.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/home.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background: white;
            font-family: 'Raleway';
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1>Shopping Cart</h1>
        <div class="project">
            <div class="shop">
                <?php if(mysqli_num_rows($result) > 0):?>
                    <?php while($order = mysqli_fetch_assoc($result)):?>
                        <?php
                        $productid = $order['product_id'];
                        $quantity = $order['quantity'];
                        $total = $order['total'];

                        // Retrieve product details for each order item
                        $sql2 = "SELECT * FROM products WHERE id = $productid";
                        $result2 = mysqli_query($conn, $sql2);
                        $product = mysqli_fetch_assoc($result2);
                        $image = $product['image'];
                        $name = $product['name'];
                        $price = $product['price'];
                        ?>
                        <div class="box">
                            <img src="/images/<?=$image?>">
                            <div class="content">
                                <h3><?=$name?></h3>
                                <h4>Price: <span style="color:orange;"><?=$price?>$</span></h4>
                                <h4 class="middle">Total: <span style="color:orange;"><?=$total?>$</span></h4>
                                <h4>Quantity: <?=$quantity?></h4>
                                <form action="cart.php" method="post">
                                    <input type="hidden" name="productid" value="<?=$productid?>">
                                    <button class="button-61" role="button" type="submit" name="submit1">Remove</button>
                                </form>
                            </div>
                        </div>
                    <?php endwhile;?>
                <?php endif;?>

                <?php
                // Handle form submissions for removing items from the cart and checkout
                $error = '';

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_POST['submit1'])) {
                        $productid1 = $_POST['productid'];
                        $remove = "DELETE FROM orders WHERE product_id = $productid1";
                        $result3 = mysqli_query($conn, $remove);
                        header('Location: ' . $_SERVER['PHP_SELF']);
                        exit;
                    } elseif (isset($_POST['submit2'])) {
                        // Check if the cart is empty before proceeding to checkout
                        if(mysqli_num_rows($result) > 0) {
                            $updateStatus = "UPDATE orders SET status = 'checked_out' WHERE user_id = $userid AND status = 'cart'";
                            $result4 = mysqli_query($conn, $updateStatus);
                            header('Location: checkout.php');
                        } else {
                            $error = "Your cart is empty.";
                        }
                    }
                }
                ?>
            </div>
            <div class="right-bar">
                <p><span>Subtotal</span> <span><?=$subtotal?>$</span></p>
                <hr>
                <p><span>Tax (5%)</span> <span>$6</span></p>
                <hr>
                <p><span>Shipping</span> <span>$15</span></p>
                <hr>
                <form action="cart.php" method="post">     
                    <button class="button-62" role="button" type="submit" name="submit2">Checkout</button>
                    <a href="shop.php">Go To Shop</a>
                </form>
                <?php if(!empty($error)): ?>
                    <p style="color: red;font-size:15px; padding-top: 10px; display:flex; justify-content:center; align-items:center;"><?php echo $error; ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
