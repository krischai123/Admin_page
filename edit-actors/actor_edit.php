<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rate</title>

</head>

<body>

<?php  

  require('../Back_end/connect.php') ;
//   session_start();
  ?>

<?php
// if(isset($_SESSION['my_name'])){
//          if( $_SESSION["my_name"]["type"] == 0 ){
//             echo 'สวัสดี admin'; 
// ?>

<!-- <a href="logout.php?" onclick="return confirm('Do you agree to logout?')"> Logout </a> | 
<a href="../../user/admin.php?" onclick="return confirm('Do you agree to homepage?')"> กลับสู่หน้าหลัก </a>
<hr> -->


  <?php
  $actor_id = '';
  $select_actor_firstname  = '';
  $select_actor_birthplace = '';
  $select_actor_birthdate  = '';

  if($_GET && isset($_GET['actorid'])){
    $actor_id = $_GET['actorid'];

      $sql = 'SELECT * FROM mm_actor WHERE actor_id = '. $actor_id;
      $result = $conn->query($sql);
      //echo $conn->error;
      $row = $result->fetch_assoc();
          //echo $row['rate_id'] . ' : ' . $row['rate_name'] ;
           $select_actor_firstname = $row['actor_name'];
           $select_actor_birthplace = $row['actor_bplace'];
           $select_actor_birthdate = $row['actor_bdate'];
  }
  
  if($_POST) {

       $actor_id = $_POST['edit_actor_id'];
       $actor_firstname = $_POST['edit_actor_name'];
       $actor_birthplace = $_POST['edit_actor_bplace'];
       $actor_birthdate = $_POST['edit_actor_bdate'];

       $sql_update = 'UPDATE mm_actor SET actor_name = "'. $actor_firstname .'",   
                                          actor_bplace = "'. $actor_birthplace .'",
                                          actor_bdate = "'. $actor_birthdate .'" 
                                          WHERE actor_id = '. $actor_id;
       //echo $sql_update;

       if($conn->query($sql_update) === TRUE){
        echo 'SUCCESS<br>';

        echo '<br> <a href="list-actors.php">Go to Actor List</a> <br>' ;
      }else{
        echo 'ERROR '. $sql_update . "<br>" . $conn->error; 
      }

  }
     
  ?>
   
    <form action="" method="POST">
    เพิ่ม Actor:
    <br>
    firstname : 
    <input type="text" name="edit_actor_name" placeholder="First Name" value="<?= $select_actor_firstname ?>" required>&emsp;
    Birth Place :
    <input type="text" name="edit_actor_bplace" placeholder="Birth Place" value="<?= $select_actor_birthplace ?>" required>&emsp;
    Brith Date :
    <input type="date" name="edit_actor_bdate" value="<?= $select_actor_birthdate ?>" required><br>

    <input type="hidden" name="edit_actor_id" value="<?= $actor_id ?>"required>
    <br>
    <button type="sunmit" onclick="return confirm('Do you agree to edit?')">
      SUBMIT
    </button>
  </form>
      <br>
  <a href="list-actors.php">COME BACK TO ACTOR LIST</a>

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