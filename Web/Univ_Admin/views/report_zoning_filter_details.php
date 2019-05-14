
<?php
	
	include("../../../db_con.php");

	

	// echo '
			
	// 		<table id="data-table-default" class="table table-striped table-bordered">
	// 		    <thead>
	// 		        <tr>
	// 		            <th>App No.</th>
	// 		            <th>Applicant Name</th>
	// 		            <th>Project Location (Brgy)</th>
	// 		            <th>Project Status</th>
	// 		            <th>Current Step</th>
	// 		            <th>Application Date</th>   
	// 		        </tr>
	// 		    </thead>
	// 		    <tbody>
	// ';



	//office filter
	if(isset($_POST['filter_stat']))
	{   
		$fil_by_stat = $_POST['filter_by_status'];
		$fil_by_brgy = $_POST['filter_by_brgy'];

		if(!empty($_POST["start_month"]) && !empty($_POST['end_month']))
		{
			$start_mo_nr = new datetime($_POST['start_month']);
			$end_mo_nr = new datetime($_POST['end_month']);

			$start_mon = $start_mo_nr->format('m');
			$end_mon = $end_mo_nr->format('m');
		}
		else
		{
			$start_mon = 1;
			$end_mon = 12;
		}


		
		if($fil_by_brgy == 'ALL' &&  $fil_by_stat == 'ALL')
		{
			    $view_query = mysqli_query($connection,"SELECT * FROM `t_zoning_application` AS ZA 
			                                              INNER JOIN `r_barangay` AS BRGY
			                                              ON ZA.za_loc_brgy = BRGY.brgy_ID
			                                              INNER JOIN `t_applicants` AS APP
			                                              ON ZA.za_applicant_ID = APP.app_ID
			                                              WHERE month(za_add_timestamp) BETWEEN '$start_mon' and '$end_mon'
			                                              ORDER BY ZA.za_no DESC");
			    while($row = mysqli_fetch_assoc($view_query))
			    {
			        $za_ID = $row["za_ID"];
			        $za_no = $row["za_no"];
			        $za_app_step = $row["za_app_step"];
			        $za_stat = $row["za_app_status"];
			        $za_add_timestamp = new datetime($row["za_add_timestamp"]); 

			        $app_lname = $row["app_lastname"];
			        $app_fname = $row["app_firstname"];
			        $compname = $app_lname.', '.$app_fname;

			        $brgy_name = $row["brgy_name"];
			        $newdate = $za_add_timestamp->format('F d, Y');
				    echo
				    '
				    <tr class="gradeX">
				        <td width="">'.$za_no.'</td>
				        <td width="">'.$compname.'</td>
				        <td width="">Brgy. '.$brgy_name.'</td>
				        <td width="">'.$za_stat.'</td>
				        <td width="">'.$za_app_step.'</td>
				        <td width="">'.$newdate.'</td>
				    </tr>
				    ';  
			   }
		}
		else if($fil_by_brgy == 'ALL' &&  $fil_by_stat != 'ALL')
		{
			    $view_query = mysqli_query($connection,"SELECT * FROM `t_zoning_application` AS ZA 
			                                              INNER JOIN `r_barangay` AS BRGY
			                                              ON ZA.za_loc_brgy = BRGY.brgy_ID
			                                              INNER JOIN `t_applicants` AS APP
			                                              ON ZA.za_applicant_ID = APP.app_ID
			                                              WHERE month(za_add_timestamp) BETWEEN '$start_mon' and '$end_mon'
			                                              and ZA.za_app_status = '$fil_by_stat'
			                                              ORDER BY ZA.za_no DESC");
			    while($row = mysqli_fetch_assoc($view_query))
			    {
			        $za_ID = $row["za_ID"];
			        $za_no = $row["za_no"];
			        $za_app_step = $row["za_app_step"];
			        $za_stat = $row["za_app_status"];
			        $za_add_timestamp = new datetime($row["za_add_timestamp"]); 

			        $app_lname = $row["app_lastname"];
			        $app_fname = $row["app_firstname"];
			        $compname = $app_lname.', '.$app_fname;

			        $brgy_name = $row["brgy_name"];
			        $newdate = $za_add_timestamp->format('F d, Y');
				    echo
				    '
				    <tr class="gradeX">
				        <td width="">'.$za_no.'</td>
				        <td width="">'.$compname.'</td>
				        <td width="">Brgy. '.$brgy_name.'</td>
				        <td width="">'.$za_stat.'</td>
				        <td width="">'.$za_app_step.'</td>
				        <td width="">'.$newdate.'</td>
				    </tr>
				    ';  
			   }
		}
		else if($fil_by_brgy != 'ALL' &&  $fil_by_stat == 'ALL')
		{
			    $view_query = mysqli_query($connection,"SELECT * FROM `t_zoning_application` AS ZA 
			                                              INNER JOIN `r_barangay` AS BRGY
			                                              ON ZA.za_loc_brgy = BRGY.brgy_ID
			                                              INNER JOIN `t_applicants` AS APP
			                                              ON ZA.za_applicant_ID = APP.app_ID
			                                              WHERE month(za_add_timestamp) BETWEEN '$start_mon' and '$end_mon'
			                                              and ZA.za_loc_brgy = '$fil_by_brgy'
			                                              ORDER BY ZA.za_no DESC");
			    while($row = mysqli_fetch_assoc($view_query))
			    {
			        $za_ID = $row["za_ID"];
			        $za_no = $row["za_no"];
			        $za_app_step = $row["za_app_step"];
			        $za_stat = $row["za_app_status"];
			        $za_add_timestamp = new datetime($row["za_add_timestamp"]); 

			        $app_lname = $row["app_lastname"];
			        $app_fname = $row["app_firstname"];
			        $compname = $app_lname.', '.$app_fname;

			        $brgy_name = $row["brgy_name"];
			        $newdate = $za_add_timestamp->format('F d, Y');
				    echo
				    '
				    <tr class="gradeX">
				        <td width="">'.$za_no.'</td>
				        <td width="">'.$compname.'</td>
				        <td width="">Brgy. '.$brgy_name.'</td>
				        <td width="">'.$za_stat.'</td>
				        <td width="">'.$za_app_step.'</td>
				        <td width="">'.$newdate.'</td>
				    </tr>
				    ';  
			   }
		}
		else if($fil_by_brgy != 'ALL' &&  $fil_by_stat != 'ALL')
		{
			    $view_query = mysqli_query($connection,"SELECT * FROM `t_zoning_application` AS ZA 
			                                              INNER JOIN `r_barangay` AS BRGY
			                                              ON ZA.za_loc_brgy = BRGY.brgy_ID
			                                              INNER JOIN `t_applicants` AS APP
			                                              ON ZA.za_applicant_ID = APP.app_ID
			                                              WHERE ZA.za_app_status = '$fil_by_stat'
			                                              and ZA.za_loc_brgy = '$fil_by_brgy'
			                                              and  month(za_add_timestamp) BETWEEN '$start_mon' and '$end_mon'
			                                              ORDER BY ZA.za_no DESC");
			    while($row = mysqli_fetch_assoc($view_query))
			    {
			        $za_ID = $row["za_ID"];
			        $za_no = $row["za_no"];
			        $za_app_step = $row["za_app_step"];
			        $za_stat = $row["za_app_status"];
			        $za_add_timestamp = new datetime($row["za_add_timestamp"]); 

			        $app_lname = $row["app_lastname"];
			        $app_fname = $row["app_firstname"];
			        $compname = $app_lname.', '.$app_fname;

			        $brgy_name = $row["brgy_name"];
			        $newdate = $za_add_timestamp->format('F d, Y');
				    echo
				    '
				    <tr class="gradeX">
				        <td width="">'.$za_no.'</td>
				        <td width="">'.$compname.'</td>
				        <td width="">Brgy. '.$brgy_name.'</td>
				        <td width="">'.$za_stat.'</td>
				        <td width="">'.$za_app_step.'</td>
				        <td width="">'.$newdate.'</td>
				    </tr>
				    ';  
			   }
		}
	}
	else
		{	
			    $view_query = mysqli_query($connection,"SELECT * FROM `t_zoning_application` AS ZA 
			                                              INNER JOIN `r_barangay` AS BRGY
			                                              ON ZA.za_loc_brgy = BRGY.brgy_ID
			                                              INNER JOIN `t_applicants` AS APP
			                                              ON ZA.za_applicant_ID = APP.app_ID
			                                              ORDER BY ZA.za_no DESC");
			    while($row = mysqli_fetch_assoc($view_query))
			    {
			        $za_ID = $row["za_ID"];
			        $za_no = $row["za_no"];
			        $za_app_step = $row["za_app_step"];
			        $za_stat = $row["za_app_status"];
			        $za_add_timestamp = new datetime($row["za_add_timestamp"]); 

			        $app_lname = $row["app_lastname"];
			        $app_fname = $row["app_firstname"];
			        $compname = $app_lname.', '.$app_fname;

			        $brgy_name = $row["brgy_name"];
			        $newdate = $za_add_timestamp->format('F d, Y');
				    echo
				    '
				    <tr class="gradeX">
				        <td width="">'.$za_no.'</td>
				        <td width="">'.$compname.'</td>
				        <td width="">Brgy. '.$brgy_name.'</td>
				        <td width="">'.$za_stat.'</td>
				        <td width="">'.$za_app_step.'</td>
				        <td width="">'.$newdate.'</td>
				    </tr>
				    ';  
			   }
		} 
	// echo '
	// 		</tbody>
	// 	</table>
	// ';
	
?>


