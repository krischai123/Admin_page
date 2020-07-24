<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rate</title>

</head>

<body>

<?php 
      require('../Back_end/connect.php'); 
    //   session_start();
?>

<?php
        //  if(isset($_SESSION['my_name'])){
        //  if( $_SESSION["my_name"]["type"] == 0 ){
        //     echo 'สวัสดี admin'; 
  ?>

<!-- <a href="logout.php?" onclick="return confirm('Do you agree to logout?')"> Logout </a> | 
<a href="../../user/admin.php?" onclick="return confirm('Do you agree to homepage?')"> กลับสู่หน้าหลัก </a> -->
<hr>

  <?php  

  require('../Back_end/connect.php') ;
  $rate_id = '';
  $select_rate_name  = '';
  if($_GET && isset($_GET['rid'])){
    $rate_id = $_GET['rid'];

      $sql = 'SELECT * FROM mm_rating WHERE rate_id = '. $rate_id;
      $result = $conn->query($sql);
      //echo $conn->error;
      $row = $result->fetch_assoc();
          //echo $row['rate_id'] . ' : ' . $row['rate_name'] ;
           $select_rate_name = $row['rate_name'];
  }
  
  if($_POST && isset($_POST['edit_rate_name']) && isset($_POST['edit_rate_id'])) {

       $rate_id = $_POST['edit_rate_id'];
      
       $select_rate_name = $_POST['edit_rate_name'];
      
       $sql_update = 'UPDATE mm_rating
                     SET rate_name = "'. $select_rate_name .'" WHERE rate_id = '. $rate_id;
       //echo $sql_update;

       if($conn->query($sql_update) === TRUE){
        echo 'SUCCESS';
      }else{
        echo 'ERROR'. $sql_update . "<br>" . $conn->error; 
      }

  }
     
  ?>
   
   <form action="" method="post">
       EDIT RATE:
        <input type="text" name="edit_rate_name" placeholder="RATE NAME" value="<?= $select_rate_name; ?>">
        <input type="hidden" name="edit_rate_id" value="<?= $rate_id; ?>">
        &emsp;
        <button type="sunmit">
          SUBMIT
        </button>
      </form>

      <br>
  <a href="edit-rate-list.php">COME BACK TO RATE LIST</a>

  <?php

// }else{
//   echo 'คุณไม่สามารถเข้าในหน้านี้ได้';
// }
// }else{
// echo 'คุณไม่ได้ Login';
// }

  ?>

</body>
</html>