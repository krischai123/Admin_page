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

  $writer_id = '';
  $select_writer_firstname  = '';
  $select_writer_birthplace = '';
  $select_writer_birthdate  = '';

  if($_GET && isset($_GET['writerid'])){
    $writer_id = $_GET['writerid'];

      $sql = 'SELECT * FROM mm_writer WHERE writer_id = '. $writer_id;
      $result = $conn->query($sql);
      //echo $conn->error;
      $row = $result->fetch_assoc();
          //echo $row['rate_id'] . ' : ' . $row['rate_name'] ;
           $select_writer_firstname = $row['writer_name'];
           $select_writer_birthplace = $row['writer_birthplace'];
           $select_writer_birthdate = $row['writer_birthdate'];
  }
  
  if($_POST) {

       $writer_id = $_POST['edit_writer_id'];
       $writer_firstname = $_POST['edit_writer_name'];
       $writer_birthplace = $_POST['edit_writer_birthplace'];
       $writer_birthdate = $_POST['edit_writer_birthdate'];

       $sql_update = 'UPDATE mm_writer SET  writer_name = "'. $writer_firstname .'",
                                            writer_birthplace = "'. $writer_birthplace .'",
                                            writer_birthdate = "'. $writer_birthdate .'" 
                                            WHERE writer_id = '. $writer_id;
       //echo $sql_update;

       if($conn->query($sql_update) === TRUE){
        echo 'SUCCESS<br>';

      }else{
        echo 'ERROR '. $sql_update . "<br>" . $conn->error; 
      }

  }
     
     ?>
   
    <form action="" method="POST">
    เพิ่ม Writer:
    <br>
    firstname : 
    <input type="text" name="edit_writer_name" placeholder="First Name" value="<?= $select_writer_firstname ?>" required>&emsp;
    Birth Place :
    <input type="text" name="edit_writer_birthplace" placeholder="Birth Place" value="<?= $select_writer_birthplace ?>" required>&emsp;
    Brith Date :
    <input type="date" name="edit_writer_birthdate" value="<?= $select_writer_birthdate ?>" required><br>

    <input type="hidden" name="edit_writer_id" value="<?= $writer_id ?>"required>
    <br>
    <button type="sunmit" onclick="return confirm('Do you agree to edit?')">
      SUBMIT
    </button>
  </form>
      <br>
  <a href="list-writers.php">COME BACK TO Writer LIST</a>
  
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