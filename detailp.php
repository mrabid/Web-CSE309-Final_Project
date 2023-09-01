<?php

include 'config.php';

session_start();




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
   <link rel="stylesheet" href="css/admin_style.css">
</head>
<body>
   
<?php include 'homeheader.php'; ?>



<section class="products">

   <h1 class="title">Details Information</h1>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `details` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['delivery_name']; ?></div>
      <div class="name"><?php echo $fetch_products['delivery_type']; ?></div>
      <div class="price">Salary-<?php echo $fetch_products['salary']; ?>TK</div>
      <a href="deliverycontact.php" class="btn">Contact Us for Registration</a>
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

  
      

      






<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>