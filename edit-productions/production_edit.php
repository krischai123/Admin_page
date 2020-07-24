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
  $production_id = '';
  $select_pco_name  = '';
  if($_GET && isset($_GET['pcoid'])){
    $production_id = $_GET['pcoid'];

      $sql = 'SELECT * FROM mm_production WHERE pco_id = '. $production_id;
      $result = $conn->query($sql);
      //echo $conn->error;
      $row = $result->fetch_assoc();
          //echo $row['rate_id'] . ' : ' . $row['rate_name'] ;
           $select_pco_name = $row['pco_title'];
  }
  
  if($_POST && isset($_POST['edit_pco_name']) && isset($_POST['edit_pco_id'])) {

       $production_id = $_POST['edit_pco_id'];
      
       $select_pco_name = $_POST['edit_pco_name'];
      
       $sql_update = 'UPDATE mm_production
                     SET pco_title = "'. $select_pco_name .'" WHERE pco_id = '. $production_id;
       //echo $sql_update;

       if($conn->query($sql_update) === TRUE){
        echo 'SUCCESS';
      }else{
        echo 'ERROR'. $sql_update . "<br>" . $conn->error; 
      }

  }
     
  ?>
   
   <form action="" method="post">
       EDIT PRODUCTION:
        <input type="text" name="edit_pco_name" placeholder="Production NAME" value="<?= $select_pco_name; ?>">
        <input type="hidden" name="edit_pco_id" value="<?= $production_id; ?>">
        &emsp;
        <button type="sunmit">
          SUBMIT
        </button>
      </form>

      <br>
  <a href="list-productions.php">COME BACK TO PRODUCTION LIST</a>

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