<?php
require('../Back_end/connect.php');
?>
<?php          
    if($_GET && isset($_GET['actorid'])){
        $actor_id = $_GET['actorid'];
    
          $sql_delete = 'DELETE FROM mm_actor WHERE actor_id = '. $actor_id;
          if($conn->query($sql_delete) === TRUE){

            header("Location: list-actors.php"); 
            
          }else{
            echo 'error deleting record:' . "<br>" . $conn->error;
            echo '<br> <a href="edit-actors.php">Come Back To Actor List</a> <br>' ;
          }
      }
?>

