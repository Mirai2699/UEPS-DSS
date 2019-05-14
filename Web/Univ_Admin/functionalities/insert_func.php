<?php
    include('../../../db_con.php');

    if(isset($_POST['acc_reg']))
      { 
          
          
          $code_ret = mysqli_query($connection, "SELECT MAX(up_ID) FROM r_user_profile");
          $getrow = mysqli_fetch_array($code_ret);
          $lastcount = $getrow[0];
          $finalID = $lastcount + 1;


          $emp_lname = $_POST['emp_lname'];
          $emp_mname = $_POST['emp_mname'];
          $emp_fname = $_POST['emp_fname'];
          $emp_munic = $_POST['emp_munic'];
          $emp_pos = $_POST['emp_pos'];
          $emp_pic = $_POST['emp_pic'];

          $acc_username = $_POST['acc_username'];
          $acc_email = $_POST['acc_email'];
          $acc_password = $_POST['acc_password'];
          $acc_usr = $_POST['acc_usr'];


          $insertemp = "INSERT INTO r_user_profile (up_lastname, up_middlename, up_firstname, up_municipality, up_position, up_picture)     
                     VALUES ('$emp_lname', '$emp_mname', '$emp_fname', '$emp_munic', '$emp_pos', '$emp_pic')";

          $insertacc = "INSERT INTO t_user_accounts (acc_profID, acc_username, acc_password, acc_email, acc_user_role)     
                     VALUES ('$finalID', '$acc_username', '$acc_password', '$acc_email', '$acc_usr')";
          
           mysqli_query($connection,$insertemp);   
           mysqli_query($connection,$insertacc);

           echo "<script type=\"text/javascript\">".
                    "alert
                    ('You have successfully registered an account');".
                   "</script>";
           echo "<script>setTimeout(\"location.href = '../views/view_acc_manage.php';\",0);</script>";

      }


    else if(isset($_POST['add_office']))
      { 
          
          $office_name = $_POST['office_name'];

          $insert = "INSERT INTO r_office (office_name 
                                          )     
                                   VALUES ('$office_name'
                                          )";
                
          mysqli_query($connection,$insert);

           echo "<script type=\"text/javascript\">".
                    "alert
                    ('You have successfully added an office!');".
                   "</script>";
           echo "<script>setTimeout(\"location.href = '../views/manage_department.php';\",0);</script>";

      }

      else if(isset($_POST['add_docu_type']))
      { 
          
          $docu_type = $_POST['docu_type_desc'];

          $insert = "INSERT INTO r_document_type (docutype_desc 
                                                  )     
                                           VALUES ('$docu_type'
                                                  )";
                
          mysqli_query($connection,$insert);

           echo "<script type=\"text/javascript\">".
                    "alert
                    ('You have successfully added a document type!');".
                   "</script>";
           echo "<script>setTimeout(\"location.href = '../views/manage_docu_type.php';\",0);</script>";

      }
?>


