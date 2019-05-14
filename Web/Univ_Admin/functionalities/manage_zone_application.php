<?php
    include('../../../db_con.php');

     if(isset($_POST['add_zone_app']))
        { 
            
            date_default_timezone_set("UTC"); 
            $curryear = date('Y');

            $year_set = mysqli_query($connection, "SELECT year(za_add_timestamp) AS YR FROM t_zoning_application");
            if(mysqli_num_rows($year_set) > 0)
            {
                while($row = mysqli_fetch_assoc($year_set))
                {
                    $ReqYear = $row["YR"];

                }
                $ReqYear;
            }
            else
            {
                    
            
                     $ReqYear = $curryear;
                    //echo $ticketno;
            } 

            if($curryear == $ReqYear)
            {
                    $code_ret = mysqli_query($connection, "SELECT MAX(za_ID) FROM t_zoning_application");
                    $getrow = mysqli_fetch_array($code_ret);
                    $lastcount = $getrow[0];
                    $finalno = $lastcount + 1;
                    $modified = str_pad($finalno,4,"0",STR_PAD_LEFT);
                    $za_no = $curryear.'-'.$modified;

                    //echo $ticketno;
            }
            else if($curryear != $ReqYear)
            {
                    
                    $lastcount = 0;
                    $finalno = $lastcount + 1;
                    $modified = str_pad($finalno,4,"0",STR_PAD_LEFT);
                    $za_no = $curryear.'-'.$modified;
                    
                    //echo $ticketno;
            }


           
            $za_app_name = $_POST['za_app_name'];

            $get_app_add = mysqli_query($connection,"SELECT * FROM `t_applicants` WHERE app_ID = '$za_app_name' ");
            while($row = mysqli_fetch_assoc($get_app_add))
            {
               
                $za_app_address = $row["app_homeaddress"];
            }

           

            $za_company_name = $_POST['za_company_name'];
            $za_project_type = $_POST['za_project_type'];
            $za_project_nature = $_POST['za_project_nature'];
            $za_loc_number = $_POST['za_loc_number'];
            $za_loc_street = $_POST['za_loc_street'];
            $za_loc_munic = $_POST['za_loc_munic'];
            $za_loc_brgy = $_POST['za_loc_brgy'];
            $za_loc_province = $_POST['za_loc_province'];
            $za_project_area = $_POST['za_project_area'];
            $za_right_overland = $_POST['za_right_overland'];
            $za_project_tenure = $_POST['za_project_tenure'];
            $za_exist_landuse = $_POST['za_exist_landuse'];
            $za_tenancy = $_POST['za_tenancy'];
            $za_project_cost_figure = $_POST['za_project_cost_figure'];
            $za_project_cost_word = $_POST['za_project_cost_word'];
            $za_lzczc_stat = $_POST['za_lzczc_stat'];
            $za_similar_app = $_POST['za_similar_app'];
            $za_release_decision = $_POST['za_release_decision'];
            $lat = $_POST['lat'];
            $lng = $_POST['lng'];


            //Optional Entries
            if(!empty($_POST["za_company_add"]) && empty($_POST['za_same_add']))
            { 
                $za_company_add = $_POST['za_company_add'];
            }
            else if(empty($_POST["za_company_add"]) && !empty($_POST['za_same_add']))
            {
                $za_company_add = $za_app_address;
            }

            

            $za_auth_name = $_POST['za_auth_name'];
            $za_auth_add = $_POST['za_auth_add'];

            $za_ROL_owner_TCT_no = $_POST['za_ROL_owner_TCT_no'];
            $za_ROL_lease_no = $_POST['za_ROL_lease_no'];
            $za_ROL_specific = $_POST['za_ROL_specific'];

            $za_pt_temp_start_yr= $_POST['from_year'];
            $za_pt_temp_end_yr = $_POST['to_year'];
            $za_pt_temp_count_yr = $_POST['diff_year'];

            $za_lzczc_yes_names = $_POST['za_lzczc_yes_names'];
            $za_lzczc_yes_dates = $_POST['za_lzczc_yes_dates'];
            $za_lzczc_yes_notices = $_POST['za_lzczc_yes_notices'];
            $za_simapp_yes_officers = $_POST['za_simapp_yes_officers'];
            $za_simapp_yes_dates = $_POST['za_simapp_yes_dates'];
            $za_simapp_yes_actions = $_POST['za_simapp_yes_actions'];  
            $za_rel_dec_mail_add = $_POST['za_rel_dec_mail_add'];
          
            



            $insert = "INSERT INTO t_zoning_application(za_no, 
                                                        za_applicant_ID, 
                                                        za_applicant_address, 
                                                        za_name_corporation,
                                                        za_address_corporation,
                                                        za_name_auth_rep,
                                                        za_address_auth_rep,
                                                        za_project_type,
                                                        za_project_nature,
                                                        za_loc_number,
                                                        za_loc_street,
                                                        za_loc_municipality,
                                                        za_loc_brgy,
                                                        za_loc_province,
                                                        za_project_area,
                                                        za_project_ROL,
                                                        za_project_ROL_TCT_no,
                                                        za_project_ROL_lease_no,
                                                        za_project_ROL_others,
                                                        za_project_tenure,
                                                        za_project_tenure_start_year,
                                                        za_project_tenure_end_year,
                                                        za_project_tenure_count_years,
                                                        za_land_use_ID,
                                                        za_tenancy,
                                                        za_project_cost_num,
                                                        za_project_cost_words,
                                                        za_zoning_compliance,
                                                        za_zoning_admin,
                                                        za_zoning_notice_date,
                                                        za_zoning_notice_request_desc,
                                                        za_similar_application,
                                                        za_simapp_other_office,
                                                        za_simapp_date_filled,
                                                        za_simapp_action_taken,
                                                        za_mode_release,
                                                        za_moderel_address_to,
                                                        za_app_status,
                                                        za_app_step,
                                                        za_app_step_no,
                                                        lat,
                                                        lng)  

                                                VALUES ('$za_no', 
                                                        '$za_app_name',
                                                        '$za_app_address',
                                                        '$za_company_name',
                                                        '$za_company_add',
                                                        '$za_auth_name',
                                                        '$za_auth_add',
                                                        '$za_project_type',
                                                        '$za_project_nature',
                                                        '$za_loc_number',
                                                        '$za_loc_street', 
                                                        '$za_loc_munic',
                                                        '$za_loc_brgy',
                                                        '$za_loc_province',
                                                        '$za_project_area',
                                                        '$za_right_overland',
                                                        '$za_ROL_owner_TCT_no',
                                                        '$za_ROL_lease_no',
                                                        '$za_ROL_specific',
                                                        '$za_project_tenure',

                                                        '$za_pt_temp_start_yr',
                                                        '$za_pt_temp_end_yr',
                                                        '$za_pt_temp_count_yr',

                                                        '$za_exist_landuse',
                                                        '$za_tenancy',
                                                        '$za_project_cost_figure',
                                                        '$za_project_cost_word',
                                                        '$za_lzczc_stat',
                                                        '$za_lzczc_yes_names',
                                                        '$za_lzczc_yes_dates',
                                                        '$za_lzczc_yes_notices',
                                                        '$za_similar_app',
                                                        '$za_simapp_yes_officers',
                                                        '$za_simapp_yes_dates',
                                                        '$za_simapp_yes_actions',
                                                        '$za_release_decision',
                                                        '$za_rel_dec_mail_add',
                                                        'PENDING',
                                                        'For Assessment',
                                                        '1',
                                                        '$lat',
                                                        '$lng')";

             mysqli_query($connection,$insert);  

             $box = $_POST['checkstat'];
             
             while (list($key,$val) = @each($box))
             {
                 $insert_requirement = "INSERT INTO t_zoning_rqrmnt_passed(rp_za_no,
                                                                           rp_rqrmnt_ID,
                                                                           rp_timestamp)

                                                                    VALUES('$za_no', 
                                                                           '$val', 
                                                                            CURRENT_TIMESTAMP
                                                                          )";
                 mysqli_query($connection,$insert_requirement); 
             }

             echo "<script type=\"text/javascript\">".
                      "alert
                      ('You have successfully submitted an application!');".
                     "</script>";
             echo "<script>setTimeout(\"location.href = '../views/zone_app_manage.php';\",0);</script>";

        }
     else if(isset($_POST['mod_zone_app']))
        { 
            $za_ID = $_POST['za_ID'];
            //$za_app_name = $_POST['za_app_name'];
            //$za_app_address = $row["za_app_address"];
           
            $za_company_name = $_POST['za_company_name'];
            $za_company_add = $_POST['za_company_add'];
            $za_project_type = $_POST['za_project_type'];
            $za_project_nature = $_POST['za_project_nature'];
            $za_loc_number = $_POST['za_loc_number'];
            $za_loc_street = $_POST['za_loc_street'];
            $za_loc_munic = $_POST['za_loc_munic'];
            $za_loc_brgy = $_POST['za_loc_brgy'];
            $za_loc_province = $_POST['za_loc_province'];   
            $za_project_area = $_POST['za_project_area'];
            $za_right_overland = $_POST['za_right_overland'];
            $za_project_tenure = $_POST['za_project_tenure'];
            $za_exist_landuse = $_POST['za_exist_landuse'];
            $za_tenancy = $_POST['za_tenancy'];
            $za_project_cost_figure = $_POST['za_project_cost_figure'];
            $za_project_cost_word = $_POST['za_project_cost_word'];
            $za_lzczc_stat = $_POST['za_lzczc_stat'];
            $za_similar_app = $_POST['za_similar_app'];
            $za_release_decision = $_POST['za_release_decision'];


            //Optional Entries
            $za_auth_name = $_POST['za_auth_name'];
            $za_auth_add = $_POST['za_auth_add'];
            $za_pt_temp_years = $_POST['za_pt_temp_years'];
            $za_lzczc_yes_names = $_POST['za_lzczc_yes_names'];
            $za_lzczc_yes_dates = $_POST['za_lzczc_yes_dates'];
            $za_lzczc_yes_notices = $_POST['za_lzczc_yes_notices'];
            $za_simapp_yes_officers = $_POST['za_simapp_yes_officers'];
            $za_simapp_yes_dates = $_POST['za_simapp_yes_dates'];
            $za_simapp_yes_actions = $_POST['za_simapp_yes_actions'];  
            $za_rel_dec_mail_add = $_POST['za_rel_dec_mail_add'];
          
            



            $update = "UPDATE t_zoning_application SET  za_name_corporation = '$za_company_name',
                                                        za_address_corporation = '$za_company_add',
                                                        za_name_auth_rep = '$za_auth_name',
                                                        za_address_auth_rep = '$za_auth_add',
                                                        za_project_type = '$za_project_type',
                                                        za_project_nature = '$za_project_nature',
                                                        za_loc_number = '$za_loc_number',
                                                        za_loc_street = '$za_loc_street', 
                                                        za_loc_municipality = '$za_loc_munic',
                                                        za_loc_brgy = '$za_loc_brgy',
                                                        za_loc_province = '$za_loc_province',
                                                        za_project_area = '$za_project_area',
                                                        za_project_ROL = '$za_right_overland',
                                                        za_project_tenure = '$za_project_tenure',
                                                        za_project_tenure_years = '$za_pt_temp_years',
                                                        za_land_use_ID = '$za_exist_landuse',
                                                        za_tenancy = '$za_tenancy',
                                                        za_project_cost_num = '$za_project_cost_figure',
                                                        za_project_cost_words = '$za_project_cost_word',
                                                        za_zoning_compliance = '$za_lzczc_stat',
                                                        za_zoning_admin = '$za_lzczc_yes_names',
                                                        za_zoning_notice_date = '$za_lzczc_yes_dates',
                                                        za_zoning_notice_request_desc = '$za_lzczc_yes_notices',
                                                        za_similar_application = '$za_similar_app',
                                                        za_simapp_other_office = '$za_simapp_yes_officers',
                                                        za_simapp_date_filled = '$za_simapp_yes_dates',
                                                        za_simapp_action_taken = '$za_simapp_yes_actions',
                                                        za_mode_release = '$za_release_decision',
                                                        za_moderel_address_to = '$za_rel_dec_mail_add',
                                                        za_mod_timestamp = CURRENT_TIMESTAMP,
                                                        za_app_status = 'PENDING',
                                                        za_app_step = 'For Re-Assessment'

                                                        
                                                     WHERE za_ID = '$za_ID'";

             mysqli_query($connection,$update);  

             echo "<script type=\"text/javascript\">".
                      "alert
                      ('You have successfully saved the changes!');".
                     "</script>";
             echo "<script>setTimeout(\"location.href = '../views/zone_app_view_details.php?getID=$za_ID';\",0);</script>";

        }
     

?>