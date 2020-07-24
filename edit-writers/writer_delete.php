<?php
require('../Back_end/connect.php');
// session_start();

// if(isset($_SESSION['my_name'])){
//          if( $_SESSION["my_name"]["type"] == 0 ){
            
    if($_GET && isset($_GET['writerid'])){
        $writer_id = $_GET['writerid'];
    
          $sql_delete = 'DELETE FROM mm_writer WHERE writer_id = '. $writer_id;
          if($conn->query($sql_delete) === TRUE){

            header("Location: list-writers.php"); 
            
          }else{
            echo 'error deleting record:' . "<br>" . $conn->error;
            echo '<br> <a href="writer_list.php">Come Back To Actor List</a> <br>' ;
          }
      }
    // }else{
    //   echo 'คุณไม่สามารถเข้าในหน้านี้ได้';
    // }
    // }else{
    // echo 'คุณไม่ได้ Login';
    // }
?>
