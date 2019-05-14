
<?php
	
	include("../../../db_con.php");

	

	echo '
			
			<table id="data-table-default" class="table table-striped table-bordered">
			    <thead>
			        <tr>
			           <th>App No.</th>
			           <th>Decision No.</th>
			           <th>Date of Receipt</th>
			           <th>PMO NO/.OR</th>
			           <th>Amount Paid</th>  
			        </tr>
			    </thead>
			    <tbody>
	';



	//office filter
	if(isset($_POST['filter_stat']))
	{   
		
		$curr_year = date('Y');
		if(!empty($_POST["start_month"]) && !empty($_POST['end_month']))
		{
			$start_mo_nr = new datetime($_POST['start_month']);
			$end_mo_nr = new datetime($_POST['end_month']);

			$start_mon = $start_mo_nr->format('m');
			$end_mon = $end_mo_nr->format('m');

			$nf_startmon = $start_mo_nr->format('F');
			$nf_endmon = $end_mo_nr->format('F');


			       $view_query = mysqli_query($connection,"SELECT * FROM `t_zoning_issuance` AS ZI
			                                                        INNER JOIN `t_zoning_application` AS ZA
			                                                        ON ZI.zi_za_no = ZA.za_no
			                                                        INNER JOIN `t_applicants` AS APP 
			                                                        ON ZA.za_applicant_ID = APP.app_ID
			                                                        INNER JOIN `r_barangay` AS BRGY 
			                                                        ON ZA.za_loc_brgy = BRGY.brgy_ID
			                                                        WHERE month(zi_date_receipt) BETWEEN '$start_mon' and '$end_mon'");
			       $total = 0;
			       while($row = mysqli_fetch_assoc($view_query))
			       {
			           $zi_ID = $row["zi_ID"];
			           $zi_za_no = $row["zi_za_no"];
			           $zi_dec_no  = $row["zi_dec_no"];
			           $zi_date_receipt = new datetime($row["zi_date_receipt"]);
			           $zi_pmo_no = $row["zi_pmo_no"];
			           $zi_pay_amount = $row["zi_pay_amount"];

			           $total = ($total + $zi_pay_amount);


			           $app_lname = $row["app_lastname"];
			           $app_fname = $row["app_firstname"];
			           $compname = $app_lname.', '.$app_fname;

			           $brgy_name = $row["brgy_name"];
			           $newdate = $zi_date_receipt->format('F d, Y');
			       
				       echo '
				       <tr class="gradeX">
				           <td width="">'.$zi_za_no .'</td>
				           <td width="">'.$zi_dec_no.' </td>
				           <td width="">'.$newdate.' </td>
				           <td width="">'.$zi_pmo_no.' </td>
				           <td width="">₱ '.$zi_pay_amount.' </td>
				       </tr>  
				       ';
			       } 
			       echo 
			       '
			       		<p style="font-size: 17px; margin-bottom: 10px; color: black">Total Sum of Collection from 
			       		'.$nf_startmon.' to '.$nf_endmon.' '.$curr_year.': <b>₱ '.$total.'</b></p><hr>
			       ';
		}
		else
		{
			$start_mon = 1;
			$end_mon = 12;

			       $view_query = mysqli_query($connection,"SELECT * FROM `t_zoning_issuance` AS ZI
			                                                        INNER JOIN `t_zoning_application` AS ZA
			                                                        ON ZI.zi_za_no = ZA.za_no
			                                                        INNER JOIN `t_applicants` AS APP 
			                                                        ON ZA.za_applicant_ID = APP.app_ID
			                                                        INNER JOIN `r_barangay` AS BRGY 
			                                                        ON ZA.za_loc_brgy = BRGY.brgy_ID
			                                                        WHERE month(zi_date_receipt) BETWEEN '$start_mon' and '$end_mon'");
			       $total = 0;
			       while($row = mysqli_fetch_assoc($view_query))
			       {
			           $zi_ID = $row["zi_ID"];
			           $zi_za_no = $row["zi_za_no"];
			           $zi_dec_no  = $row["zi_dec_no"];
			           $zi_date_receipt = new datetime($row["zi_date_receipt"]);
			           $zi_pmo_no = $row["zi_pmo_no"];
			           $zi_pay_amount = $row["zi_pay_amount"];

			           $total = ($total + $zi_pay_amount);


			           $app_lname = $row["app_lastname"];
			           $app_fname = $row["app_firstname"];
			           $compname = $app_lname.', '.$app_fname;

			           $brgy_name = $row["brgy_name"];
			           $newdate = $zi_date_receipt->format('F d, Y');
			       
				       echo '
				       <tr class="gradeX">
				           <td width="">'.$zi_za_no .'</td>
				           <td width="">'.$zi_dec_no.' </td>
				           <td width="">'.$newdate.' </td>
				           <td width="">'.$zi_pmo_no.' </td>
				           <td width="">₱ '.$zi_pay_amount.' </td>
				       </tr>  
				       ';
			       } 
			       echo 
			       '
			       		<p style="font-size: 17px; margin-bottom: 10px; color: black">Total Sum of Collection from All Transactions: <b>₱ '.$total.'</b></p><hr>
			       ';
		}

		       
		
	}
	else
		{	
			       $view_query = mysqli_query($connection,"SELECT * FROM `t_zoning_issuance` AS ZI
			                                                        INNER JOIN `t_zoning_application` AS ZA
			                                                        ON ZI.zi_za_no = ZA.za_no
			                                                        INNER JOIN `t_applicants` AS APP 
			                                                        ON ZA.za_applicant_ID = APP.app_ID
			                                                        INNER JOIN `r_barangay` AS BRGY 
			                                                        ON ZA.za_loc_brgy = BRGY.brgy_ID");
			       $total = 0;
			       while($row = mysqli_fetch_assoc($view_query))
			       {
			           $zi_ID = $row["zi_ID"];
			           $zi_za_no = $row["zi_za_no"];
			           $zi_dec_no  = $row["zi_dec_no"];
			           $zi_date_receipt = new datetime($row["zi_date_receipt"]);
			           $zi_pmo_no = $row["zi_pmo_no"];
			           $zi_pay_amount = $row["zi_pay_amount"];

			           $total = ($total + $zi_pay_amount);


			           $app_lname = $row["app_lastname"];
			           $app_fname = $row["app_firstname"];
			           $compname = $app_lname.', '.$app_fname;

			           $brgy_name = $row["brgy_name"];
			           $newdate = $zi_date_receipt->format('F d, Y');
			       
				       echo '
				       <tr class="gradeX">
				           <td width="">'.$zi_za_no .'</td>
				           <td width="">'.$zi_dec_no.' </td>
				           <td width="">'.$newdate.' </td>
				           <td width="">'.$zi_pmo_no.' </td>
				           <td width="">₱ '.$zi_pay_amount.' </td>
				       </tr>  
				       ';
			       } 
			       
			      

			       echo 
			       '
			       		<p style="font-size: 17px; margin-bottom: 10px; color: black">Total Sum of Collection from All Transactions: <b>₱ '.$total.'</b></p><hr>
			       ';
			       
		 } 

		 
	echo '
			</tbody>
		</table>
	 ';
	
?>


