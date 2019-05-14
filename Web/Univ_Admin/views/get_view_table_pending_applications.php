<table id="data-table-default" class="table table-striped table-bordered">
  <thead>
  <tr>
      <th class="hidden">ID</th>
      <th>App No.</th>
      <th>Applicant Name</th>
      <th>Project Location</th>
      <th>Current Step</th>
      <th>Application Date</th>
      <th>Approval Date</th>
      <th style="text-align: center">Action</th>
  </tr>
  </thead>
  <tbody>
  <?php
      $view_query = mysqli_query($connection,"SELECT * FROM `t_zoning_application` AS ZA 
                                                INNER JOIN `r_barangay` AS BRGY
                                                ON ZA.za_loc_brgy = BRGY.brgy_ID
                                                INNER JOIN `t_applicants` AS APP
                                                ON ZA.za_applicant_ID = APP.app_ID
                                              WHERE ZA.za_app_status = 'PENDING'
                                              ORDER BY ZA.za_no DESC");
      while($row = mysqli_fetch_assoc($view_query))
      {
          $za_ID = $row["za_ID"];
          $za_no = $row["za_no"];
          $za_app_step = $row["za_app_step"];
          $za_add_timestamp = new datetime($row["za_add_timestamp"]); 
          $za_close_timestamp = new datetime($row["za_close_timestamp"]); 

          $app_lname = $row["app_lastname"];
          $app_fname = $row["app_firstname"];
          $compname = $app_lname.', '.$app_fname;

          $brgy_name = $row["brgy_name"];
          $newdate_start = $za_add_timestamp->format('F d, Y');
          $newdate_close = $za_close_timestamp->format('F d, Y');
  ?>      
      <tr class="gradeX">
          <td class="hidden"><?php echo $ID; ?></td>
          <td width=""><?php echo $za_no; ?></td>
          <td width=""><?php echo $compname; ?></td>
          <td width="">Brgy. <?php echo $brgy_name; ?></td>
          <td width=""><?php echo $za_app_step; ?></td>
          <td width=""><?php echo $newdate_start; ?></td>
          <td width=""><?php echo $newdate_close; ?></td>
          <td style="text-align:center">
            <a href="zone_app_view_details.php?getID=<?php echo $za_ID?>" class="btn btn-primary"  title="Review Details">
              <i class="fa fa-list-alt"></i>&nbsp;
              Review
            </a>
          </td>
      </tr>  
  <?php } ?>
  </tbody>                                 
</table>