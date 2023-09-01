<?php

include 'config.php';

session_start();



if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

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

   <!-- custom css file link  -->
   
   <link rel="stylesheet" href="css/admin.css">
   <link rel="stylesheet" href="css/index.css">

</head>
<body>
   
<?php include 'homeheader.php'; ?>

<section class="homee">

   <div class="content">
      <h3>Choose Your Best BookBazzar</h3>
      <p>We  provide Best Services For You</p>
      <a href="about.php" class="white-btn">discover more</a>
   </div>

</section>


   

</section>

<section class="about">

   <div class="flex">

      

      <div class="content">
      <div class="image">
         <img src="images/about-img.jpg" alt="">
      </div><br><br>
         <h3>about us</h3>
         <p>

Welcome to our E-Book Shop, your go-to destination for a world of literary wonders in digital form. Our mission is to bring the joy of reading to the modern digital age, offering a vast and diverse collection of e-books that cater to every taste and interest.
<br>
<b>**Our Passion for Reading:**</b>
At the heart of our E-Book Shop is a deep and abiding passion for reading. We understand that reading is not just a hobby, but a gateway to new worlds, ideas, and perspectives. In an era where technology is constantly evolving, we're dedicated to preserving the timeless art of reading and making it accessible to everyone, everywhere.
<br>


<b>**Supporting Authors:**</b>
Behind every e-book is a dedicated author who poured their creativity and passion into crafting a captivating story or insightful work. We are committed to supporting authors by providing a platform for their literary creations to reach a wider audience. By purchasing e-books from our shop, you're not just indulging in a great read, but also supporting the literary community.
<br>

Thank you for being a part of our reading revolution. Happy reading!<br>

<b>*Contact Us:*</b>
Have questions, suggestions, or just want to share your reading experiences? We're here for you. Reach out to our dedicated customer support team at [sanirashuchi@email.com]. Your feedback helps us shape a better reading experience for everyone.</p>
         <a href="about.php" class="btn">read more</a>
      </div>

   </div>





   <section class="about">

<div class="flex">

   

   <div class="content">
   
      
      
      <u><h3>Cheak our best selling product</h3><br><br></u>
      
      <section class="show-products">
   

   <div class="box-container">


      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `bestselling`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <div class="box">
      <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
         <div class="name">Product name: <?php echo $fetch_products['name']; ?></div>
         
         <div class="price">Price<?php echo $fetch_products['price']; ?>TK/-</div>
         
         <a href="login.php" class="btn">Add to chart</a>
         
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

</section>

 
   </div>

</div><br><br>









</section>

   
      

   





<section class="home-contact">

   <div class="content">
      <h3>have any questions?</h3>
      
      <a href="contact.php" class="white-btn">contact us</a>
   </div>

</section>





<?php include 'homefooter.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>