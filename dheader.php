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
         
      </div>
   </div>

   <div class="header-2">
      <div class="flex">
      <a href="#" class="logo">Delivery Man<span>Account</span></a>
      <a href="home.php" class="logo">BookBazzar.</a>

      <nav class="navbar">
         <a href="home.php">Home</a>
            <a href="Delivery.php">My Profile</a>
            <a href="Ordersdetails.php">Orders Details</a>
            <a href="dcontact.php">contact</a>
            <a href="dview.php">View Task</a>

         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
             <div id="user-btn" class="fas fa-user"></div>
            
           
         </div>

         <div class="account-box">
            <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">logout</a>
         </div>
      </div>
   </div>

</header>