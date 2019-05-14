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


    else if(isset($_POST['add_district']))
      { 
          
          $dstrct_name = $_POST['District_name'];
          $dstrct_representative = $_POST['District_rep'];

          $insert = "INSERT INTO r_district (dstrct_name,
                                             dstrct_representative  
                                            )     
                                   VALUES ('$dstrct_name',
                                           '$dstrct_representative'
                                          )";
                
           mysqli_query($connection,$insert);

           echo "<script type=\"text/javascript\">".
                    "alert
                    ('You have successfully added a district!');".
                   "</script>";
           echo "<script>setTimeout(\"location.href = '../views/set_district.php';\",0);</script>";

      }

      else if(isset($_POST['add_municipal']))
        { 
            
            $munic_name = $_POST['munic_name'];
            $munic_district = $_POST['munic_district'];
            $munic_density = $_POST['munic_density'];
            $munic_area = $_POST['munic_area'];
            $munic_lat = $_POST['munic_lat'];
            $munic_long = $_POST['munic_long'];

            $insert = "INSERT INTO r_municipality (munic_name,
                                                   munic_district,
                                                   munic_density,
                                                   munic_area,  
                                                   munic_coor_lat,
                                                   munic_coor_lng
                                              )     
                                       VALUES ('$munic_name',
                                               '$munic_district',
                                               '$munic_density',
                                               '$munic_area',
                                               '$munic_lat',
                                               '$munic_long'
                                              )";
                  
             mysqli_query($connection,$insert);

             echo "<script type=\"text/javascript\">".
                      "alert
                      ('You have successfully added a municipality!');".
                     "</script>";
             echo "<script>setTimeout(\"location.href = '../views/set_municipality.php';\",0);</script>";

        }

        else if(isset($_POST['add_barangay']))
          { 
              
              $brgy_name = $_POST['brgy_name'];
              $brgy_psgc = $_POST['brgy_psgc'];
              $brgy_munic = $_POST['brgy_munic'];

              $insert = "INSERT INTO r_barangay (brgy_name,
                                                     brgy_PSGC,
                                                     brgy_municipality
                                                )     
                                         VALUES ('$brgy_name',
                                                 '$brgy_psgc',
                                                 '$brgy_munic'
                                                )";
                    
               mysqli_query($connection,$insert);

               echo "<script type=\"text/javascript\">".
                        "alert
                        ('You have successfully added a barangay!');".
                       "</script>";
               echo "<script>setTimeout(\"location.href = '../views/set_barangay.php';\",0);</script>";

          }

        else if(isset($_POST['add_land_use']))
          { 
              
              $lu_desc = $_POST['land_use_desc'];
              $lu_color = $_POST['color'];

              $insert = "INSERT INTO r_land_use (lu_desc,lu_color
                                                )     
                                         VALUES ('$lu_desc','$lu_color'
                                                )";
                    
              mysqli_query($connection,$insert);

               echo "<script type=\"text/javascript\">".
                        "alert
                        ('You have successfully added a land-use entity!');".
                       "</script>";
               echo "<script>setTimeout(\"location.href = '../views/set_land_use.php';\",0);</script>";

          }

          else if(isset($_POST['add_hazard']))
            { 
                
                $haz_desc = $_POST['hazard_desc'];
                $timestamp = date('Y-m-d H:i:s');

                $insert = "INSERT INTO r_terrain_hazard (haz_desc,
                                                         haz_timestamp
                                                        )     
                                                 VALUES ('$haz_desc',
                                                         '$timestamp'
                                                        )";
                      
                mysqli_query($connection,$insert);

                 echo "<script type=\"text/javascript\">".
                          "alert
                          ('You have successfully added a hazard terrain entity!');".
                         "</script>";
                 echo "<script>setTimeout(\"location.href = '../views/set_hazard_terrain.php';\",0);</script>";

            } 

            else if(isset($_POST['add_infra']))
              { 
                  
                  $inf_name = $_POST['infra_name'];
                  $inf_desc = $_POST['infra_desc'];
                  $timestamp = date('Y-m-d H:i:s');

                  $insert = "INSERT INTO r_infrastructures (inf_name,
                                                           inf_desc,
                                                           created_at
                                                          )     
                                                   VALUES ('$inf_name',
                                                           '$inf_desc',
                                                           '$timestamp'
                                                          )";
                        
                  mysqli_query($connection,$insert);

                   echo "<script type=\"text/javascript\">".
                            "alert
                            ('You have successfully added an infrastructure entity!');".
                           "</script>";
                   echo "<script>setTimeout(\"location.href = '../views/set_infrastructure.php';\",0);</script>";

              }          

        else if(isset($_POST['upload_reference']))
        {
          upload_reference();
        }
        else if(isset($_POST['save_requirement']))
        {
          add_requirements();
        }
        else if(isset($_POST['save_ui_set']))
        {
          add_master_ui();
        }


        function add_requirements()
        {
          include('../../../db_con.php');
          $rqr_desc = $_POST['rqr_desc'];

          $insert = "INSERT INTO r_zoning_requirement (rqrmnt_desc,
                                                       rqrmnt_timestamp
                                                  )     
                                           VALUES ('$rqr_desc',
                                                    CURRENT_TIMESTAMP
                                                  )";
                
           mysqli_query($connection,$insert);

           echo "<script type=\"text/javascript\">".
                    "alert
                    ('You have successfully added a requirement!');".
                   "</script>";
           echo "<script>setTimeout(\"location.href = '../views/set_requirements.php';\",0);</script>";
        }



        function add_master_ui()
        {
          // Include the database configuration file
          // Database configuration
          $dbHost     = "localhost";
          $dbUsername = "root";
          $dbPassword = "";
          $dbName     = "upds_v1";

          // Create database connection
          $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

          // Check connection
          if ($db->connect_error) {
              die("Connection failed: " . $db->connect_error);
          }

          $statusMsg = '';

          // File upload path
          $targetDir = "C:/xampp/htdocs/UPDS_V.1.0/resources/uploads/";
          $fileName = basename($_FILES["file"]["name"]);
          $targetFilePath = $targetDir . $fileName;
          $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

          if(isset($_POST["save_ui_set"]) && !empty($_FILES["file"]["name"]))
          {
              // Allow certain file formats
              $allowTypes = array('png', 'jpg');
              if(in_array($fileType, $allowTypes))
              {
                  // Upload file to server
                  if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
                  {
                      
                      $province_name = $_POST['muc_province'];
                      $municipality_name = $_POST['muc_munic'];
                      $active_stat = $_POST['muc_stat'];
                      // Insert image file name into database
                      $insert = $db->query("INSERT into master_ui_change (muc_logo, muc_province, muc_municipality, muc_active_stat, muc_timestamp) VALUES ('".$fileName."','".$province_name."','".$municipality_name."','".$active_stat."', NOW())");
                      if($insert)
                      {
                          echo "<script type=\"text/javascript\">".
                                   "alert
                                   ('You have successfully added a UI set!');".
                                  "</script>";
                          echo "<script>setTimeout(\"location.href = '../views/set_master_ui.php';\",0);</script>";
                          //$statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                      }
                      else
                      {   

                          echo "<script type=\"text/javascript\">".
                                   "alert
                                   ('Saving failed, please try again.');".
                                  "</script>";
                          echo "<script>setTimeout(\"location.href = '../views/set_master_ui.php';\",0);</script>";
                          //$statusMsg = "File upload failed, please try again.";
                      } 
                  }
                  else
                  {   

                      echo "<script type=\"text/javascript\">".
                               "alert
                               ('Sorry, there was an error saving your entry.');".
                              "</script>";
                      echo "<script>setTimeout(\"location.href = '../views/set_master_ui.php';\",0);</script>";
                      //$statusMsg = "Sorry, there was an error uploading your file.";
                  }
              }
              else
              {
                  echo "<script type=\"text/javascript\">".
                           "alert
                           ('Sorry, only PNG and JPG files are allowed to upload.');".
                          "</script>";
                  echo "<script>setTimeout(\"location.href = '../views/set_master_ui.php';\",0);</script>";
                  //$statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
              }
          }   
          else
          {   
              echo "<script type=\"text/javascript\">".
                       "alert
                       ('Please select a file to upload.');".
                      "</script>";
              echo "<script>setTimeout(\"location.href = '../views/set_master_ui.php';\",0);</script>";
             // $statusMsg = 'Please select a file to upload.';
          }

          // Display status message
          //echo $statusMsg;
        }


        function upload_reference()
        {
          // Include the database configuration file
          // Database configuration
          $dbHost     = "localhost";
          $dbUsername = "root";
          $dbPassword = "";
          $dbName     = "upds_v1";

          // Create database connection
          $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

          // Check connection
          if ($db->connect_error) {
              die("Connection failed: " . $db->connect_error);
          }

          $statusMsg = '';

          // File upload path
          $targetDir = "C:/xampp/htdocs/UPDS_V.1.0/resources/uploads/";
          $fileName = basename($_FILES["file"]["name"]);
          $targetFilePath = $targetDir . $fileName;
          $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

          if(isset($_POST["upload_reference"]) && !empty($_FILES["file"]["name"]))
          {
              // Allow certain file formats
              $allowTypes = array('doc','docx','xlsx','csv','pdf');
              if(in_array($fileType, $allowTypes))
              {
                  // Upload file to server
                  if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
                  {
                      // Insert image file name into database
                      $insert = $db->query("INSERT into r_references (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
                      if($insert)
                      {
                          echo "<script type=\"text/javascript\">".
                                   "alert
                                   ('You have successfully uploaded a file!');".
                                  "</script>";
                          echo "<script>setTimeout(\"location.href = '../views/set_reference.php';\",0);</script>";
                          $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                      }
                      else
                      {   

                          echo "<script type=\"text/javascript\">".
                                   "alert
                                   ('File upload failed, please try again.');".
                                  "</script>";
                          echo "<script>setTimeout(\"location.href = '../views/set_reference.php';\",0);</script>";
                          $statusMsg = "File upload failed, please try again.";
                      } 
                  }
                  else
                  {   

                      echo "<script type=\"text/javascript\">".
                               "alert
                               ('Sorry, there was an error uploading your file.');".
                              "</script>";
                      echo "<script>setTimeout(\"location.href = '../views/set_reference.php';\",0);</script>";
                      $statusMsg = "Sorry, there was an error uploading your file.";
                  }
              }
              else
              {
                  echo "<script type=\"text/javascript\">".
                           "alert
                           ('Sorry, only DOC, DOCX, XLSX, CSV, & PDF files are allowed to upload.');".
                          "</script>";
                  echo "<script>setTimeout(\"location.href = '../views/set_reference.php';\",0);</script>";
                  $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
              }
          }
          else
          {   
              echo "<script type=\"text/javascript\">".
                       "alert
                       ('Please select a file to upload.');".
                      "</script>";
              echo "<script>setTimeout(\"location.href = '../views/set_reference.php';\",0);</script>";
              $statusMsg = 'Please select a file to upload.';
          }

          // Display status message
          //echo $statusMsg;
        }
      
?>


