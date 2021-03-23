<?php
session_start();
error_reporting(E_ERROR);
if(isset($_POST["submit"])){
    $conn = mysqli_connect("localhost", "root", "", "authority") or die("mysql_error()");
    $sql = "SELECT * FROM `staff_login_info` WHERE `staff_email`='".$_POST["username"]."' limit 1;";
    $result = $conn->query($sql);
    if($result->num_rows>0){
      $row = $result->fetch_assoc();
      if(strcasecmp($row["staff_password"],md5($_POST["password"]))==0){
           $_SESSION["staff_id"]=$row["staff_id"];
           $_SESSION["staff_name"]=$row["staff_name"];
           header('Location: StaffHome.php'); 
      }
      else{
       echo "<script>window.alert('Passwords Mismatch ');</script>";
      }
    }
    else {
        echo "<script>window.alert('No user exists with that email id');</script>";
    }
$conn->close();
}
?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MREC | Staff Login </title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>

    <div class="container-fluid " id="jumbotroncon">
             <div class="jumbotron container-fluid text-center" id="jum">
                <div id="jumleft">
                    <img src="logo" alt="logo">
                </div>
                <div id="nba">
                    <img src="nba" alt="nba">
                </div>
                <div id="naac">
                    <img src="naac" alt="nba">
                </div>
                
                <div >
                    <h2 class="display"><strong>MALLAREDDY ENGINNERING COLLEGE (AUTONOMOUS)</strong></h2>
                  <h6>( An Autonomous institution approved by UGC and Affiliated to JNTUH Hyderabad,</h6>
                  <h6>        Accredited by NAAC with 'A' Grade,Accredited by NBA,    </h6>
                  <h6> Maisammaguda, dhulapally,(Post, via Kompally),Secunderabad-500100 Ph:040-64634234)</h6>
                </div>
                  
             </div>
        </div>
    

    <div>
        <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">MREC(A)</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="Principallogin.php">Principal Login </a>
                    </li>
                    <li class="active">
                        <a href="HODLogin.php">HOD Login</a>
                    </li>
                    <li class="active">
                        <a href="StaffLogin.php">Staff Login</a>
                    </li>
                    

                    </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                       
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

<div class="container" id="slgp">
  <h4><strong>Staff Login</strong></h4>
  <form method="POST" >
    <div class="form-group">
      <label for="usr">Username :</label>
      <input type="email" class="form-control" id="usr" name="username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="password">
    </div>
    <button type="submit" class="btn btn-primary" name="submit" id="slgsub">LOGIN</button><br><br>
     <a href="forgotpassword.php?authority=staff">    Forgot password? </a><br>
     <a href="StaffRegistration.php" >Dont't have an Account? <strong>Signup Now</strong></a>
  </form>
</div>
<br>

    </div>
</div><!-- .content -->


    </div><!-- /#right-panel -->

    </div>
    <!-- Left Panel -->

    
    <!-- Right Panel -->


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>
