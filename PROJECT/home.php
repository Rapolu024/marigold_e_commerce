<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="home">

   <div class="content">
      <h3>WELCOME TO BEAUTIFUL MARIGOLD WORLD</h3>
      <a href="shop.php" class="btn">discover more</a>
   </div>
   </section>

<section class="home-contact">

   <div class="content">
      <h3>have any questions?</h3>
      <p>We're here to help! Our team of dedicated customer service representatives is available to answer any questions you may have about our products, policies, or services. You can reach out to us.</p>
      <a href="contact.php" class="btn">contact us</a>
   </div>

</section>






<script src="js/script.js"></script>

</body>
</html>