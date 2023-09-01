<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['user_id'];



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>messages</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">
   <link rel="stylesheet" href="css/index.css">

</head>
<body>
   
<?php include 'homeheader.php'; ?>

<section class="messages">

   <h1 class="title"> Details</h1>

   <div class="box-container">
   <?php
      $select_message = mysqli_query($conn, "SELECT * FROM `payment`") or die('query failed');
      if(mysqli_num_rows($select_message) > 0){
         while($fetch_message = mysqli_fetch_assoc($select_message)){
      
   ?>
   <div class="box">
   <p> Payment Type : <span><?php echo $fetch_message['payment_type']; ?></span> </p>
   <p> Delivery_method : <span><?php echo $fetch_message['payment_method']; ?></span> </p>
   
      <p> Delivery Charge : <span><?php echo $fetch_message['amount']; ?></span> </p>
      <p> Delivery Time : <span><?php echo $fetch_message['Time']; ?></span> </p>
      
   </div>
   <?php
      };
   }else{
      echo '<p class="empty"></p>';
   }
   ?>
   </div>

</section>









<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>