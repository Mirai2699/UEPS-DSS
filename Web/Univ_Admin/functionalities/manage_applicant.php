<?php
    include('../../../db_con.php');

     if(isset($_POST['add_applicant_zone']))
        { 
            

            $app_lname = $_POST['app_lname'];
            $app_mname = $_POST['app_mname'];
            $app_fname = $_POST['app_fname'];
            $app_hadd = $_POST['app_hadd'];
            $app_con_num = $_POST['app_con_num'];

            $insert = "INSERT INTO t_applicants (app_lastname, app_middlename, app_firstname, app_homeaddress, app_contact_no)     
                       VALUES ('$app_lname', '$app_mname', '$app_fname', '$app_hadd', '$app_con_num')";

            
             mysqli_query($connection,$insert);  

             echo "<script type=\"text/javascript\">".
                      "alert
                      ('You have successfully added an applicant');".
                     "</script>";
             echo "<script>setTimeout(\"location.href = '../views/zone_app_add.php';\",0);</script>";

        }
      else if(isset($_POST['add_applicant_view']))
        { 
            

            $app_lname = $_POST['app_lname'];
            $app_mname = $_POST['app_mname'];
            $app_fname = $_POST['app_fname'];
            $app_hadd = $_POST['app_hadd'];
            $app_con_num = $_POST['app_con_num'];

            $insert = "INSERT INTO t_applicants (app_lastname, app_middlename, app_firstname, app_homeaddress, app_contact_no)     
                       VALUES ('$app_lname', '$app_mname', '$app_fname', '$app_hadd', '$app_con_num')";

            
             mysqli_query($connection,$insert);  

             echo "<script type=\"text/javascript\">".
                      "alert
                      ('You have successfully added an applicant');".
                     "</script>";
             echo "<script>setTimeout(\"location.href = '../views/applicant_manage.php';\",0);</script>";

        }

?>