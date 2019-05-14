<?php
    include('../../../db_con.php');

     if(isset($_POST['final_dec']))
        { 
            
           
            $za_ID = $_POST['za_ID'];
            $za_verdict = $_POST['za_verdict'];
            $za_remarks = $_POST['za_add_remarks'];

            if($za_verdict == 'REVISE')
            {
                $za_step_num = '1';
                $za_step_desc = 'For Revision';

                $update = "UPDATE t_zoning_application SET  za_app_step_no = '$za_step_num',
                                                            za_app_step = '$za_step_desc',
                                                            za_app_remarks = '$za_remarks',
                                                            za_app_status = '$za_verdict',
                                                            za_mod_timestamp = CURRENT_TIMESTAMP
                                                            
                                                         WHERE za_ID = '$za_ID'";

                 mysqli_query($connection,$update);  
                 echo "<script type=\"text/javascript\">".
                          "alert
                          ('You have successfully provided a verdict!');".
                         "</script>";
                 echo "<script>setTimeout(\"location.href = '../views/zone_app_view_details.php?getID=$za_ID';\",0);</script>";
            }
            else if($za_verdict == 'APPROVED')
            {
                $za_step_num = '3';
                $za_step_desc = 'For Monitoring';

                $update = "UPDATE t_zoning_application SET  za_app_step_no = '$za_step_num',
                                                            za_app_step = '$za_step_desc',
                                                            za_app_remarks = '$za_remarks',
                                                            za_app_status = '$za_verdict',
                                                            za_mod_timestamp = CURRENT_TIMESTAMP,
                                                            za_approved_timestamp = CURRENT_TIMESTAMP

                                                         WHERE za_ID = '$za_ID'";

                 mysqli_query($connection,$update);  
                 echo "<script type=\"text/javascript\">".
                          "alert
                          ('You have successfully provided a verdict! You will now proceed to issuance receipt.');".
                         "</script>";
                 echo "<script>setTimeout(\"location.href = '../views/zone_iss_create.php?getID=$za_ID';\",0);</script>";
            }
            
            

             

        }
     

?>