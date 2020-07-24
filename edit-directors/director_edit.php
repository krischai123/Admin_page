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
  $director_id = '';
  $select_adirector_firstname  = '';
  $select_director_birthplace = '';
  $select_director_birthdate  = '';

  if($_GET && isset($_GET['directorid'])){
    $director_id = $_GET['directorid'];

      $sql = 'SELECT * FROM mm_director WHERE director_id = '. $director_id;
      $result = $conn->query($sql);
      //echo $conn->error;
      $row = $result->fetch_assoc();
          //echo $row['rate_id'] . ' : ' . $row['rate_name'] ;
           $select_director_firstname = $row['director_name'];
           $select_director_birthplace = $row['director_birthplace'];
           $select_director_birthdate = $row['director_birthdate'];
  }
  
  if($_POST) {

       $director_id = $_POST['edit_director_id'];
       $director_firstname = $_POST['edit_director_name'];;
       $director_birthplace = $_POST['edit_director_birthplace'];
       $director_birthdate = $_POST['edit_director_birthdate'];

       $sql_update = 'UPDATE mm_director SET  director_name = "'. $director_firstname .'",
                                              director_birthplace = "'. $director_birthplace .'",
                                              director_birthdate = "'. $director_birthdate .'" 
                                              WHERE director_id = '. $director_id;
       //echo $sql_update;

       if($conn->query($sql_update) === TRUE){
        echo 'SUCCESS<br>';

      }else{
        echo 'ERROR '. $sql_update . "<br>" . $conn->error; 
      }

  }
     
  ?>
   
    <form action="" method="POST">
    เพิ่ม Director:
    <br>
    firstname : 
    <input type="text" name="edit_director_name" placeholder="First Name" value="<?= $select_director_firstname ?>" required>&emsp;
    Birth Place :
    <input type="text" name="edit_director_birthplace" placeholder="Birth Place" value="<?= $select_director_birthplace ?>" required>&emsp;
    Brith Date :
    <input type="date" name="edit_director_birthdate" value="<?= $select_director_birthdate ?>" required><br>

    <input type="hidden" name="edit_director_id" value="<?= $director_id ?>"required>
    <br>
    <button type="sunmit" onclick="return confirm('Do you agree to edit?')">
      SUBMIT
    </button>
  </form>
      <br>
  <a href="list-directors.php">COME BACK TO DIRECTOR LIST</a>

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