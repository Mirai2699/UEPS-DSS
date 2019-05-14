
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




	if(isset($_POST['filter_stat']))
	{   

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


		    $view_query = mysqli_query($connection,"SELECT * FROM `t_applicants` 
		    										WHERE month(app_add_timestamp) BETWEEN '$start_mon' and '$end_mon'");
		    while($row = mysqli_fetch_assoc($view_query))
		    {
		            $ID = $row["app_ID"];
		            $app_lname = $row["app_lastname"];
		            $app_mname = $row["app_middlename"];
		            $app_fname = $row["app_firstname"];
		            $app_hadd = $row["app_homeaddress"];

		            $app_stat = $row["app_active_status"];
		            $app_add_ts= new datetime($row["app_mod_timestamp"]);
		            $app_mod_ts= $row["app_mod_timestamp"];
		            $app_contact = $row["app_contact_no"];
		            $compname = $app_lname.', '.$app_fname;
		            $add_date = $app_add_ts->format('F d, Y');
		                        
			    echo 
			  	'  
			        <tr class="gradeX">
			            <td width="">'.$compname.'</td>
			            <td width="">'.$app_hadd.'</td>
			            <td width="">'.$app_contact.'</td>
			            <td width="">'.$add_date.'</td>
			        </tr>  
			   
			    ';
		   }
		
	}
	else
	{	
			  
			    $view_query = mysqli_query($connection,"SELECT * FROM `t_applicants`");
			    while($row = mysqli_fetch_assoc($view_query))
			    {
			            $ID = $row["app_ID"];
			            $app_lname = $row["app_lastname"];
			            $app_mname = $row["app_middlename"];
			            $app_fname = $row["app_firstname"];
			            $app_hadd = $row["app_homeaddress"];

			            $app_stat = $row["app_active_status"];
			            $app_add_ts= new datetime($row["app_mod_timestamp"]);
			            $app_mod_ts= $row["app_mod_timestamp"];
			            $app_contact = $row["app_contact_no"];
			            $compname = $app_lname.', '.$app_fname;
			            $add_date = $app_add_ts->format('F d, Y');
			                        
				    echo 
				  	'  
				        <tr class="gradeX">
				            <td width="">'.$compname.'</td>
				            <td width="">'.$app_hadd.'</td>
				            <td width="">'.$app_contact.'</td>
				            <td width="">'.$add_date.'</td>
				        </tr>  
				   
				    ';
			   }
	} 
	// echo '
	// 		</tbody>
	// 	</table>
	// ';
	
?>


