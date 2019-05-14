 <?php
          
      $view_query = mysqli_query($connection,"SELECT * FROM `t_zoning_application` AS ZA 
                                                INNER JOIN `r_barangay` AS BRGY
                                                ON ZA.za_loc_brgy = BRGY.brgy_ID
                                                INNER JOIN `r_municipality` AS MUNIC
                                                ON ZA.za_loc_municipality = MUNIC.munic_ID
                                                INNER JOIN `r_land_use` AS LU
                                                ON ZA.za_land_use_ID = LU.lu_ID
                                                INNER JOIN `t_applicants` AS APP
                                                ON ZA.za_applicant_ID = APP.app_ID
                                              WHERE ZA.za_ID = '$zapplication_ID'");
      while($row = mysqli_fetch_assoc($view_query))
      {
          $za_ID = $row["za_ID"];
          $za_no = $row["za_no"];
          $za_applicant_ID = $row["za_applicant_ID"];
          $za_name_corporation = $row["za_name_corporation"];
          $za_address_corporation = $row["za_address_corporation"];
          $za_project_type = $row["za_project_type"];
          $za_project_nature = $row["za_project_nature"];
          $za_loc_number = $row["za_loc_number"];
          $za_loc_street = $row["za_loc_street"];
          $za_loc_municipality = $row["za_loc_municipality"];
          $za_loc_brgy = $row["za_loc_brgy"];
          $za_loc_province = $row["za_loc_province"];
          $za_project_area = $row["za_project_area"];
          $za_project_ROL = $row["za_project_ROL"];
          $za_project_tenure = $row["za_project_tenure"];
          $za_land_use_ID = $row["za_land_use_ID"];
          $za_tenancy = $row["za_tenancy"];
          $za_project_cost_num = $row["za_project_cost_num"];
          $za_project_cost_words = $row["za_project_cost_words"];
          $za_zoning_compliance = $row["za_zoning_compliance"];
          $za_similar_application = $row["za_similar_application"];
          $za_mode_release = $row["za_mode_release"];
          $za_app_status = $row["za_app_status"];       
          $za_app_step = $row["za_app_step"];
          $za_add_timestamp = new datetime($row["za_add_timestamp"]); 

          if($za_project_ROL == 'Owner')
          {
            $za_project_ROL_desc = $row['za_project_ROL_TCT_no'];
          }
          else if($za_project_ROL == 'Lease')
          {
            $za_project_ROL_desc = $row['za_project_ROL_lease_no'];
          }
          else if($za_project_ROL == 'Others')
          {
            $za_project_ROL_desc = $row['za_project_ROL_others'];
          }

          //Optional Values
          
          if(!empty($row['za_name_auth_rep']))
          {
             $za_name_auth_rep = $row["za_name_auth_rep"];
          }
          else
          {
            $za_name_auth_rep = 'N/A';
          }
          if(!empty($row['za_address_auth_rep']))
          {
             $za_address_auth_rep = $row["za_address_auth_rep"];
          }
          else
          {
            $za_address_auth_rep = 'N/A';
          }
          if(!empty($row["za_project_tenure_years"]))
          {
             $za_project_tenure_years = $row["za_project_tenure_years"];
          }
          else
          {
             $za_project_tenure_years = 'N/A';
          }
          if(!empty($row["za_zoning_admin"]))
          {
             $za_zoning_admin = $row["za_zoning_admin"];
             $za_zoning_notice_date = $row["za_zoning_notice_date"];
             $za_zoning_notice_request_desc = $row["za_zoning_notice_request_desc"];
          }
          else
          {
            $za_zoning_admin = 'N/A';
            $za_zoning_notice_date = 'N/A';
            $za_zoning_notice_request_desc = 'N/A';
          }
          if(!empty($row["za_simapp_other_office"]))
          {
            $za_simapp_other_office = $row["za_simapp_other_office"];
            $za_simapp_date_filled = $row["za_simapp_date_filled"];
            $za_simapp_action_taken = $row["za_simapp_action_taken"];
          }
          else
          {
            $za_simapp_other_office = 'N/A';
            $za_simapp_date_filled = 'N/A';
            $za_simapp_action_taken = 'N/A';
          }
          if(!empty($row["za_moderel_address_to"]))
          {
             $za_moderel_address_to = $row["za_moderel_address_to"];   
          }
          else
          {
            $za_moderel_address_to = 'N/A';
          }

          if(!empty($row["za_app_remarks"]))
          {
             $za_app_remarks = $row["za_app_remarks"];   
          }
          else
          {
            $za_app_remarks = 'No remarks yet.';
          }
          if(!empty($row["za_app_map_eval"]))
          {
             $za_app_map_eval = $row["za_app_map_eval"];   
             $za_app_mapping_expert = $row["za_app_mapping_expert"];
             $za_app_map_eval_date = new datetime($row["za_app_map_eval_date"]);
             $za_app_new_eval_date = $za_app_map_eval_date->format('F d, Y');

             // $up_lname = $row["up_lastname"];
             // $up_fname = $row["up_firstname"];
             // $up_pos = $row["up_position"];

             // $up_compname = $up_fname.' '.$up_lname;

          }
          else
          { 
            $up_lname = '';
            $up_fname = '';
            $up_pos = '';

            $za_app_map_eval = 'Not yet evaluated.';
            $za_app_mapping_expert = 'Not yet evaluated.';
            $za_app_map_eval_date = 'Not yet evaluated.';
            $za_app_new_eval_date = 'Not yet evaluated.';
          } 
          
          



          $app_lname = $row["app_lastname"];
          $app_fname = $row["app_firstname"];
          $compname = $app_lname.', '.$app_fname;
          $za_app_address = $row["app_homeaddress"];

          $brgy_name = $row["brgy_name"];
          $munic_name = $row["munic_name"];
          $za_land_use_desc = $row["lu_desc"];
          $newdate = $za_add_timestamp->format('F d, Y');
          $za_loc_display = $za_loc_number.', '.$za_loc_street.' St., Brgy.'.$brgy_name.', '.$munic_name.', '.$za_loc_province;

          $za_decision = 'Locational Clearance Granted';
       }
  ?>  