<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <div class="header-1">
      <div class="flex">
      
         <div class="share">
            <a href="https://www.facebook.com/jakolinj?mibextid=ZbWKwL" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <p> <a href="login.php">login</a> | New ?<a href="register.php">register</a> </p>
      </div>
   </div>

   <div class="header-2">
      <div class="flex">
      <a href="#" class="logo">Home<span>Page</span></a>
         <a href="home.php" class="logo">BookBazzar.</a>

         <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="about.php">About</a>
            <a href="detailp.php">Delivery_man_job_Details</a>
            <a href="detaild.php">Payment_and_Delivery_Details</a>
            
           
            

            
         </nav>

         <div class="icons">
            
            
            
            
         </div>

         <div class="user-box">
            <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">logout</a>
         </div>
      </div>
   </div>

</header>