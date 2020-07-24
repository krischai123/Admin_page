<?php
  require('../Back_end/connect.php');
//   session_start();
//   if(isset($_SESSION['my_name'])){
//           if( $_SESSION["my_name"]["type"] == 0 ){
              
      if($_GET && isset($_GET['rid'])){
          $rate_id = $_GET['rid'];
      
            $sql_delete = 'DELETE FROM mm_rating WHERE rate_id = '. $rate_id;
            if($conn->query($sql_delete) === TRUE){
              header("Location: edit-rate-list.php"); 
            }else{
              echo 'error deleting record:' . "<br>" . $conn->error; 
            }
        }

    //   }else{
    //     echo 'คุณไม่สามารถเข้าในหน้านี้ได้';
    //   }
    //   }else{
    //   echo 'คุณไม่ได้ Login';
    //   }

  ?>
