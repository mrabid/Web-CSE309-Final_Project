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

   <div class="flex">

      <a href="#" class="logo"><span>AccountantAccount</span></a>
      <a href="home.php" class="logo"><span>BookBazzar.</span></a>

      <nav class="navbar">
         <a href="home.php">home</a>
         
         <a href="aorder.php">orders</a>
         <a href="Accountant.php">Dashboard</a>
         <a href="acontact.php">contact</a>
         
         <a href="aview.php"> See Task</a>
         <a href="aassign.php">Assign Task</a>
         
        
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">logout</a>
         <div> <a href="login.php">login</a> | <a href="register.php">register</a></div>
      </div>

   </div>

</header>