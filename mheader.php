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

      <a href="#" class="logo"><span>ManagerAccount</span></a>
      <a href="home.php" class="logo"><span>BookBazzar.</span></a>

      <nav class="navbar">
         
         <a href="Mannager.php">Dashboard</a>
         <a href="mproduct.php">products</a>
         <a href="morder.php">orders</a>
         <a href="mcontact.php">contact</a>
         <a href="mview.php"> See Task</a>
        <a href="seeuser.php"> See Users</a>
        <a href="massign.php">Assign Task</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">logout</a>
         
      </div>

   </div>

</header>