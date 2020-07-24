<?php
require('../Back_end/connect.php');
// session_start();

// if(isset($_SESSION['my_name'])){
//   if( $_SESSION["my_name"]["type"] == 0 ){

    if($_GET && isset($_GET['directorid'])){
        $director_id = $_GET['directorid'];
    
          $sql_delete = 'DELETE FROM mm_director WHERE director_id = '. $director_id;
          if($conn->query($sql_delete) === TRUE){

            header("Location: list-directors.php"); 
            
          }else{
            echo 'error deleting record:' . "<br>" . $conn->error;
            echo '<br> <a href="edit-directors.php">Come Back To Actor List</a> <br>' ;
          }
      }

//     }else{
//       echo 'คุณไม่สามารถเข้าในหน้านี้ได้';
//     }
    
// }else{
//   echo 'คุณไม่ได้ Login';
// }

?>
