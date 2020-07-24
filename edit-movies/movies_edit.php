<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Movies</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
        integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">


    </script>
</head>

<body class="sb-nav-fixed">

<?php
    $get_id = '';
    require('../Back_end/connect.php') ;
    require('../Back_end/sql_movie_view.php');
?>
<nav class="sb-topnav navbar navbar-expand-lg navbar-light bg-light">
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <a class="navbar-brand" href="#"><a class="navbar-brand" href="../index.php"><img src="../../../image/Mlogo.png" img-responsive" alt="Cinque Terre" width="50" height="50"></a></a>
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <!-- <div class="input-group">
                <input class="form-control" type="text" placeholder="Search movies, more..." aria-label="Search"
                    aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div> -->
        </form>
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img type="button" src="../../../image/sign-up.png" img-responsive" alt="Cinque Terre" width="40" height="40" data-toggle="modal" data-target="#loginModal"> </a>
                <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="userDropdown">
<!-- 
                    <a class="dropdown-item" href="login.php"><i class="fas fa-sign-in-alt"> </i>&nbsp;&nbsp;Login</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="register.php"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;register</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="password.php"><i class="fas fa-columns"></i>&nbsp;&nbsp;Forgot Password</a>                 
                    <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item" href="account.php"><i class="far fa-id-card"></i>&nbsp;&nbsp;Account</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="setting.php"><i class="fas fa-cog"></i>&nbsp;&nbsp;Setting</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a>
                </div>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <!-- Menu list -->
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <div class="sb-sidenav-menu-heading"> Menu LIST</div>
                            <!-- List of movies -->
                            <!-- <a class="nav-link" href="edit-list.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                                Edit List
                            </a> -->
                            <a class="nav-link" href="../edit-movies/list-movies.php"><i class="fas fa-caret-square-right"></i>&nbsp;&nbsp;Movies</a>
                            <a class="nav-link" href="../edit-genres/list-genres.php"><i class="fas fa-caret-square-right"></i>&nbsp;&nbsp;Genres</a>
                            <a class="nav-link" href="../edit-actors/list-actors.php"><i class="fas fa-caret-square-right"></i>&nbsp;&nbsp;Actors</a>
                            <a class="nav-link" href="../edit-rate/edit-rate-list.php"><i class="fas fa-caret-square-right"></i>&nbsp;&nbsp;RATE</a>
                            <a class="nav-link" href="../edit-directors/list-directors.php"><i class="fas fa-caret-square-right"></i>&nbsp;&nbsp;Directors</a>
                            <a class="nav-link" href="../edit-writers/list-writers.php"><i class="fas fa-caret-square-right"></i>&nbsp;&nbsp;Writers</a>
                            <a class="nav-link" href="../edit-productions/edit-productions.php"><i class="fas fa-caret-square-right"></i>&nbsp;&nbsp;Productions</a>
                        </nav>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as :</div>
                    Admin
                </div>
            </nav>
        </div>


        <div id="layoutSidenav_content">
            <main>

                <div class="container-fluid">

                    <!-- เว้นช่องข้างบน -->
                    <div class="mt-4"></div>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-edit"></i>
                            Edit Movies
                        </div>

                        <div class="card-body">
                        
                        <?php
                                // if(isset($_SESSION['my_name'])){
                                // if( $_SESSION["my_name"]["type"] == 0 ){
                                //     echo 'สวัสดี admin'; 
                        ?>

                        <!-- <a href="logout.php?" onclick="return confirm('Do you agree to logout?')"> Logout </a> | 
                        <a href="../../user/admin.php?" onclick="return confirm('Do you agree to homepage?')"> กลับสู่หน้าหลัก </a> -->
                        <hr>

                        <?php  
                        $movie_id = '';
                        $select_title  = '';
                        $select_plot  = '';
                        $select_runtime  = '';
                        $select_release_date  = '';
                        $select_income = '';
                        $select_rate_id  = '';

                        if($_GET && isset($_GET['movieid'])){
                            $movie_id = $_GET['movieid'];

                            $sql = 'SELECT * FROM mm_movies WHERE movie_id = '. $movie_id;
                            $result = $conn->query($sql);
                            //echo $conn->error;
                            $row = $result->fetch_assoc();
                                //echo $row['rate_id'] . ' : ' . $row['rate_name'] ;
                                $select_title = $row['movie_title'];
                                $select_plot = $row['movie_plot'];
                                $select_runtime = $row['movie_runtime'];
                                $select_release_date = $row['movie_release_date'];
                                $select_income = $row['movie_income'];
                                $select_rate_id = $row['rate_id'];
                        }
                        
                        if($_POST) {

                            $movie_id = $_POST['edit_movie_id'];
                            $select_title = $_POST['edit_movie_title'];
                            $select_plot = $_POST['edit_movie_plot'];
                            $select_runtime = $_POST['edit_movie_runtime'];
                            $select_release_date = $_POST['edit_movie_release_date'];
                            $select_income = $_POST['edit_movie_income'];
                            $select_rate_id = $_POST['edit_rate_id'];

                            $sql_update = 'UPDATE mm_movies SET movie_title = "'.  $select_title .'",
                                                                movie_plot = "'. $select_plot .'",
                                                                movie_runtime = "'. $select_runtime .'",
                                                                movie_release_date = "'. $select_release_date .'",
                                                                movie_income = "'. $select_income .'",
                                                                rate_id = "'. $select_rate_id .'" 
                                                                WHERE movie_id = '. $movie_id;
                            //echo $sql_update;

                            if($conn->query($sql_update) === TRUE){
                                echo 'SUCCESS<br>';

                                echo '<br> <a href="list-movies.php">Go to Movies List</a> <br>' ;
                            }else{
                                echo 'ERROR '. $sql_update . "<br>" . $conn->error; 
                            }

                        }
                            
                        ?>
                        <a href="movie_genres_edit.php?movieid=<?= $movie_id ;?>" onclick="return confirm('Do you agree to edit?')"> แก้ไข genres</a>
                        <a href="movie_actor_edit.php?movieid=<?= $movie_id ;?>" onclick="return confirm('Do you agree to edit?')"> แก้ไข Actor</a>
                        <a href="movie_role_edit.php?movieid=<?= $movie_id ;?>" onclick="return confirm('Do you agree to edit?')"> แก้ไข Role</a>
                        <a href="movie_writer_edit.php?movieid=<?= $movie_id ;?>" onclick="return confirm('Do you agree to edit?')"> แก้ไข Writer</a>
                        <a href="movie_director_edit.php?movieid=<?= $movie_id ;?>" onclick="return confirm('Do you agree to edit?')"> แก้ไข Director</a>
                        <a href="movie_production_edit.php?movieid=<?= $movie_id ;?>" onclick="return confirm('Do you agree to edit?')"> แก้ไข Production</a>
                        <br>
                            <form action="" method="POST">

                            <br>
                            <br>
                            Title :&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
                            Plot : &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; 
                            Runtime : &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;  
                            Release Date : &emsp;&emsp;&emsp;&emsp;&nbsp;
                            Income : &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;  <br>
                            
                            <input type="text" name="edit_movie_title" placeholder="Title" value="<?= $select_title ?>" required>&emsp;
                            
                            <input type="text" name="edit_movie_plot" placeholder="Plot" value="<?= $select_plot ?>" >&emsp;
                            
                            <input type="number" name="edit_movie_runtime" placeholder="Runtime" value="<?= $select_runtime ?>"  required>&emsp;
                            
                            <input type="date" name="edit_movie_release_date" value="<?= $select_release_date ?>" required>&emsp;
                            
                            <input type="number" name="edit_movie_income" placeholder="Income" value="<?= $select_income ?>" required>&emsp;
                            <br>
                            <br>
                            Rate : &nbsp;

                            

                        <!------------------------------------------------ ตาราง rating --------------------------------------------------------------->

                            <?php
                                $sql = 'SELECT * FROM mm_rating';
                                $result = $conn->query($sql);

                                                //echo $conn->error;

                                                if ($result->num_rows > 0) {
                                                // output data of each row
                                                    while($row = $result->fetch_assoc()) {                   
                                ?>

                            

                                <input type="radio" name="edit_rate_id" value="<?=  $row['rate_id'] ;?>" <?php 
                                if($row['rate_id'] == $select_rate_id){
                                    echo 'checked'; } ?> 
                                required >  
                            <?=' ' .  $row['rate_name']  . ' '; ?> 



                        <?php 
                                }
                            } else {
                            echo "No results";
                            }
                            $conn->close();
                            ?>

                        <br>

                        <input type="hidden" name="edit_movie_id" value="<?= $movie_id ?>"required>

                        <br>
                        <button type="sunmit" onclick="return confirm('Do you agree to edit?')">
                            SUBMIT
                        </button>

                        </form>
                        <br>
                        <!-------------------------------------------------------------------------------------------------------------------------------->
                        <a href="list-movies.php">กลับสู้หน้าหลัก</a>

                        <?php

                        // }else{
                        // echo 'คุณไม่สามารถเข้าในหน้านี้ได้';
                        // }
                        // }else{
                        // echo 'คุณไม่ได้ Login';
                        // }

                        ?>

                        </div>
                    </div>

                </div>
            </main>
            
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>