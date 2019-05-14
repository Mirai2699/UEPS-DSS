<?php
    include('../../../db_con.php');

       if(isset($_POST['upload_reference']))
        {
          upload_reference();
        }
        else if(isset($_POST['update_UI_stat']))
        {
          update_UI_status();
        }

        function update_UI_status()
        {
          include('../../../db_con.php');
          $muc_ID = $_POST['muc_ID'];
          $muc_stat = $_POST['muc_status'];


          if($muc_stat == 'Active')
          {
            $update = "UPDATE `master_ui_change` SET  muc_active_stat = '$muc_stat' 
                                              WHERE muc_ID = '$muc_ID'";
            $update_disable = "UPDATE `master_ui_change` SET  muc_active_stat = 'Disabled' WHERE muc_ID != '$muc_ID'";

             mysqli_query($connection,$update);
             mysqli_query($connection,$update_disable);
          }
          else if($muc_stat == 'Disabled')
          {
            $update_disable = "UPDATE `master_ui_change` SET  muc_active_stat = '$muc_stat' WHERE muc_ID = '$muc_ID'";
            mysqli_query($connection,$update_disable);
          }
         
           echo "<script type=\"text/javascript\">".
                    "alert
                    ('You have successfully change the UI set!');".
                   "</script>";
           echo "<script>setTimeout(\"location.href = '../views/set_master_ui.php';\",0);</script>";
        }
    
?>


