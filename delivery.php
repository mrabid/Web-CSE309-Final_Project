<?php

include 'config.php';

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
   <title></title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/index.css">
   

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">


</head>
<body>
   
<?php include 'dheader.php'; ?>

<section class="Delivery">

   <div class="content">
   <h3>Welcome To Our BookBazzar </h3>
      <h3>Welcome To Our Delivery World</h3>
      <p>Do Your Best For Us And Become Our Best Delivery Man</p>
      <a href="about.php" class="white-btn">discover more</a>
   </div>

</section>
<!-- admin dashboard section starts  -->

<section class="dashboard">

   <h1 class="title">dashboard</h1>

   <div class="box-container">

      <div class="box">
         <?php
            $total_pendings = 0;
            $select_pending = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'pending'") or die('query failed');
            if(mysqli_num_rows($select_pending) > 0){
               while($fetch_pendings = mysqli_fetch_assoc($select_pending)){
                  $total_price = $fetch_pendings['total_price'];
                  $total_pendings += $total_price;
               };
            };
         ?>
         <h3>$<?php echo $total_pendings; ?>/-</h3>
         <p>total pendings</p>
      </div>

      

      <div class="box">
         <?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
            $number_of_orders = mysqli_num_rows($select_orders);
         ?>
         <h3><?php echo $number_of_orders; ?></h3>
         <p>order placed</p>
      </div>

      

     

      

      

      
   </div>

</section>

<!-- admin dashboard section ends -->









<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>





<?php include 'footer2.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>