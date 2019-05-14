<?php
	include('../../../db_con.php');

	
	        
	        $number_ret = mysqli_query($connection, "SELECT MAX(za_ID) FROM t_zoning_application");
	        $getrow = mysqli_fetch_array($number_ret);
	        $lastcount = $getrow[0];
	        $forletter = $lastcount + 1;
	        $modified = str_pad($forletter,5,"0",STR_PAD_LEFT);
	        $za_no = 'ZA'.$modified;
	        echo $za_no;

	  		$za_app_name = 2;

	  		$get_app_add = mysqli_query($connection,"SELECT * FROM `t_applicants` WHERE app_ID = '$za_app_name' ");
	  		while($row = mysqli_fetch_assoc($get_app_add))
	  		{
	  		   
	  		    $za_app_address = $row["app_homeaddress"];
	  		    echo $za_app_address;
	  		}

?>