<?php 

	$get_users = "SELECT * FROM `t_user_accounts`";
	if ($users_result = mysqli_query($connection,$get_users))
	{
	  // Return the number of rows in result set
	  $count_users = mysqli_num_rows($users_result);
	  
	}
	else
	{ 
	  $count_users = 0;
	}

	$get_districts = "SELECT * FROM `r_district`";
	if ($districts_result = mysqli_query($connection,$get_districts))
	{
	  // Return the number of rows in result set
	  $count_districts = mysqli_num_rows($districts_result);
	  
	}
	else
	{ 
	  $count_districts = 0;
	}

	$get_munic = "SELECT * FROM `r_municipality`";
	if ($munic_result = mysqli_query($connection,$get_munic))
	{
	  // Return the number of rows in result set
	  $count_munic = mysqli_num_rows($munic_result);
	  
	}
	else
	{ 
	  $count_munic = 0;
	}

	$get_brgy = "SELECT * FROM `r_barangay`";
	if ($brgy_result = mysqli_query($connection,$get_brgy))
	{
	  // Return the number of rows in result set
	  $count_brgy = mysqli_num_rows($brgy_result);
	  
	}
	else
	{ 
	  $count_brgy = 0;
	}

	$get_landuse = "SELECT * FROM `r_land_use`";
	if ($landuse_result = mysqli_query($connection,$get_landuse))
	{
	  // Return the number of rows in result set
	  $count_landuse = mysqli_num_rows($landuse_result);
	  
	}
	else
	{ 
	  $count_landuse = 0;
	}

	$get_infra = "SELECT * FROM `r_infrastructures`";
	if ($infra_result = mysqli_query($connection,$get_infra))
	{
	  // Return the number of rows in result set
	  $count_infra = mysqli_num_rows($infra_result);
	  
	}
	else
	{ 
	  $count_infra = 0;
	}

	$get_hazard = "SELECT * FROM `r_terrain_hazard`";
	if ($hazard_result = mysqli_query($connection,$get_hazard))
	{
	  // Return the number of rows in result set
	  $count_hazard = mysqli_num_rows($hazard_result);
	  
	}
	else
	{ 
	  $count_hazard = 0;
	}

	$get_reference = "SELECT * FROM `r_references`";
	if ($reference_result = mysqli_query($connection,$get_reference))
	{
	  // Return the number of rows in result set
	  $count_reference = mysqli_num_rows($reference_result);
	  
	}
	else
	{ 
	  $count_reference = 0;
	}
?>