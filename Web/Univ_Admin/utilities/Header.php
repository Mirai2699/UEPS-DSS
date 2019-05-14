<?php 
     include ("../../../db_con.php");
     session_start();
        $type = $_SESSION['UserRole'];
        if(!isset($_SESSION['UserName']) && $type!="3"){
          header('Location: 404.html?err=1');
        }
   
?> 
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="../../../resources/admin/assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<link href="../../../resources/admin/assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../../../resources/admin/assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />
	<link href="../../../resources/admin/assets/plugins/animate/animate.min.css" rel="stylesheet" />
	<link href="../../../resources/admin/assets/css/default/style.min.css" rel="stylesheet" />
	<link href="../../../resources/admin/assets/css/default/style-responsive.min.css" rel="stylesheet" />
	<link href="../../../resources/admin/assets/css/default/theme/default.css" rel="stylesheet" id="theme" />
	<?php
	  $db = mysqli_connect('localhost','root','','upds_v1');
	  $ui = mysqli_query($db,"SELECT * FROM master_ui_change WHERE muc_active_stat = 'Active'");
	  if(mysqli_num_rows($ui) > 0)
	  { 
	    while($row = mysqli_fetch_assoc($ui))
	    {
	      $filepath = 'resources/uploads';
	      $get_logo = $row["muc_logo"];
	      $default_logo = $filepath.'/'.$get_logo;

	      echo '<link href="../../../'.$default_logo.'" rel="icon"  />';
	    }
	  }
	  else
	  {
	    echo'<link href="../../../resources/images/ROP.png" rel="icon"  />';
	  }
	?>
	<!-- <link href="../../../resources/images/land-icons/map.png" rel="icon"  /> -->
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="../../../resources/admin/assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->

	<!-- ================== BEGIN PAGE LEVEL CSS ================== -->
	<style type="text/css">
		.hidden {
			display: none;
		}
	</style>
	<!-- ================== END PAGE LEVEL CSS ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar-default">
			<!-- begin navbar-header -->
			<?php include("../../Master Utility/master_logo.php"); ?>
			<!-- end navbar-header -->
			
			<!-- begin header-nav -->
			<?php include("Notification.php");?>
			<!-- end header navigation right -->
		</div>
		<!-- end #header -->
