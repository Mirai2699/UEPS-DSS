<table id="data-table-default" class="table table-striped table-bordered">
  <thead>
  <tr>
      <th class="hidden">ID</th>
      <th>Condition Type</th>
      <th>Condition Description</th>
      <th>Municipality</th>
      <th>Date Last Modified</th>
      <th style="text-align: center">Action</th>
  </tr>
  </thead>
  <tbody>
  <?php
      $view_query = mysqli_query($connection,"SELECT * FROM `r_zoning_conditions` AS ZC
                                              LEFT JOIN `r_municipality` AS MUNIC
                                              ON ZC.zc_municipality = MUNIC.munic_ID
                                              ORDER BY zc_ID ASC");
      while($row = mysqli_fetch_assoc($view_query))
      {
          $zc_ID = $row["zc_ID"];
          $zc_type = $row["zc_type"];
          $zc_desc = $row["zc_desc"];
          $zc_stat = $row["zc_stat"];
          $zc_municipality = $row["munic_name"];
          $zc_timestamp = new datetime($row["zc_timestamp"]); 
          
          $new_date = $zc_timestamp->format('F d, Y');
  ?>      
      <tr class="gradeX">
          <td class="hidden"><?php echo $zc_ID; ?></td>
          <td width=""><?php echo $zc_type; ?></td>
          <td width=""><?php echo $zc_desc; ?></td>
          <td width=""><?php echo $zc_municipality; ?></td>
          <td width=""><?php echo $new_date; ?></td>
          <td style="text-align:center">
            <a href="#modify<?php echo $zc_ID ?>" data-toggle="modal" class="btn btn-warning" title="Edit Details">
              <i class="fa fa-edit"></i>&nbsp;
              Edit
            </a>
          </td>
      </tr>  
  <?php } ?>
  </tbody>                                 
</table>