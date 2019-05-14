<table id="data-table-default" class="table table-striped table-bordered">
  <thead>
  <tr>
      <th class="hidden">ID</th>
      <th>Name</th>
      <th>PSGC</th>
      <th>Municipality</th>
      <th>Date & Timestamp</th>
      <th style="text-align: center">Action</th>
  </tr>
  </thead>
  <tbody>
  <?php
      $view_query = mysqli_query($connection,"SELECT * FROM `r_barangay` AS BRGY 
                                                    INNER JOIN `r_municipality` AS MUNIC
                                                    ON BRGY.brgy_municipality = MUNIC.munic_ID
                                              WHERE BRGY.brgy_stat = 'Active' ");
      while($row = mysqli_fetch_assoc($view_query))
      {
          $ID = $row["brgy_ID"];
          $brgy_name = $row["brgy_name"];
          $brgy_PSGC = $row["brgy_PSGC"];
          $brgy_municipality = $row["brgy_municipality"];
          $brgy_stat = $row["brgy_stat"];
          $brgy_timestamp = $row["brgy_timestamp"];

          $brgy_munic_desc = $row["munic_name"];
                      
  ?>      
      <tr class="gradeX">
          <td class="hidden"><?php echo $ID; ?></td>
          <td width=""><?php echo $brgy_name ?></td>
          <td width=""><?php echo $brgy_PSGC; ?></td>
          <td width=""><?php echo $brgy_munic_desc; ?></td>
          <td width=""><?php echo $brgy_timestamp; ?></td>
          <td style="text-align:center; width: 25%">
            <a href="#brgy<?php echo $ID?>" data-toggle="modal" class="btn btn-warning">
              <i class="fa fa-edit"></i>
              Edit
            </a>
            &nbsp;
            <?php
                $get_details = mysqli_query($connection,"SELECT * FROM `r_barangay` AS BRGY 
                                                              INNER JOIN `r_barangay_details` AS BRGY_DET 
                                                              ON BRGY.brgy_ID = BRGY_DET.brgy_det_refID
                                                              INNER JOIN `r_barangay_population` AS BRGY_POP 
                                                              ON BRGY.brgy_ID = BRGY_POP.brgy_pop_refID
                                                        WHERE BRGY.brgy_stat = 'Active' and BRGY.brgy_ID = '$ID'");
                if(mysqli_num_rows($get_details) > 0)
                {

                    echo
                    '
                      <a href="#brgy_detail'.$ID.'" data-toggle="modal" class="btn btn-success">
                        <i class="fa fa-edit"></i>
                        Update Details
                      </a>
                    ';
                }
                else
                {
                  echo 
                  '
                    <a href="#brgy_detail'.$ID.'" data-toggle="modal" class="btn btn-primary">
                      <i class="fa fa-plus"></i>
                      Add Details
                    </a>
                  ';
                }
            ?>     
          </td>
      </tr>  
  <?php } ?>
  </tbody>                                 
</table>  

<?php include("get_view_modal_edit_barangay.php"); ?>
<?php include("get_view_modal_add_barangay_details.php"); ?>