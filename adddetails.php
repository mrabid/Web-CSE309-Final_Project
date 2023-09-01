<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];


if(!isset($admin_id)){
    header('location:login.php');};

if(isset($_POST['add_productt'])){
   $delivery_name = mysqli_real_escape_string($conn, $_POST['delivery_name']);
   $delivery_type = mysqli_real_escape_string($conn, $_POST['delivery_type']);
   $salary = $_POST['salary'];
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select_delivery_type= mysqli_query($conn, "SELECT delivery_type FROM `details` WHERE delivery_type = '$delivery_type'") or die('query failed');
   $select_delivery_name = mysqli_query($conn, "SELECT delivery_name FROM `details` WHERE delivery_name = '$delivery_name'") or die('query failed');
   if(mysqli_num_rows($select_delivery_name ) > 0){
      $message[] = 'Information already added';
   }else{
      $add_delivery_query = mysqli_query($conn, "INSERT INTO `details`(delivery_name, delivery_type,salary, image) VALUES('$delivery_name','$delivery_type', '$salary', '$image')") or die('query failed');

      if($add_delivery_query){
         if($image_size > 2000000){
            $message[] = 'image size is too large';
         }else{
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'Delivery details added successfully!';
         }
      }else{
         $message[] = 'Delivery Details could not be added!';
      }
   }
}


if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_image_query = mysqli_query($conn, "SELECT image FROM `details` WHERE id = '$delete_id'") or die('query failed');
    $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
    unlink('uploaded_img/'.$fetch_delete_image['image']);
    mysqli_query($conn, "DELETE FROM `details` WHERE id = '$delete_id'") or die('query failed');
    header('location:adddetails.php');
 }
 
 
   
 


if(isset($_POST['submit'])){
   
    $payment_type = mysqli_real_escape_string($conn, $_POST['payment_type']);
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    
    $Time = mysqli_real_escape_string($conn, $_POST['Time']);
    
    
 
    $select_type = mysqli_query($conn, "SELECT * FROM `payment` WHERE payment_type = '$payment_type' AND payment_method = '$payment_method'AND amount='$amount' AND Time= 'Time'") or die('query failed');
 
    if(mysqli_num_rows($select_type) > 0){
       $message[] = 'Payment details already Assigned !';
    }else{
       mysqli_query($conn, "INSERT INTO `payment`( payment_type, payment_method, amount, Time) VALUES( '$payment_type', '$payment_method', '$amount', '$Time')") or die('query failed');
       $message[] = ' Payment details assign  successfully!';
    }
 
 }

 if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `payment` WHERE id = '$delete_id'") or die('query failed');
    header('location:adddetails.php');
 }


 
 






 
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin.css">
   <link rel="stylesheet" href="css/index.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<!-- product CRUD section starts  -->

<section class="add-products">

   <h1 class="title"> Add details</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Add Delivery Information</h3>
      <input type="text" name="delivery_name" class="box" placeholder="enter delivery name" required>
      <input type="text" name="delivery_type" class="box" placeholder="enter delivery type" required>
      <input type="number" min="0" name="salary" class="box" placeholder="enter salary" required>
      <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
      <input type="submit" value="add product" name="add_productt" class="btn">
   </form>



</section>


<!-- show products  -->

<section class="show-products">

   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `details`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <div class="box">
         <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
         <div class="name">Delivery name :<?php echo $fetch_products['delivery_name']; ?></div>
         <div class="name">Delivery Type :<?php echo $fetch_products['delivery_type']; ?></div>
         <div class="price">Salary :<?php echo $fetch_products['salary']; ?>TK/-</div>
         
         <a href="adddetails.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

</section>






<div class="form-containerr">

   <form action="" method="post">
      <h3>Add Payment Details</h3>
      
      <input type="text" name=" payment_type" required placeholder="enter payment type" class="box">
      <input type="text" name="payment_method" required placeholder="enter payment method" class="box">
      <input type="number" name="amount" required placeholder="enter amount" class="box">
      <input type="text" name="Time" required placeholder="enter delivery time" class="box">
     
      
      
      
         
      </select>
      <input type="submit" name="submit" value="Assign now" class="btn">
      
   </form>

</div>

<section class="show-products">

   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `payment`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <div class="box">
         
         <div class="name">Payment Type :<?php echo $fetch_products['payment_type']; ?></div>
         <div class="name">Payment method :<?php echo $fetch_products['payment_method']; ?></div>
         <div class="price">Delivery charge :<?php echo $fetch_products['amount']; ?>TK/-</div>
         <div class="name">Time :<?php echo $fetch_products['Time']; ?></div>
         
         <a href="adddetails.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>
   
   <div class="form-containerr">

   <form action="" method="post">
      <h3><a href="addbestselling.php" class="btn">Add best selling Product</a>
</h3>
      
      
      
   </form>

</div>
   
</section>
















<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>