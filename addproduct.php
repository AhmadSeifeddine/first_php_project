<?php
include('db_config/conn.php');
session_start();

if(isset($_POST['submit']))
{
    // Check if a file is selected
    if(isset($_FILES['image']))
    {
        // Get the file details
        $FileName = $_FILES['image']['name'];
        $FileSize = $_FILES['image']['size'];
        $FileType = $_FILES['image']['type'];
        $FileTmp = $_FILES['image']['tmp_name'];

        // Check if the file is a valid image
        $ValidImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = strtolower(pathinfo($FileName, PATHINFO_EXTENSION));

        if(!in_array($imageExtension, $ValidImageExtension))
        {
            echo "Invalid file type. Only JPG, JPEG, and PNG images are allowed.";
            exit;
        }

        // Generate a unique image name
        $newImageName = uniqid() . '.' . $imageExtension;

        // Move the uploaded file to the "images" folder with the new name
        $destination = 'images/' . $newImageName;
        if(!move_uploaded_file($FileTmp, $destination))
        {
            echo "Failed to move the uploaded file.";
            exit;
        }
    }
    else
    {
        echo "No image file selected.";
        exit;
    }

    // Get the product details from the form
    $name = $_POST['name'];
    $price = $_POST['price'];
    $Bdescription = addslashes($_POST['Bdescription']);
    $description = addslashes($_POST['description']);
    $category = $_POST['category'];
    $user_id = $_SESSION['userId'];

    // Insert the product details into the database
    $query = "INSERT INTO products (user_id, name, price, Bdescription, description ,category, image, created_at) VALUES ('$user_id', '$name', '$price', '$Bdescription', '$description' ,'$category', '$newImageName', NOW())";
    $result = mysqli_query($conn, $query);

    if($result)
    {
        // Redirect to the shop page after successful product addition
        header("Location: shop.php");
        exit;
    }
    else
    {
        echo "Failed to add the product.";
    }
}

// Check if the user is logged in
$user = $_SESSION['logged_in'];
if (!isset($user)) {
    // Redirect to the registration page if not logged in
    header("location:register.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add a Product</title>
  <link rel="stylesheet" href="/css/addproduct.css">
</head>
<body>
  <div class="container">
    <h2>Add a Product</h2>
    <form method="post" action="addproduct.php" enctype="multipart/form-data">
      <div class="form-group">
        <label for="image">Product Image:</label>
        <input type="file" id="image" name="image" accept="image/jpeg, image/png">
      </div>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="price">Price:</label>
        <input type="text" id="price" name="price">
      </div>
      <div class="form-group">
        <label for="category">Category:</label>
        <select id="category" name="category">
        <option value="electronics">Electronics</option>
        <option value="clothing">Clothing</option>
        <option value="home">Home</option>
        <option value="books">Books</option>
        <option value="sports">Sports</option>
        <option value="games">Games</option>
        </select>

      </div>
      <div class="form-group">
        <label for="description">Brief Description:</label>
        <textarea id="description" name="Bdescription"></textarea>
      </div>

      <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
      </div>


      <div class="form-group">
        <button type="submit" name="submit">Add Product</button>
      </div>
    </form>
  </div>
</body>
</html>
