<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Log In | MUPDS</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="resources/admin/assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<link href="resources/admin/assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
	<link href="resources/admin/assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />
	<link href="resources/admin/assets/plugins/animate/animate.min.css" rel="stylesheet" />
	<link href="resources/admin/assets/css/default/style.min.css" rel="stylesheet" />
	<link href="resources/admin/assets/css/default/style-responsive.min.css" rel="stylesheet" />
	<link href="resources/admin/assets/css/default/theme/default.css" rel="stylesheet" id="theme" />
     <link href="resources/images/land-icons/map.png" rel="icon"  />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="resources/admin/assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<div class="login-cover">
	    <div class="login-cover-image" style="background-image: url(resources/images/map-location.jpg)" data-id="login-cover-image"></div>
	    <div class="login-cover-bg"></div>
	</div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login login-v2" data-pageload-addclass="animated fadeIn" style="background-color: white">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand" style="color: black; text-align: center">
                  
                    <img src="resources/images/land-icons/map.png" style="width:35%; margin-top: 20px" alt=""><br>
                    <b style="font-size: 46px">MapRise</b>
                    <small style="color: black; font-size: 15px">Urban Planning and Development System</small>
                </div>
                <div class="icon">
                    <i class="fa fa-lock"></i>
                </div>
            </div>
            <!-- end brand -->
            <!-- begin login-content -->
            <div class="login-content">
                <form name="loginform" id="loginform" method="POST" class="margin-bottom-0">
                    <div class="form-group m-b-15">
                        <input name="username" type="text" style="background-color: white; border: 1px solid #6e6e6e; color: #262626" class="form-control form-control-lg" placeholder="Username" required />
                    </div>
                    <div class="form-group m-b-15">
                        <input name="password" type="password" style="background-color: white; border: 1px solid #6e6e6e; color: #262626" class="form-control form-control-lg" placeholder="Password" required />
                    </div>
                   <!--  <div class="checkbox checkbox-css m-b-30">
                        <input type="checkbox" id="remember_me_checkbox" value="" />
                        <label for="remember_me_checkbox">
                            Remember Me
                        </label>
                    </div> -->
                    <?php
                          include("db_con.php");
                          
                          if(isset($_POST['login']))
                          {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            
                            date_default_timezone_set("Asia/Manila"); 
                            $timein = date('H:i:s');
                            $datein = date('Y-m-d');
                            
                            $query = "SELECT * FROM t_user_accounts WHERE acc_username = '".$username."' and acc_password = '".$password."'";

                            $result = mysqli_query($connection,$query) or die(mysqli_error());
                            if (mysqli_num_rows($result) > 0)
                            {
                             while($row = mysqli_fetch_assoc($result))
                               {
                                 $user_id = $row['acc_ID'];
                                 $UserName = $row['acc_username'];
                                 $userrole = $row['acc_user_role'];
                                 $status = $row['acc_active_flag'];
                                // $email= $row['acc_email'];

                               }
                              if($status == "Active")
                              {
                                 session_start();
                                 $_SESSION['Logged_In'] = $UserName;
                                 $_SESSION['UserRole'] = $userrole;
                                 $_SESSION['UserID'] = $user_id;
                                 //$_SESSION['email'] = $email;
                                if($_SESSION['UserRole'] == "1")
                                {
                                  $header ='Location:Web/admin/views/index.php';
                                  header($header);
                                }
                                else if($_SESSION['UserRole'] == "2")
                                {
                                  
                                  $header ='Location:Web/MPDC/views/index.php';
                                  header($header);
                                } 
                                else if($_SESSION['UserRole'] == "3")
                                {
                                  
                                  $header ='Location:Web/Zoning_Officer/views/index.php';
                                  header($header);
                                } 
                                else if($_SESSION['UserRole'] == "4")
                                {
                                  
                                  $header ='Location:Web/Mapping_Expert/views/index.php';
                                  header($header);
                                } 
                                else if($_SESSION['UserRole'] == "5")
                                {
                                  
                                  $header ='Location:Web/PDO/views/index.php';
                                  header($header);
                                } 
                                $ins_query = "INSERT INTO t_users_log (log_userID, log_usertype, log_datestamp, log_timestamp) 
                                              VALUES('$user_id', '$userrole', '$datein', '$timein')";
                                mysqli_query($connection,$ins_query);
                              }
                              else if($status == "Disabled") 
                              {
                                echo  "
                                <center>
                                  <label style='color:darkviolet; font-weight: 10px; font-size: 15px'>
                                    Your Account has been Disabled; <br>Sorry, you cannot proceed to your account.
                                  </label>
                                </center>";  
                              }
                           
                          }
                          else
                          {
                                echo  "
                                <center>
                                <label style='color:red; font-weight: 10px; font-size: 15px'>Incorrect Username or Password!</label>
                                </center>";         
                          }
                         }
                    ?>
                    <div class="login-buttons" style="margin-bottom: 30px">
                       <button name="login" type="submit" class="btn btn-success btn-block btn-lg">Log In</button> 
                       <!-- <a href="Web/Admin/views/index.php" class="btn btn-danger btn-block btn-lg">Direct Log</a> -->
                    </div>
                    <hr>
                    <p class="text-center text-grey-darker" style="font-size: 10px">
                        &copy; SRG 7TH Generation All Right Reserved 2019
                    </p>
                </form>
            </div>
            <!-- end login-content -->
        </div>
        <!-- end login -->
        
       
       
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="resources/admin/assets/plugins/jquery/jquery-3.2.1.min.js"></script>
	<script src="resources/admin/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="resources/admin/assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
	<!--[if lt IE 9]>
		<script src="../assets/crossbrowserjs/html5shiv.js"></script>
		<script src="../assets/crossbrowserjs/respond.min.js"></script>
		<script src="../assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="resources/admin/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="resources/admin/assets/plugins/js-cookie/js.cookie.js"></script>
	<script src="resources/admin/assets/js/theme/default.min.js"></script>
	<script src="resources/admin/assets/js/apps.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="resources/admin/assets/js/demo/login-v2.demo.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
			LoginV2.init();
		});
	</script>
</body>
</html>
