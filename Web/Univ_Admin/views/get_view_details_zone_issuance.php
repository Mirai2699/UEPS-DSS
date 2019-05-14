<?php 
	
	$view_issuance = mysqli_query($connection,"SELECT * FROM `t_zoning_issuance` AS ZI
                                                       INNER JOIN `t_zoning_application` AS ZA
                                                       ON ZI.zi_za_no = ZA.za_no
                                                       INNER JOIN `t_applicants` AS APP 
                                                       ON ZA.za_applicant_ID = APP.app_ID
                                                       INNER JOIN `r_municipality` AS MUNIC
                                                       ON ZA.za_loc_municipality = MUNIC.munic_ID
                                                       INNER JOIN `r_barangay` AS BRGY 
                                                       ON ZA.za_loc_brgy = BRGY.brgy_ID
                                                       INNER JOIN `t_user_accounts` AS ACC
                                                       ON ACC.acc_ID = ZI.zi_zoning_admin_incharge
                                                       INNER JOIN `r_user_profile` AS USR 
                                                       ON ACC.acc_profID = USR.up_ID
                                                WHERE ZI.zi_za_no = '$za_no'");
	while($row = mysqli_fetch_assoc($view_issuance))
	{
		$zi_ID = $row["zi_ID"];
		$zi_za_no = $row["zi_za_no"];
		$zi_dec_no  = $row["zi_dec_no"];
		$zi_lc_no  = $row["zi_lc_no"];
		$zi_date_issued = new datetime($row["zi_date_issued"]);
		$zi_date_receipt = new datetime($row["zi_date_receipt"]);

		$zi_dec_desc = $row["zi_dec_desc"];
		$zi_ROL_desc = $row["zi_ROL_desc"];
		
		$zi_pay_amount = $row["zi_pay_amount"];
		$zi_pmo_no = $row["zi_pmo_no"];

		$up_lastname = $row["up_lastname"];
		$up_firstname = $row["up_firstname"];
		$up_position = $row["up_position"];
		$up_compname = $up_firstname.' '.$up_lastname;


		$app_lname = $row["app_lastname"];
		$app_fname = $row["app_firstname"];
		$compname = $app_lname.', '.$app_fname;

		$za_app_address = $row["app_homeaddress"];
		$za_name_corporation = $row["za_name_corporation"];
        $za_address_corporation = $row["za_address_corporation"];
        $za_project_type = $row["za_project_type"];
        $za_project_area = $row["za_project_area"];
        $za_loc_number = $row["za_loc_number"];
        $za_loc_street = $row["za_loc_street"];
		$brgy_name = $row["brgy_name"];
		$munic_name = $row["munic_name"];
		$za_loc_province = $row["za_loc_province"];

		$new_date_rpt = $zi_date_receipt->format('F d, Y');
		$new_date_iss = $zi_date_issued->format('F d, Y');


		$za_area_loc_display = '('.$za_project_area.' sq.m<sup>2</sup>) '.$za_loc_number.', '.$za_loc_street.' St., Brgy.'.$brgy_name.', '.$munic_name.', '.$za_loc_province;
		$zdec_ID = $zi_dec_no;
	}

?>