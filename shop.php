<?php
include('db_config/conn.php');
session_start();

$user = $_SESSION['logged_in'];
if (!isset($user)) {
    header("location:register.php");
}

// Retrieve distinct categories from the products table
$query = "SELECT DISTINCT category FROM products";
$result = mysqli_query($conn, $query);

$categories = array(); // Array to store the categories

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row['category'];
    }
}

// Check if a category is selected
if (isset($_GET['category'])) {
    $selectedCategory = $_GET['category'];

    // Prepare the SQL query to filter products by category
    if ($selectedCategory == '') {
        $query = "SELECT * FROM products ORDER BY created_at DESC";
    } else {
        $query = "SELECT * FROM products WHERE category = '$selectedCategory' ORDER BY created_at DESC";
    }

    $result = mysqli_query($conn, $query);
} else {
    // Default query to display all products
    $query = "SELECT * FROM products ORDER BY created_at DESC";
    $result = mysqli_query($conn, $query);
}

if (isset($_POST['submit1'])) {
    $id = $_POST['id'];
    
    // Prepare the SQL query to delete the product
    $remove = "DELETE FROM products WHERE id = '$id'";
    $removeResult = mysqli_query($conn, $remove);
    
    // Redirect to the shop page after deletion
    header("Location: shop.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <!-- <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="./css/font-awesome.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/shop.css">


    <style>
        .filter {
    text-align: center;
    margin-bottom: 20px;
}

.filter form {
    display: flex;
    justify-content: center;
    align-items: center;
}

.filter label {
    margin-right: 10px;
    font-weight: bold;
}

.select-wrapper {
    position: relative;
}

.select-wrapper select {
    padding: 8px 16px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-right: 5px;
}

button[type="submit"] {
    padding: 8px 15px;
    border-radius: 7px;
    border: none;
    background-color: var(--textColor);
    color: var(--sectionBack);
    font-size: 18px;
    text-transform: capitalize;
    cursor: pointer;
    transition: .5s;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

.bay{
    position: absolute;
    bottom: 20px;
    right: 20px;
    display: flex;
}

.removeForm{
    margin-right: 5px;
}
    </style>
</head>
<body>
<header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="home.php"><i class="bi bi-house-door-fill">&nbsp;</i>Home</a></li>
                            <li><a href="shop.php"><i class="bi bi-bag-plus-fill">&nbsp;</i>Shop</a></li>
                            <li><a href="cart.php"><i class="bi bi-cart-check-fill">&nbsp;</i>Cart</a></li>
                            <?php if($_SESSION['userId']==3){
                                echo("<li><a href='http://project.test/addproduct.php'><i class='bi bi-bag-plus-fill'>&nbsp;</i>Add Product</a></li>");}
                             ?>
                            <li><a href="logout.php"><i class="bi bi-door-open-fill">&nbsp;</i>log out</a></li>

                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="container1">
    <div class="filter">
    <form action="" method="GET">
        <label for="category">Filter by category:</label>
        <div class="select-wrapper">
            <select name="category" id="category">
                <option value="" <?php if (!isset($_GET['category']) || empty($_GET['category'])) echo 'selected'; ?>>All</option>
                <option value="electronics" <?php if (isset($_GET['category']) && $_GET['category'] == 'electronics') echo 'selected'; ?>>Electronics</option>
                <option value="clothing" <?php if (isset($_GET['category']) && $_GET['category'] == 'clothing') echo 'selected'; ?>>Clothing</option>
                <option value="home" <?php if (isset($_GET['category']) && $_GET['category'] == 'home') echo 'selected'; ?>>Home</option>
                <option value="books" <?php if (isset($_GET['category']) && $_GET['category'] == 'books') echo 'selected'; ?>>Books</option>
                <option value="sports" <?php if (isset($_GET['category']) && $_GET['category'] == 'sports') echo 'selected'; ?>>Sports</option>
                <option value="games" <?php if (isset($_GET['category']) && $_GET['category'] == 'games') echo 'selected'; ?>>Games</option>
            </select>
        </div>
        <button type="submit">Filter</button>
    </form>
</div>

        <div class="products">
            <?php if (mysqli_num_rows($result) > 0) : ?>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <?php
                    $id = $row['id'];
                    $name = $row['name'];
                    $product_price = $row['price'];
                    $Bdescription = $row['Bdescription'];
                    $image = $row['image'];
                    $category = $row['category'];
                    ?>

                    <div class="product">
                        <div class="image">
                            <img src="images/<?= $image ?>" alt="">
                        </div>
                        <div class="namePrice">
                            <h3><?= $name ?></h3>
                            <span><?= $product_price ?>$</span>
                        </div>
                        <p><?= $Bdescription ?></p>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <div class="bay">
                        <form action="shop.php" method="post" class="removeForm">
                        <input type="hidden" name="id" value="<?= $id?>">
                        <?php
                                // Retrieve user information based on the session user id
                                $userId = $_SESSION['userId'];
                                $selectQuery = "SELECT * FROM user WHERE id = $userId";
                                $selectqueryResult = mysqli_query($conn, $selectQuery);
                                $userInfo = mysqli_fetch_assoc($selectqueryResult);

                                // Check if the user status is admin
                                if ($userInfo['status'] === 'admin') {
                                    echo "<button role='button' type='submit' name='submit1'><i class='bi bi-trash-fill'></i></button>";
                                }
                                ?>
                        </form>
                        <a href="detail.php?id=<?= $id ?>"><button> buy now </button></a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <p>No products found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>



