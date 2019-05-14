<table id="data-table-default" class="table table-striped table-bordered">
  <thead>
  <tr>
      <th class="hidden">ID</th>
      <th>App No.</th>
      <th>Decision No.</th>
      <th>Applicant</th>
      <th>Project Location</th>
      <th>Date Issued</th>
      <th style="text-align: center">Action</th>
  </tr>
  </thead>
  <tbody>
  <?php
      $view_query = mysqli_query($connection,"SELECT * FROM `t_zoning_issuance` AS ZI
                                                       INNER JOIN `t_zoning_application` AS ZA
                                                       ON ZI.zi_za_no = ZA.za_no
                                                       INNER JOIN `t_applicants` AS APP 
                                                       ON ZA.za_applicant_ID = APP.app_ID
                                                       INNER JOIN `r_barangay` AS BRGY 
                                                       ON ZA.za_loc_brgy = BRGY.brgy_ID
                                                       ORDER BY ZI.zi_za_no DESC");
      while($row = mysqli_fetch_assoc($view_query))
      {
          $zi_ID = $row["zi_ID"];
          $zi_za_no = $row["zi_za_no"];
          $zi_dec_no  = $row["zi_dec_no"];
          $zi_date_issued = new datetime($row["zi_date_issued"]);
          $app_lname = $row["app_lastname"];
          $app_fname = $row["app_firstname"];
          $compname = $app_lname.', '.$app_fname;

          $brgy_name = $row["brgy_name"];
          $newdate = $zi_date_issued->format('F d, Y');
  ?>      
      <tr class="gradeX">
          <td class="hidden"><?php echo $zi_ID; ?></td>
          <td width=""><?php echo $zi_za_no; ?></td>
          <td width=""><?php echo $zi_dec_no; ?></td>
          <td width=""><?php echo $compname; ?></td>
           <td width="">Brgy.<?php echo $brgy_name; ?></td>
          <td width=""><?php echo $newdate; ?></td>
          <td style="text-align:center">
            <a href="zone_iss_view_details.php?getNo=<?php echo $zi_dec_no?>" class="btn btn-primary " title="Review Details">
              <i class="fa fa-list-alt"></i>&nbsp;
              Review
            </a>
          </td>
      </tr>  
  <?php } ?>
  </tbody>                                 
</table>