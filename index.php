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

    <link href="resources/images/event.png" id="theme" rel="icon" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="resources/ssets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body data-spy="scroll" data-target="#header-navbar" data-offset="51">
    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <!-- begin #header -->
        <div id="header" class="header navbar navbar-transparent navbar-fixed-top">
            <!-- begin container -->
            <div class="container">
                <!-- begin navbar-header -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                  <!--   <a href="index.html" class="navbar-brand">
                       <img src="resources/images/event.png"/>
                       <br>
                        <span class="brand-text">
                            <span class="text-theme">University Events</span> Web Portal
                        </span>
                    </a> -->
                </div>
                <!-- end navbar-header -->
                <!-- begin navbar-collapse -->
                <div class="collapse navbar-collapse" id="header-navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active dropdown">
                            <a href="#home" data-click="scroll-to-target" data-toggle="dropdown">Home</a>
                        </li>
                        <li><a href="#client" data-click="scroll-to-target">On-Going Events</a></li>
                        <li><a href="#pricing" data-click="scroll-to-target">Trending Upcoming Events</a></li>
                        <li><a href="#contact" data-click="scroll-to-target">Other Upcoming Events</a></li>
                        <li><a href="#footer" data-click="scroll-to-target">About Us</a></li>
                        <li><a href="login.php" data-click="scroll-to-target"><i class="fa fa-key"></i> Admin Access</a></li>
                    </ul>
                </div>
                <!-- end navbar-collapse -->
            </div>
            <!-- end container -->
        </div>
        <!-- end #header -->
        
        <!-- begin #home -->
        <div id="home" class="content has-bg home">
            <!-- begin content-bg -->
            <div class="content-bg">
                <img src="resources/images/concert.jpg" alt="Home" />
            </div>
            <!-- end content-bg -->
            <!-- begin container -->
            <div class="container home-content">
                <h1>University Events Web Portal</h1>
                <h3>An events web portal for everyone across Metro Manila</h3>
                <p style="color: white">
                    Do you want to be always updated to the interesting events near you? Register Now!<br>
                    Already have an account? Sign in to get the latest updates.
                </p>
                <a href="student_register.php" class="btn btn-theme">Register Now</a>
                <a href="#" class="btn btn-outline">Sign In</a><br />
                <br />
            </div>
            <!-- end container -->
        </div>
        <!-- end #home -->
        
        
       <br>
        <!-- begin #client -->
        <div id="client" class="content has-bg bg-green" data-scrollview="true">
            <!-- begin content-bg -->
            <div class="content-bg">
                <img src="../assets/img/bg/bg-client.jpg" alt="Client" />
            </div>
            <!-- end content-bg -->

            <!-- begin container -->
            <div class="container" data-animation="true" data-animation-type="fadeInUp">
                <h2 class="content-title">On-Going Events</h2>
                <!-- begin carousel -->
                <div class="carousel testimonials slide" data-ride="carousel" id="testimonials">
                    <!-- begin carousel-inner -->
                    <div class="carousel-inner text-center">
                        <!-- begin item -->
                        <div class="item active">
                            <div class="col-md-8" style="background-color: white; margin-left:15%">
                                <img src="resources/images/sampleevent1.jpg" style="width: 90%; margin-top: 10px" />
                                <hr>
                                <div class="panel">
                                    <p style="color: black; text-align: center; font-size: 30px">
                                      On-Going Events
                                    </p>
                                </div>
                            </div>

                        </div>
                        <!-- end item -->
                        <?php 
                            $curdate = date('Y-m-d');
                            include('db_con.php');
                            $get_ongoing = mysqli_query($connection,"SELECT * FROM `t_events` AS EVE
                                                                             INNER JOIN `r_university` AS UNI 
                                                                             ON EVE.ev_by_university = UNI.uni_ID
                                                                             INNER JOIN `r_city` AS CTY 
                                                                             ON EVE.ev_city = CTY.city_ID
                                                                             INNER JOIN `r_event_type` AS EVTYPE 
                                                                             ON EVE.ev_typeID = EVTYPE.evt_ID
                                                                          WHERE EVE.ev_date_start = '$curdate'");
                            while($row = mysqli_fetch_assoc($get_ongoing))
                            {
                                $ev_name = $row['ev_name'];
                                $ev_desc = $row['ev_desc'];
                                $ev_date_start = new datetime($row['ev_date_start']);
                                $nf_ev_start_date = $ev_date_start->format('F d, Y');
                                $ev_venue = $row['ev_venue'];
                                $ev_city = $row['city_name'];
                                $ev_type = $row['evt_desc'];
                                $ev_picture = $row['ev_picture'];
                                $ev_by_university = $row['uni_name'];

                        ?>
                        <!-- begin item -->
                        <div class="item">
                           <div class="col-md-8" style="background-color: white; margin-left:15%">
                               <img src="resources/images/<?php echo $ev_picture?>" style="width: 90%; margin-top: 10px" />
                               <hr>
                               <div class="panel">
                                   <p style="color: black; text-align: center; font-size: 20px">
                                     <?php echo $ev_name;?>
                                   </p>
                                   <p style="color: black; text-align: center; font-size: 14px">
                                     <?php echo $ev_desc;?>
                                   </p>
                                   <p style="color: black; text-align: left; font-size: 14px">
                                     <b>Date and Venue:</b>  <?php echo $nf_ev_start_date.' - '.$ev_venue.', '.$ev_city; ?><br>
                                     <b>Event Type:</b>  <?php echo $ev_type?><br>
                                     <b>Event Organized By:</b>  <?php echo $ev_by_university?><br><br>
                                     <a href="#">View More Details  <i class="fa fa-arrow"></i></a>
                                   </p>
                               </div>
                           </div>
                        </div>
                    <?php } ?>
                    </div>
                    <!-- end carousel-inner -->
                    <!-- begin carousel-indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#testimonials" data-slide-to="0" class="active"></li>
                        <?php 
                            $curdate = date('Y-m-d');
                            include('db_con.php');
                            $get_ongoing = mysqli_query($connection,"SELECT * FROM `t_events` AS EVE
                                                                             INNER JOIN `r_university` AS UNI 
                                                                             ON EVE.ev_by_university = UNI.uni_ID
                                                                             INNER JOIN `r_city` AS CTY 
                                                                             ON EVE.ev_city = CTY.city_ID
                                                                             INNER JOIN `r_event_type` AS EVTYPE 
                                                                             ON EVE.ev_typeID = EVTYPE.evt_ID
                                                                          WHERE EVE.ev_date_start = '$curdate'");
                            if(mysqli_num_rows($get_ongoing) == 0)
                            {

                            }
                            else
                            {
                                $stopper = mysqli_num_rows($get_ongoing);
                                $increment = 0;
                                for($i = 1;$i <= $stopper ;$i++)
                                {
                                    $increment += 1;

                                    echo 
                                    '
                                    <li data-target="#testimonials" data-slide-to="'.$increment.'" class=""></li>
                                    ';
                                }
                            }
                           
                        ?>
                    </ol>
                    <!-- end carousel-indicators -->
                </div>
                <!-- end carousel -->
            </div>
            <!-- end containter -->
        </div>
        <!-- end #client -->
        
        <!-- begin #pricing -->
        <div id="pricing" class="content" data-scrollview="true">
            <!-- begin container -->
            <div class="container">
                <h2 class="content-title">Trending Upcoming Events</h2>
                <!-- <p class="content-desc">
                    
                </p> -->
                <!-- begin pricing-table -->
                <ul class="pricing-table col-4">
                    <li data-animation="true" data-animation-type="fadeInUp">
                        
                    </li>
                </ul>
            </div>
            <!-- end container -->
        </div>
        <!-- end #pricing -->
        
        <!-- begin #contact -->
        <div id="contact" class="content bg-silver-lighter" data-scrollview="true">
            <!-- begin container -->
            <div class="container">
                <h2 class="content-title">Other Upcoming Events</h2>
                <p class="content-desc">

                </p>
                <!-- begin row -->
                
                    <?php 
                        $curdate = date('Y-m-d');
                        include('db_con.php');
                        $get_ongoing = mysqli_query($connection,"SELECT * FROM `t_events` AS EVE
                                                                         INNER JOIN `r_university` AS UNI 
                                                                         ON EVE.ev_by_university = UNI.uni_ID
                                                                         INNER JOIN `r_city` AS CTY 
                                                                         ON EVE.ev_city = CTY.city_ID
                                                                         INNER JOIN `r_event_type` AS EVTYPE 
                                                                         ON EVE.ev_typeID = EVTYPE.evt_ID
                                                                      WHERE EVE.ev_date_start != '$curdate'
                                                                      AND EVE.ev_status = 'PENDING'");
                        while($row = mysqli_fetch_assoc($get_ongoing))
                        {
                            $ev_name = $row['ev_name'];
                            $ev_desc = $row['ev_desc'];
                            $ev_date_start = new datetime($row['ev_date_start']);
                            $nf_ev_start_date = $ev_date_start->format('F d, Y');
                            $ev_venue = $row['ev_venue'];
                            $ev_city = $row['city_name'];
                            $ev_type = $row['evt_desc'];
                            $ev_picture = $row['ev_picture'];
                            $ev_by_university = $row['uni_name'];

                    ?>
                    <!-- begin item -->
                       <div class="col-md-8" style="background-color: white; margin-left:16%; margin-bottom: 20px">
                           <img src="resources/images/<?php echo $ev_picture?>" style="width: 100%; margin-top: 10px" />
                           <hr>
                           <div class="panel">
                               <p style="color: black; text-align: center; font-size: 20px">
                                 <?php echo $ev_name;?>
                               </p>
                               <p style="color: black; text-align: center; font-size: 14px">
                                 <?php echo $ev_desc;?>
                               </p>
                               <p style="color: black; text-align: left; font-size: 14px">
                                 <b>Date and Venue:</b>  <?php echo $nf_ev_start_date.' - '.$ev_venue.', '.$ev_city; ?><br>
                                 <b>Event Type:</b>  <?php echo $ev_type?><br>
                                 <b>Event Organized By:</b>  <?php echo $ev_by_university?><br><br>
                                 <a href="#">View More Details  <i class="fa fa-arrow"></i></a>
                               </p>
                           </div>
                       </div>
                       <br>
                    

                <?php } ?>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end #contact -->
        

       

        <!-- begin #footer -->
        <div id="footer" class="footer">
            <div class="container">
                <div class="footer-brand">
                    <img src="resources/images/event.png" /><br>
                    UWEPS
                </div>
                <p>
                    &copy; UWEPS 2019<br />
                    University Events Portal System
                </p>
                <!-- <p class="social-list">
                    <a href="#"><i class="fa fa-facebook fa-fw"></i></a>
                    <a href="#"><i class="fa fa-instagram fa-fw"></i></a>
                    <a href="#"><i class="fa fa-twitter fa-fw"></i></a>
                    <a href="#"><i class="fa fa-google-plus fa-fw"></i></a>
                    <a href="#"><i class="fa fa-dribbble fa-fw"></i></a>
                </p> -->
            </div>
        </div>
        <!-- end #footer -->
        
        
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
