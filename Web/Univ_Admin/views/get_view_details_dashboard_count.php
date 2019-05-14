 <?php
  
  // collective count (in total)  
      $get_pending = "SELECT * FROM `t_zoning_application` WHERE za_app_status = 'PENDING' ";
      if ($pending_result = mysqli_query($connection,$get_pending))
      {
        // Return the number of rows in result set
        $count_pending = mysqli_num_rows($pending_result);
        
      }
      else
      { 
        $count_pending = 0;
      }

      $get_forrevision = "SELECT * FROM `t_zoning_application` WHERE za_app_status = 'REVISION' ";
      if ($forrevision_result = mysqli_query($connection,$get_forrevision))
      {
        // Return the number of rows in result set
        $count_forrevision = mysqli_num_rows($forrevision_result);
        
      }
      else
      { 
        $count_forrevision = 0;
      }

      $get_approved = "SELECT * FROM `t_zoning_application` WHERE za_app_status = 'APPROVED' ";
      if ($approved_result = mysqli_query($connection,$get_approved))
      {
        // Return the number of rows in result set
        $count_approved = mysqli_num_rows($approved_result);
        
      }
      else
      { 
        $count_approved = 0;
      }


      $get_closed = "SELECT * FROM `t_zoning_application` WHERE za_app_status = 'CLOSED' ";
      if ($closed_result = mysqli_query($connection,$get_closed))
      {
        // Return the number of rows in result set
        $count_closed = mysqli_num_rows($closed_result);
        
      }
      else
      { 
        $count_closed = 0;
      }


  //Count per month
      $currmonth = date('m');
      $currmonth_desc = date('F');

      $pm_get_pending = "SELECT * FROM `t_zoning_application` WHERE za_app_status = 'PENDING' and month(za_add_timestamp) = '$currmonth'";
      if ($pm_pending_result = mysqli_query($connection,$pm_get_pending))
      {
        // Return the number of rows in result set
        $pm_count_pending = mysqli_num_rows($pm_pending_result);
        
        
      }
      else
      { 
        $pm_count_pending = 0;
      }

      $pm_get_forrevision = "SELECT * FROM `t_zoning_application` WHERE za_app_status = 'REVISION' and  month(za_add_timestamp) = '$currmonth'";
      if ($pm_forrevision_result = mysqli_query($connection,$pm_get_forrevision))
      {
        // Return the number of rows in result set
        $pm_count_forrevision = mysqli_num_rows($pm_forrevision_result);
        
      }
      else
      { 
        $pm_count_forrevision = 0;
      }

      $pm_get_approved = "SELECT * FROM `t_zoning_application` WHERE za_app_status = 'APPROVED' and  month(za_add_timestamp) = '$currmonth'";
      if ($pm_approved_result = mysqli_query($connection,$pm_get_approved))
      {
        // Return the number of rows in result set
        $pm_count_approved = mysqli_num_rows($pm_approved_result);
        
      }
      else
      { 
        $pm_count_approved = 0;
      }


      $pm_get_closed = "SELECT * FROM `t_zoning_application` WHERE za_app_status = 'CLOSED' and  month(za_add_timestamp) = '$currmonth'";
      if ($pm_closed_result = mysqli_query($connection,$pm_get_closed))
      {
        // Return the number of rows in result set
        $pm_count_closed = mysqli_num_rows($pm_closed_result);
        
      }
      else
      { 
        $pm_count_closed = 0;
      }


     
  ?>  