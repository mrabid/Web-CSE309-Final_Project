<?php

include 'config.php';

if(isset($_POST['submit'])){
   
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   
   $msg = mysqli_real_escape_string($conn, $_POST['message']);
   $tpe = mysqli_real_escape_string($conn, $_POST['type']);
   

   $select_message = mysqli_query($conn, "SELECT * FROM `task` WHERE name = '$name' AND email = '$email' AND type = '$tpe' AND message = '$msg'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = ' already Assigned task!';
   }else{
      mysqli_query($conn, "INSERT INTO `task`( name, email, type, message) VALUES( '$name', '$email', '$tpe', '$msg')") or die('query failed');
      $message[] = 'Assign task successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/admin_style.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/index.css">

</head>
<body>
<?php include 'aheader.php'; ?>


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
   


<div class="form-container">

   <form action="" method="post">
      <h3>Assign Task Now</h3>
      <input type="type" name="type" required placeholder="enter your employe Type" class="box">
      <input type="text" name="name" required placeholder="enter your employe name" class="box">
      <input type="email" name="email" required placeholder="enter your employe email" class="box">
     
      <textarea name="message" class="box" placeholder="Assign your Task" id="" cols="30" rows="10"></textarea>
      
      
         
      </select>
      <input type="submit" name="submit" value="Assign now" class="btn">
      
   </form>

</div>
</body>
</html>