<div class="navbar-header">
	<a href="index.php" class="navbar-brand">
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

		      echo '<img src="../../../'.$default_logo.'" style="width:20%;" alt="">';
		    }
		  }
		  else
		  {
		    echo'<img src="../../../resources/images/ROP.png" style="width:20%;" alt="">';
		  }
		?>
		
		<b>Municipal</b> UPDS</a>
</div>
<!--FOR PRESENTATION-->
<!-- <div class="navbar-header">
	<a href="index.php" class="navbar-brand">
		<img src="../../../resources/images/land-icons/map.png" style="width:20%;" alt="">
		<b>MapRise</b> UPDS
	</a>
</div> -->