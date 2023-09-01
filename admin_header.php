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
   

      <a href="admin_page.php" class="logo"><span>CEO</span></a>

      <a href="home.php" class="logo"><span>BookBazzar.</span></a>
      <nav class="navbar">
         
         
      
         <a href="CEO.php">Dashboard</a>
         <a href="admin_products.php">products</a>
         <a href="admin_orders.php">Orders</a>
         <a href="User.php">Users</a>
         <a href="adduser.php"> AddUsers</a>
         <a href="adddetails.php">AddDetails</a>
         <a href="task.php">Assign Task</a>
         <a href="admin_contacts.php">Messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">logout</a>
         <div>new <a href="login.php">login</a> | <a href="register.php">register</a></div>
      </div>

   </div>

</header>

