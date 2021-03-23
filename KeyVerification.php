<?php
session_start();
error_reporting(E_ERROR);
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MREC </title>
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
                <a class="navbar-brand" href="./">MREC</a>
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
   
   <?php
if(!isset($_POST["submit"])){ //To enter Key
    $conn = new mysqli("localhost", "root", "", "authority");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT hod_name,hod_number,hod_department FROM hod_login_info";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<div class='container'>";
        while($row = $result->fetch_assoc()) {
            $department=$row["hod_department"];
            $hod_name=$row["hod_name"];
            $phone=$row["hod_number"];
            echo "<div class='alert alert-info' style='display:none' id='$department'>";
            echo "<strong>Get Key From</strong> $department HOD: $hod_name Phone Number:$phone";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<h4>HOD data Missing </h4>";
        exit();
    }
?>
     <!-- Header-->

 <div class="container" id="keyver">
  <form method="POST" onsubmit="return validate()" >
    <h5>Key Verification :</h5><br>
  <label for="department">Select Department:</label>
    <select class="form-control" id="department" name="department" onchange="changeDisplay()">
        <option selected value="0">Select Department</option>
        <option value="CE">Civil Engineering</option>
        <option value="EEE">Electronics and Electrical Engineering(EEE)</option>
        <option value="MECH">Mechanical Engineering</option>
        <option value="ECE">Electronics and Communication Engineering(ECE)</option>
        <option value="CSE">Computer Science and Engineering</option>
        <option value="IT">Information Technology</option>
        <!--<option value="HS">Humanities &amp; Sciences</option>-->
        <option value="MBA">Masters of Business Adminstration</option>
        <option value="MINING">Mining Engineering</option>
    </select>
    <div class="form-group">
    <label for="staff_key">Staff Key:</label>
        <input type="text" class="form-control" id="staff_key" name="staff_key" placeholder="Enter Key">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Verify Key</button>
    </form>
    </div>

        


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
<?php
}
if(isset($_POST["submit"])){//To show the registration page
    $conn = new mysqli("localhost", "root", "", "authority");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $department=$_POST["department"];
    $sql = "SELECT staff_key FROM hod_login_info where `hod_department`='$department' limit 1";
    $result=$conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<div class='container'>";
        while($row = $result->fetch_assoc()) {
            $staff_key=$row["staff_key"];
        }
        echo "</div>";
    } else {
        echo "<h4>Staff key is Missing </h4>";
        exit();
    }
    if($staff_key!=$_POST["staff_key"]){
        echo "<div class='container'><h4>Invalid Key<h4>";
        echo "<p>Please enter key once again <a href='KeyVerification.php'>here.<a></p>";
    }
    else{
        $_SESSION["staff_key"]="true";
        header('Location: StaffRegistration.php');
    }
}
?>
<script>
function changeDisplay(){
    var div_id_to_be_shown=document.getElementById("department").value;
    if(document.getElementById("CE"))
    document.getElementById("CE").style.display="none";
    if(document.getElementById("EEE"))
    document.getElementById("EEE").style.display="none";
    if(document.getElementById("MECH"))
    document.getElementById("MECH").style.display="none";
    if(document.getElementById("ECE"))
    document.getElementById("ECE").style.display="none";
    if(document.getElementById("IT"))
    document.getElementById("IT").style.display="none";
    if(document.getElementById("MBA"))
    document.getElementById("MBA").style.display="none";
    if(document.getElementById("MINING"))
    document.getElementById("MINING").style.display="none";
    if(document.getElementById("CSE"))
    document.getElementById("CSE").style.display="none";
    if(div_id_to_be_shown!=0){
        if(document.getElementById(div_id_to_be_shown))
        document.getElementById(div_id_to_be_shown).style.display="block";
    }
}
function validate(){
    var department=document.getElementById("department").value;
    if(department=="0"){
        window.alert("Please select a department");
        return false;
    }
    return true;
}
</script>

</body>

</html>
