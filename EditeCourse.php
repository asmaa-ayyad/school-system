
<?php
require_once('auth_check.php');
check_auth_with_role("admin");
include_once('DB_Connection.php');
  $Err = " "; $result=" "; 
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query = "SELECT * FROM courses WHERE course_id = $id ";
            $result = mysqli_query($connecction, $query); 
            if(mysqli_num_rows($result)>0){
               $row = mysqli_fetch_assoc($result);
            }

    
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
      
                            function test_input($data)
                            {
                              $data = trim($data);
                              $data = stripslashes($data);
                              $data = htmlspecialchars($data);
                              return $data;
                            }
                        
                            if (empty($_POST["course_number"])|| empty($_POST["course_name"])|| empty($_POST["teacher_id"])) {
                        
                                $Err = "* please fill required field";
                        
                              } else {
                                $c_number = test_input($_POST["course_number"]);
                                $c_name = test_input($_POST["course_name"]);
                                $teacher_id = test_input($_POST["teacher_id"]); 
                            
                            
                                $query = " UPDATE courses SET course_number = '$c_number', course_name=' $c_name',
                                teacher_id = '$teacher_id' WHERE course_id = $id";
                            
                                $result = mysqli_query($connecction,$query);

                              



  }









      }


    }



                    
     
        
    ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/custom_style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>MOODLE</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>

                <div class="navbar-nav w-100">
                    <a href="dash.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="Admin_ViewTeachers.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Teachers</a>
                    <a href="Students.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Students</a>
                    <a href="Cources.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Courses</a>
<!-- 
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item active">Blank Page</a>
                        </div>
                    </div> -->
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">John Doe</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Blank Start /////////////////////////////////////////////////////////////////////////////////-->

            <!-- Sale & Revenue Start -->

            <!-- Sale & Revenue End -->

             <!-- Recent Sales Start -->
             <div class="container-fluid pt-4 px-4">
            <?php
           
            if(isset($_POST["submit"])){
              
if (isset($result) && $result){
    
    echo '
        <div class="row">
            <div class="col-12">
                <div id="alertMsg" class="alert alert-success">
                   تمت العملية بنجاح
                </div>
            </div>
        </div>';
} else {
    echo '
        <div class="row">
            <div class="col-12">
                <div id="alertMsg" class="alert alert-danger">
                   فشلت العملية
                </div>
            </div>
        </div>';
}}
?>



                <div class="bg-light text-center rounded p-4">
                    
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Edite Course</h6>                        <span><?php echo $Err; ?></span>

                        <!-- <a href="">Show All</a>-->

                    </div>



                    <form action="<?php $_SERVER['PHP_SELF'] . '?id=' . $_GET['id'] ?>" method="post">






                        <div class="row mb-3">
                            <label for="inputname3" class="col-sm-3 col-form-label text-end fw-bold">Number:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-lg" id="inputname3" name="course_number"
                                value="<?= ((isset($row)) ? $row['course_number']:'') ?>"

                                
                                >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputname3" class="col-sm-3 col-form-label text-end fw-bold"> Name:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-lg" id="inputname3" name="course_name"
                                value="<?= ((isset($row)) ? $row['course_name']:'') ?>"

                                >
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="inputConfirmPassword" class="col-sm-3 col-form-label text-end fw-bold">Teacher:</label>
                            <div class="col-sm-9">
                      




                            <?php
                    echo "<select  class = 'form-select form-select-lg mb-3' name='teacher_id' class='select' >";

                    $selectbox_value = $row['teacher_id'];
                    $select = "SELECT first_name FROM teachers where teacher_id = $selectbox_value";
                    $result2 = mysqli_query($connecction, $select);
                    $r = mysqli_fetch_assoc($result2);
                    echo "<option  value='$row[teacher_id]'>----$r[first_name]-----</option>";
                    $quary = "SELECT first_name,teacher_id FROM  teachers";
                    $result = mysqli_query($connecction, $quary);
                    if (mysqli_num_rows($result) > 0) {
                        while ($rows = mysqli_fetch_assoc($result)) {
                            echo "<option value=' $rows[teacher_id]'>$rows[first_name]</option>";
                        }
                    }
                    echo "</select>";
         
?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">Save</button>
                            </div>
                        </div>
                    </form>

                    <!-- Recent Sales End -->
                    <!-- Blank End ///////////////////////////////////////////////////////////////-->



                    <!-- Footer Start -->

                    <!-- Footer End -->
                </div>
                <!-- Content End -->


                <!-- Back to Top -->
                <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
            </div>

            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="lib/chart/chart.min.js"></script>
            <script src="lib/easing/easing.min.js"></script>
            <script src="lib/waypoints/waypoints.min.js"></script>
            <script src="lib/owlcarousel/owl.carousel.min.js"></script>
            <script src="lib/tempusdominus/js/moment.min.js"></script>
            <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
            <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

            <!-- Template Javascript -->
            <script src="js/main.js"></script>
</body>

</html>

<?php

mysqli_close($connecction);
?>