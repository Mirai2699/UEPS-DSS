<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>University Events Web Portal </title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="resources/assets/plugins/bootstrap3/css/bootstrap.min.css" rel="stylesheet" />
	<link href="resources/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="resources/assets/plugins/animate/animate.min.css" rel="stylesheet" />
	<link href="resources/assets/css/one-page-parallax/style.min.css" rel="stylesheet" />
	<link href="resources/assets/css/one-page-parallax/style-responsive.min.css" rel="stylesheet" />
	<link href="resources/assets/css/one-page-parallax/theme/default.css" id="theme" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="resources/ssets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body data-spy="scroll" data-target="#header-navbar" data-offset="51">
    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <div class="panel" style="background-color: #262626">
           <a href="index.php" class="btn btn-success" style="margin: 5px">Go Back to Portal</a>
           <!-- begin container -->
           <center>
               <div class="panel" style="padding: 1px; background-color: #eeeeee; margin: 10px"></div>
               <div class="container" data-animation="true" data-animation-type="fadeInLeft" >
                    <h2 class="content-title" style="color: white">Student Account Registration</h2>
               </div>
           </center>
        </div>
       <!-- end #quote -->
        
       <br>
      
        
        <!-- begin #pricing -->
        <form action="" method="POST">
            <div class="col-md-10" style="background-color: #eeeeee; margin-left: 7%; border-radius:20px">
                <div class="row" style="margin-top: 20px">
                    <div class="col-md-4">
                        <label><b>Last Name</b></label>
                        <input type="text" class="form-control" name="stud_lname" />
                    </div>
                    <div class="col-md-4">
                        <label><b>First Name</b></label>
                        <input type="text" class="form-control" name="stud_fname" />
                    </div>
                    <div class="col-md-4">
                        <label><b>Middle Name <small>(Optional)</small></b></label>
                        <input type="text" class="form-control" name="stud_mname" />
                    </div>
                </div>
                 <div class="row" style="margin-top: 20px">
                    <div class="col-md-2">
                        <label><b>Gender</b></label>
                        <select class="form-control" name="stud_" />
                            <option value="" selected disabled> -- Select Gender -- </option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label><b>Birthdate</b></label>
                        <input type="date" class="form-control" name="stud_bday" />
                    </div>
                    <div class="col-md-3">
                        <label><b>City Base Location:</b></label>
                        <select class="form-control" name="stud_city">
                            <option value=""> -- Select City -- </option>
                            <?php
                                include("db_con.php");
                                $get_city = mysqli_query($connection, "SELECT * FROM `r_city` WHERE city_active_stat = 'Active'");
                                while($row_city = mysqli_fetch_assoc($get_city))
                                {
                                    $city_ID = $row_city['city_ID'];
                                    $city_name = $row_city['city_name'];

                            ?>
                            <option value="<?php echo $city_ID?>"><?php echo $city_name?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label><b>University:</b></label>
                        <select class="form-control" name="stud_uni">
                            <option value=""> -- Select University -- </option>
                            <?php
                                include("db_con.php");
                                $get_uni = mysqli_query($connection, "SELECT * FROM `r_university` AS UNI
                                                                              INNER JOIN `r_city` AS CITY 
                                                                              ON UNI.uni_city = CITY.city_ID
                                                                              WHERE uni_active_stat = 'Active'");
                                while($row_uni = mysqli_fetch_assoc($get_uni))
                                {
                                    $uni_ID = $row_uni['uni_ID'];
                                    $uni_name = $row_uni['uni_name'];
                                    $uni_city = $row_uni['city_name'];

                            ?>
                            <option value="<?php echo $uni_ID?>"><?php echo $uni_name.'   &nbsp; ('.$uni_city.')'?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row" style="margin-top: 30px"></div>
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-12">
                        <button class="btn btn-success" name="save_stud_details">
                            <i class="fa fa-send"></i>&nbsp;
                            Submit Details
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <!-- end #pricing -->
        
      
        

       

    </div>
    <!-- end #page-container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="resources/assets/plugins/jquery/jquery-3.2.1.min.js"></script>
	<script src="resources/assets/plugins/bootstrap3/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="resources/assets/plugins/js-cookie/js.cookie.js"></script>
	<script src="resources/assets/plugins/scrollMonitor/scrollMonitor.js"></script>
	<script src="resources/assets/js/one-page-parallax/apps.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<script>    
	    $(document).ready(function() {
	        App.init();
	    });
	</script>
</body>
</html>
