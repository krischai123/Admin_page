<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actor List</title>
</head>

<body>  

  <?php
        require('../Back_end/connect.php') ;
        // session_start();

  ?>

  <?php
        //  if(isset($_SESSION['my_name'])){
        //  if( $_SESSION["my_name"]["type"] == 0 ){
        //     echo 'สวัสดี admin'; 
  ?>

<a href="logout.php?" onclick="return confirm('Do you agree to logout?')"> Logout </a> | 
<a href="../../user/admin.php?" onclick="return confirm('Do you agree to homepage?')"> กลับสู่หน้าหลัก </a>
<hr>

   <h1> Actor List </h1>
<?php
        $insert_firstname = '';
        $insert_birthplace = '';
        $insert_birthdate = '';

  if($_GET){
    $insert_firstname = $_GET['input_fn'];
    $insert_birthplace = $_GET['input_bp'];
    $insert_birthdate = $_GET['input_bd'];

      $sql_insert = 'INSERT INTO mm_actor(actor_name,actor_bplace,actor_bdate) 
      VALUES 
      ("'. $insert_firstname .'","'. $insert_birthplace .'","'. $insert_birthdate .'")';
      
      if($conn->query($sql_insert) === TRUE){
        echo 'SUCCESS<br>';

        echo '<br> <a href="list-actors.php">Go to Actor List</a> <br>' ;
      }else{
        echo 'ERROR'. $sql_insert . "<br>" . $conn->error; 
      }
    }
  ?>
  <br>
  <form action="" method="GET">
    เพิ่ม Actor:
    <br>
    firstname : 
    <input type="text" name="input_fn" placeholder="First Name" required>&emsp;
    Birth Place :
    <input type="text" name="input_bp" placeholder="Birth Place" required>&emsp;
    Brith Date :
    <input type="date" name="input_bd" required><br>

    <br>
    <button type="sunmit">
      SUBMIT
    </button>
  </form>

  <br>
    </tbody>
  </table>

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