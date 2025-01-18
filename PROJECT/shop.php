<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['add_to_wishlist'])){

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

    $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if(mysqli_num_rows($check_wishlist_numbers) > 0){
        $message[] = 'already added to wishlist';
    }elseif(mysqli_num_rows($check_cart_numbers) > 0){
        $message[] = 'already added to cart';
    }else{
        mysqli_query($conn, "INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_image')") or die('query failed');
        $message[] = 'product added to wishlist';
    }

}

if(isset($_POST['add_to_cart'])){

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if(mysqli_num_rows($check_cart_numbers) > 0){
        $message[] = 'already added to cart';
    }else{

        $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

        if(mysqli_num_rows($check_wishlist_numbers) > 0){
            mysqli_query($conn, "DELETE FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
        }

        mysqli_query($conn, "INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
        $message[] = 'product added to cart';
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shop</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}
h1{
    margin-top:1rem;
    margin-bottom:1rem;
}
img{
    margin-top:1rem;
    margin-bottom:1rem;
    
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #fdbcb4;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
.card {
  float: left;
  width: 33.33%;
  padding: 5px;
}
.cards{
  display: flex;
  align-items: center;

}
.cards{
    margin-bottom:5rem;
}

/* Clear floats after image containers */
.cards::after {
    
  content: "";
  clear: both;
  display:table;
}
.cards1{
  display: flex;
  align-items: center;

}

/* Clear floats after image containers */
.cards1::after {
    
  content: "";
  clear: both;
  display:table;
}
.card{
    background: url(../images/soap.jpg);
}
body {
  background-image: url("images/product1.jpg");
  background-color: #cccccc;
    }

</style>

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading"
    style="margin-bottom:5rem;">
    <p>Experience the purity and beauty of the Marigold flower in every product we offer. Custom made products exclusively with beauty of Marigold.</p>
</section>


<h2 style="text-align:center;margin-bottom:1.5em;">Product Card</h2>
<div class="cards">

<div class="card">
   <img src="images/toys.jpg" alt="toys" style="width:50%">
  <h1>Toys</h1>
  <p><button><a href="toys.php">click here</a></button></p>
</div>
<div class="card">
  <img src="images/Household.jpg" alt="Household" style="width:50% ">
  <h1>Household</h1>
  <p><button><a href="Household.php">click here</a></button></p>
</div>
<div class="card">
  <img src="images/skincare1.png" alt="skincare" style="width:50% ">
  <h1>skincare</h1>
  <p><button><a href="skincare.php">click here</a></button></p>
</div>
<div class="card">
  <img src="images/electronic.jpg" alt="electronics" style="width:50% ">
  <h1>electronics</h1>
  <p><button><a href="electronics.php">click here</a></button></p>
</div>
<div class="card">
  <img src="images/clothing.jpeg" alt="Clothing" style="width:50% ">
  <h1>Clothes</h1>
  <p><button><a href="clothing.php">click here</a></button></p>
</div>
<div class="card">
  <img src="images/office.jpeg" alt="Office equipment" style="width:50% ">
  <h1>Office</h1>
  <p><button><a href="office.php">click here</a></button></p>
</div>
<div class="card">
  <img src="images/furniture.jpg" alt="Furniture" style="width:50% ">
  <h1>Furniture</h1>
  <p><button><a href="furniture.php">click here</a></button></p>
</div>
</div>





<script src="js/script.js"></script>

</body>
</html>