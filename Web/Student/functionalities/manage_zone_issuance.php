<?php
    include('../../../db_con.php');

     if(isset($_POST['submit_issuance']))
        { 
            
           
           
            $zi_za_no = $_POST['zi_za_no'];
            $zi_dec_no = $_POST['zi_dec_no'];
            $zi_lc_no = $_POST['zi_lc_no'];
            $zi_dec_desc = $_POST['zi_dec_desc'];
            $zi_ROL_desc = $_POST['zi_ROL_desc'];
            $zi_user = $_POST['zi_user'];
            $zi_pmo_no = $_POST['zi_pmo_no'];
            $zi_amount_pay = $_POST['zi_amount_pay'];

            $insert_issuance = "INSERT INTO t_zoning_issuance(zi_za_no, 
                                                              zi_dec_no, 
                                                              zi_lc_no, 
                                                              zi_dec_desc,
                                                              zi_ROL_desc,
                                                              zi_zoning_admin_incharge,
                                                              zi_pmo_no,
                                                              zi_pay_amount,
                                                              zi_date_receipt,
                                                              zi_date_issued,
                                                              zi_timestamp)   

                                                     VALUES ('$zi_za_no', 
                                                             '$zi_dec_no', 
                                                             '$zi_lc_no', 
                                                             '$zi_dec_desc',
                                                             '$zi_ROL_desc',
                                                             '$zi_user',
                                                             '$zi_pmo_no',
                                                             '$zi_amount_pay',
                                                              CURRENT_TIMESTAMP,
                                                              CURRENT_TIMESTAMP,
                                                              CURRENT_TIMESTAMP)";

            mysqli_query($connection,$insert_issuance); 


            $box = $_POST['checkstat'];
            
            while (list($key,$val) = @each($box))
            {
                $insert_condition = "INSERT INTO t_zoning_issuance_conditions(zic_dec_no,
                                                                              zic_zc_no,
                                                                              zic_timestamp)

                                                                        VALUES('$zi_dec_no', 
                                                                               '$val', 
                                                                                CURRENT_TIMESTAMP
                                                                               )";
                mysqli_query($connection,$insert_condition); 
            }
        

            echo "<script type=\"text/javascript\">".
                    "alert
                    ('You have successfully saved the issuance record!');".
                    "</script>";
            echo "<script>setTimeout(\"location.href = '../views/zone_iss_view_details.php?getNo=$zi_za_no';\",0);</script>";
           
       
        }
     

?>
