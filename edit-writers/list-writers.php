<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Writers</title>
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
        require('../Back_end/connect.php');
        require('../Back_end/sql_movie_view.php');
    ?>
    <nav class="sb-topnav navbar navbar-expand-lg navbar-light bg-light">
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <a class="navbar-brand" href="#"><a class="navbar-brand" href="../index.php"><img src="../../../image/Mlogo.png"
                    img-responsive" alt="Cinque Terre" width="50" height="50"></a></a>


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
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"> <img type="button" src="../../../image/sign-up.png"
                        img-responsive" alt="Cinque Terre" width="40" height="40" data-toggle="modal"
                        data-target="#loginModal"> </a>

                <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="userDropdown">

                    <!-- <a class="dropdown-item" href="login.html"><i class="fas fa-sign-in-alt"> </i>&nbsp;&nbsp;Login</a>
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="register.html"><i
                            class="fas fa-user-plus"></i>&nbsp;&nbsp;register</a>
                    <div class="dropdown-divider"></div>

                     <a class="dropdown-item" href="password.html"><i class="fas fa-columns"></i>&nbsp;&nbsp;Forgot Password</a>
                    <div class="dropdown-divider"></div> -->

                    <a class="dropdown-item" href="account.html"><i class="far fa-id-card"></i>&nbsp;&nbsp;Account</a>
                    <div class="dropdown-divider"></div>

                   

                    <a class="dropdown-item" href="setting.html"><i class="fas fa-cog"></i>&nbsp;&nbsp;Setting</a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.html"><i
                            class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a>
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
                            <a class="nav-link" href="../edit-productions/list-productions.php"><i class="fas fa-caret-square-right"></i>&nbsp;&nbsp;Productions</a>
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
                            Edit Writers
                        </div>
                        <div class="card-body">

                        <?php
                        $insert_firstname = '';
                        $insert_birthplace = '';
                        $insert_birthdate = '';

                     if($_GET){
                    $insert_firstname = $_GET['input_fn'];
                    $insert_birthplace = $_GET['input_bp'];
                    $insert_birthdate = $_GET['input_bd'];

                    $sql_insert = 'INSERT INTO mm_writer(writer_name,writer_birthplace, writer_birthdate) 
                    VALUES 
                    ("'. $insert_firstname .'","'. $insert_birthplace .'","'. $insert_birthdate .'")';
                    
                    if($conn->query($sql_insert) === TRUE){
                        echo 'SUCCESS<br>';

                        echo '<br> <a href="list-writers.php">Refesh</a> <br>' ;
                    }else{
                        echo 'ERROR'. $sql_insert . "<br>" . $conn->error; 
                    }
                    }
                ?>
                <br>
                <form action="" method="GET">
                    เพิ่ม Writer:
                    <br>
                    firstname : 
                    <input type="text" name="input_fn" placeholder="First Name" required>&emsp;
                    Birth Place :
                    <input type="text" name="input_bp" placeholder="Birth Place" required>&emsp;
                    Brith Date :
                    <input type="date" name="input_bd" required>&emsp;

                    
                    <button type="sunmit" onclick="return confirm('Do you agree to edit?')">
                    SUBMIT
                    </button>
                </form>

                <br>
                    </tbody>
                </table>


                            <div class="row">
                            <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <!-- <table border="5" bordercolor="black" cellspacing="5" cellpadding="10"> -->
    <!-- cellspacing คือระยะห่างของตาราง   -->
        <thead>

          <tr>

            <th> Writer ID </th>
            <th> Writer Name </th>
            <th> Writer Birth Place </th>
            <th> Writer Birth Date </th>
            <th> Option </th>

          </tr>

        </thead>
    <tbody>


      <?php
       

        $sql = 'SELECT * FROM mm_writer';
        $result = $conn->query($sql);

                          //echo $conn->error;

                          if ($result->num_rows > 0) {
                          // output data of each row
                              while($row = $result->fetch_assoc()) {                   
        ?>
    <tbody>

      <tr>
        <td> <?= $row['writer_id'] ; ?> </td>
        <td> <?=  $row['writer_name']?> </td>
        <td> <?= $row['writer_birthplace'] ; ?> </td>
        <td> <?= $row['writer_birthdate'] ; ?> </td>

        <td>

          <a href="writer_edit.php?writerid=<?= $row['writer_id']?>" onclick="return confirm('Do you agree to edit?')"> แก้ไข</a> |
          <a href="writer_delete.php?writerid=<?= $row['writer_id']?>" onclick="return confirm('Do you agree to delete?')"> ลบ</a>

        </td>
      </tr>

      <?php 
              }
            } else {
            echo "No results";
            }
            $conn->close();
          ?>

                            </div>

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