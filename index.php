Skip to content
Search or jump to…

Pull requests
Issues
Marketplace
Explore
 
@krischai123 
espadaulqiorrano4
/
movie_here
1
00
Code
Issues
Pull requests
Actions
Projects
Wiki
Security
Insights
movie_here/index.php
@espadaulqiorrano4
espadaulqiorrano4 Add files via upload
Latest commit 06e8f62 1 hour ago
 History
 1 contributor
269 lines (217 sloc)  14.8 KB
  
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit list</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand-lg navbar-light bg-light">
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <a class="navbar-brand" href="#"><a class="navbar-brand" href="index.php"><img src="../../image/Mlogo.png" img-responsive" alt="Cinque Terre" width="50" height="50"></a></a>
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
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img type="button" src="../../image/sign-up.png" img-responsive" alt="Cinque Terre" width="40" height="40" data-toggle="modal" data-target="#loginModal"> </a>
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
                            <a class="nav-link" href="edit-movies/list-movies.php"><i class="fas fa-caret-square-right"></i>&nbsp;&nbsp;Movies</a>
                            <a class="nav-link" href="edit-genres/list-genres.php"><i class="fas fa-caret-square-right"></i>&nbsp;&nbsp;Genres</a>
                            <a class="nav-link" href="edit-actors/list-actors.php"><i class="fas fa-caret-square-right"></i>&nbsp;&nbsp;Actors</a>
                            <a class="nav-link" href="edit-rate/edit-rate-list.php"><i class="fas fa-caret-square-right"></i>&nbsp;&nbsp;RATE</a>
                            <a class="nav-link" href="edit-directors/list-directors.php"><i class="fas fa-caret-square-right"></i>&nbsp;&nbsp;Directors</a>
                            <a class="nav-link" href="edit-writers/list-writers.php"><i class="fas fa-caret-square-right"></i>&nbsp;&nbsp;Writers</a>
                            <a class="nav-link" href="edit-productions/list-productions.php"><i class="fas fa-caret-square-right"></i>&nbsp;&nbsp;Productions</a>
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
                    <h1 class="mt-4">Hello Admin : NAME</h1>
                    <!-- เว้นช่องข้างบน -->
                    <div class="mt-4"></div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-edit"></i>
                            Edit List
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6 col-md-6">
                                    <div class="card bg-dark text-white mb-4">
                                        <div class="card-body">MOVIES</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="edit-movies/list-movies.php">Edit</a>
                                            <div class="small text-white"><i class="fas fa-edit"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="card bg-secondary text-white mb-4">
                                        <div class="card-body">GENRES</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="edit-genres/list-genres.php">Edit</a>
                                            <div class="small text-white"><i class="fas fa-edit"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">ACTORS</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="edit-actors/list-actors.php">Edit</a>
                                            <div class="small text-white"><i class="fas fa-edit"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="card bg-info text-white mb-4">
                                        <div class="card-body">RATE</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="edit-rate/edit-rate-list.php">Edit</a>
                                            <div class="small text-white"><i class="fas fa-edit"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="card bg-danger text-white mb-4">
                                        <div class="card-body">DIRECTORS</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="edit-directors/list-directors.php">Edit</a>
                                            <div class="small text-white"><i class="fas fa-edit"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="card bg-warning text-white mb-4">
                                        <div class="card-body">WRITERS</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="edit-writers/list-writers.php">Edit</a>
                                            <div class="small text-white"><i class="fas fa-edit"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body">PRODUCTIONS</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="edit-productions/list-productions.php">Edit</a>
                                            <div class="small text-white"><i class="fas fa-edit"></i></div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; MH 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
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