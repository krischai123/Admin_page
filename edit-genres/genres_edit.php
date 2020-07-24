<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Genres</title>

</head>

<body>

<?php 
      require('../Back_end/connect.php'); 
      session_start();
?>

<?php
        //  if(isset($_SESSION['my_name'])){
        //  if( $_SESSION["my_name"]["type"] == 0 ){
        //     echo 'สวัสดี admin'; 
  ?>

<!-- <a href="logout.php?" onclick="return confirm('Do you agree to logout?')"> Logout </a> | 
<a href="../../user/admin.php?" onclick="return confirm('Do you agree to homepage?')"> กลับสู่หน้าหลัก </a>
<hr> -->

  <?php 
  $genres_id = '';
  $select_genres_title  = '';
  if($_GET && isset($_GET['rid'])){
    $genres_id = $_GET['rid'];

      $sql = 'SELECT * FROM mm_genres WHERE genres_id = '. $genres_id;
      $result = $conn->query($sql);
      //echo $conn->error;
      $row = $result->fetch_assoc();
          echo $row['genres_id'] . ' : ' . $row['genres_title'] ;
           $select_genres_title = $row['genres_title'];
  }
  
  if($_POST && isset($_POST['edit_genres_title']) && isset($_POST['edit_genres_id'])) {

      $genres_id = $_POST['edit_genres_id'];
        
      $select_genres_title = $_POST['edit_genres_title'];

       
      
       $sql_update = 'UPDATE mm_genres
                     SET genres_title = "'. $select_genres_title .'" WHERE genres_id = '. $genres_id;
       //echo $sql_update;

       if($conn->query($sql_update) === TRUE){
        
        echo '<br> SUCCESS!!! Data Update : '.$genres_id. ' & ' . $select_genres_title;
      }else{
        echo 'ERROR'. $sql_update . "<br>" . $conn->error; 
      }

  }
     
  ?>
   <form action="" method="post">
       EDIT Genres:
        <input type="text" name="edit_genres_title" placeholder="GENRES NAME" value="<?= $select_genres_title; ?>">
        <input type="hidden" name="edit_genres_id" value="<?= $genres_id; ?>">
        &emsp;
        <button type="sunmit">
          SUBMIT
        </button>
      </form>

      <br>
  <a href="list-genres.php">COME BACK TO RATE LIST</a>

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