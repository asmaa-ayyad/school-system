
<?php

session_start();
include_once('DB_Connection.php');


if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    $c_username = $_COOKIE['username'];
    $c_pass = $_COOKIE['password'];
} else {
    $c_username = $c_pass = "";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['Password']);


    function redirect_to_login($error) {
        header("location: login.php?error=" . $error);
        exit();
    }


    if (empty($username) || empty($password)) {
        
        redirect_to_login("Please enter a username and password");
      
    }


    $query = "SELECT * FROM user WHERE user_name = '" . $username . "' AND password ='" . $password . "'";
    $result = mysqli_query($connecction, $query);

     if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $role = $row["role_id"];

            if ($role == 1) {
                $_SESSION["role"] = "admin";
                if (isset($_POST["remember_me"])) {
                    setcookie('username', $username, time() + 86400 * 30);
                    setcookie('password', $password, time() + 86400 * 30);
                } 
        
                $_SESSION["a_is_login"] = true;
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;
                header("location: dash.php");
                exit();
            } elseif ($role == 2) {
                $_SESSION["role"] = "teacher";
                if (isset($_POST["remember_me"])) {
                    setcookie('username', $username, time() + 86400 * 30);
                    setcookie('password', $password, time() + 86400 * 30);
                } 
                
                $_SESSION["t_is_login"] = true;
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;
                header("location: viewTeacher.php");
                exit();
            } elseif ($role == 3) {
                $_SESSION["role"] = "student";
                if (isset($_POST["remember_me"])) {
                    setcookie('username', $username, time() + 86400 * 30);
                    setcookie('password', $password, time() + 86400 * 30);
                } 
                
                $_SESSION["s_is_login"] = true;
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;
                header("location: viewstudent.php");
                exit();
            }
        }
    
    redirect_to_login("Invalid username or password");

}

mysqli_close($connecction);

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


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">

                    <form action="" method="post">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>MOODLE</h3>
                            </a>
                            <h3>Sign In</h3>
                        </div>
                        
                        
                        <?php if (isset($_GET['error'])) { ?>
    	             	<div class="alert alert-danger" role="alert">
			             <?=$_GET['error']?>
			            </div>
			            <?php } ?>

                       
                        <div class="form-floating mb-3">

                            <input type="text" class="form-control" id="floatingInput" placeholder="username" name="username" value="<?php echo $c_username ;?>">
                            <label for="floatingInput">UserName</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="Password" value="<?php echo $c_pass ;?>">
                            <label for="floatingPassword">Password</label>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember_me">
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div>
                            <a href="">Forgot Password</a>
                        </div>

                        <button type="submit" name = "submit" class="btn btn-primary py-3 w-100 mb-4" >Sign In</button>
                        <p class="text-center mb-0">Don't have an Account? <a href="">Sign Up</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
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









   




