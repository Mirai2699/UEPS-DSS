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


      $total_project = "SELECT * FROM `t_project_development` ";
      if ($project_result = mysqli_query($connection,$total_project))
      {
        // Return the number of rows in result set
        $disp_project_result = mysqli_num_rows($project_result);
        
      }
      else
      { 
        $disp_project_result = 0;
      }

      $total_project_pm = "SELECT * FROM `t_project_development` WHERE  month(projdev_timestamp) = '$currmonth'";
      if ($project_result_pm = mysqli_query($connection,$total_project_pm))
      {
        // Return the number of rows in result set
        $disp_project_result_pm = mysqli_num_rows($project_result_pm);
        
      }
      else
      { 
        $disp_project_result_pm = 0;
      }




      $total_issues = "SELECT * FROM `t_zoning_issuance`";
      if ($issues_result = mysqli_query($connection,$total_issues))
      { 
        $total_collection = 0;
        while($row = mysqli_fetch_assoc($issues_result))
        {
          $payment = $row["zi_pay_amount"];
          $total_collection = $total_collection + $payment;

        }

        // Return the number of rows in result set
        $disp_issues_result = mysqli_num_rows($issues_result);
        
      }
      else
      { 
        $disp_issues_result = 0;
      }

      $total_issues_pm = "SELECT * FROM `t_zoning_issuance` WHERE month(zi_timestamp) = '$currmonth'";
      if ($issues_result_pm = mysqli_query($connection,$total_issues_pm))
      { 
        $total_collection_pm = 0;
        while($row_pm = mysqli_fetch_assoc($issues_result_pm))
        {
          $payment_pm = $row_pm["zi_pay_amount"];
          $total_collection_pm = $total_collection_pm + $payment_pm;

        }
        // Return the number of rows in result set
        $disp_issues_result_pm = mysqli_num_rows($issues_result_pm);
        
      }
      else
      { 
        $disp_issues_result_pm = 0;
      }

     
  ?>  