<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];


if(!isset($admin_id)){
    header('location:login.php');};

    if(isset($_POST['add_product'])){

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $price = $_POST['price'];
        $imagee = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'uploaded_img/'.$imagee;
     
        $select_product_name = mysqli_query($conn, "SELECT name FROM `bestselling` WHERE name = '$name'") or die('query failed');
     
        if(mysqli_num_rows($select_product_name) > 0){
           $message[] = 'product name already added in best selling information';
        }else{
           $add_product_query = mysqli_query($conn, "INSERT INTO `bestselling`(name, price, image) VALUES('$name', '$price', '$imagee')") or die('query failed');
     
           if($add_product_query){
              if($image_size > 2000000){
                 $message[] = 'image size is too large';
              }else{
                 move_uploaded_file($image_tmp_name, $image_folder);
                 $message[] = 'product added successfully in best selling information';
              }
           }else{
              $message[] = 'product could not be added!';
           }
        }
     }
    

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_image_query = mysqli_query($conn, "SELECT image FROM `bestselling` WHERE id = '$delete_id'") or die('query failed');
    $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
    unlink('uploaded_img/'.$fetch_delete_image['image']);
    mysqli_query($conn, "DELETE FROM `bestselling` WHERE id = '$delete_id'") or die('query failed');
    header('location:addbestselling.php');
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

   <h1 class="title"></h1>

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Add best selling product</h3>
      <input type="text" name="name" class="box" placeholder="enter product name" required>
      <input type="number" min="0" name="price" class="box" placeholder="enter product price" required>
      <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
      <input type="submit" value="add product" name="add_product" class="btn">
   </form>

</section>

<!-- product CRUD section ends -->

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
         
         <div class="price">Price :<?php echo $fetch_products['price']; ?>TK/-</div>
         
         
         <a href="addbestselling.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

</section>











<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>