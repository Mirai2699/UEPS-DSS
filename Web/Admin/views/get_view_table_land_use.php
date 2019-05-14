<table id="data-table-default" class="table table-striped table-bordered">
  <thead>
  <tr>
      <th class="hidden">ID</th>
      <th>Description</th>
      <th>Layer Color</th>
      <th>Date & Timestamp</th>
      <th style="text-align: center">Action</th>
  </tr>
  </thead>
  <tbody>
  <?php
      $view_query = mysqli_query($connection,"SELECT * FROM `r_land_use` WHERE lu_active_status = 'Active' ");
      while($row = mysqli_fetch_assoc($view_query))
      {
          $ID = $row["lu_ID"];
          $lu_desc = $row["lu_desc"];
          $lu_color = $row["lu_color"];
          $lu_active_status = $row["lu_active_status"];
          $lu_mod_timestamp = $row["lu_mod_timestamp"];
                      
  ?>      
      <tr class="gradeX">
          <td class="hidden"><?php echo $ID; ?></td>
          <td width=""><?php echo $lu_desc ?></td>
          <td width=""><span style="width:20%;background:<?php echo $lu_color ?>"><?php echo $lu_color ?></span></td>
          <td width=""><?php echo $lu_mod_timestamp; ?></td>
          <td style="text-align:center">
            <a href="" class="btn btn-warning">
              <i class="fa fa-edit"></i>
              Edit
            </a>
          </td>
      </tr>  
  <?php } ?>
  </tbody>                                 
</table>  