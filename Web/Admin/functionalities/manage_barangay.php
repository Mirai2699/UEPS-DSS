<?php

	
	if(isset($_POST['save_add_details']))
	{
		add_barangay_details();
	}
	else if(isset($_POST['save_update_details']))
	{
		update_barangay_details();
	}
	else if(isset($_POST['save_modify_details']))
	{
		modify_barangay_details();
	}

	function add_barangay_details()
	{
		require("../../../db_con.php");

		$brgy_ID = $_POST['brgy_ID'];
		$brgy_captain = $_POST['brgy_captain'];
		$brgy_pop_count = $_POST['brgy_population_count'];
		$brgy_pop_year = $_POST['brgy_population_year'];
		$brgy_pop_per_annum = $_POST['brgy_population_per_annum'];
		$timestamp = date('Y-m-d H:i:s');

		$insert_details = "INSERT INTO `r_barangay_details` (brgy_det_captain, 
													 brgy_det_refID, 
													 brgy_timestamp)
											VALUES  ('$brgy_captain',
													 '$brgy_ID',
													 '$timestamp')";

		$insert_pop_details = "INSERT INTO `r_barangay_population`  (brgy_pop_count, 
																	 brgy_pop_year, 
																	 brgy_pop_per_annum,
																	 brgy_pop_refID,
																	 brgy_pop_timestamp)
															VALUES  ('$brgy_pop_count',
																	 '$brgy_pop_year',
																	 '$brgy_pop_per_annum',
																	 '$brgy_ID',
																	 '$timestamp')";

		mysqli_query($connection,$insert_details);
		mysqli_query($connection,$insert_pop_details);

		echo "<script type=\"text/javascript\">".
		       "alert
		       ('You have successfully saved the details!');".
		     "</script>";
		echo "<script>setTimeout(\"location.href = '../views/set_barangay.php';\",0);</script>";
	}
	
	function update_barangay_details()
	{
		require("../../../db_con.php");

		$brgy_ID = $_POST['brgy_ID'];
		$brgy_captain = $_POST['brgy_captain'];
		$brgy_pop_count = $_POST['brgy_population_count'];
		$brgy_pop_year = $_POST['brgy_population_year'];
		$brgy_pop_per_annum = $_POST['brgy_population_per_annum'];
		$timestamp = date('Y-m-d H:i:s');

		$update_details = "UPDATE `r_barangay_details` SET brgy_det_captain = '$brgy_captain',
														   brgy_timestamp = '$timestamp'
													   WHERE brgy_det_refID = '$brgy_ID'";

		$update_pop_details = "UPDATE `r_barangay_population` SET brgy_pop_count = '$brgy_pop_count',
															   brgy_pop_year = '$brgy_pop_year',
															   brgy_pop_per_annum = '$brgy_pop_per_annum',
															   brgy_pop_timestamp = '$timestamp'
													   WHERE brgy_pop_refID = '$brgy_ID'";

		mysqli_query($connection,$update_details);
		mysqli_query($connection,$update_pop_details);

		echo "<script type=\"text/javascript\">".
		       "alert
		       ('You have successfully saved the details!');".
		     "</script>";
		echo "<script>setTimeout(\"location.href = '../views/set_barangay.php';\",0);</script>";
	}

	function modify_barangay_details()
	{
		require("../../../db_con.php");

		$brgy_ID = $_POST['brgy_ID'];
		$brgy_name = $_POST['brgy_name'];
		$brgy_munic = $_POST['brgy_munic'];
		$brgy_PSGC = $_POST['brgy_PSGC'];
		$timestamp = date('Y-m-d H:i:s');

		$modify_details = "UPDATE `r_barangay` SET brgy_name = '$brgy_name',
												   brgy_municipality = '$brgy_munic',
												   brgy_PSGC = '$brgy_PSGC',
												   brgy_timestamp = '$timestamp'
											 WHERE brgy_ID = '$brgy_ID'";


		mysqli_query($connection,$modify_details);

		echo "<script type=\"text/javascript\">".
		       "alert
		       ('You have successfully saved the details!');".
		     "</script>";
		echo "<script>setTimeout(\"location.href = '../views/set_barangay.php';\",0);</script>";
	}

?>	