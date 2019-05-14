<table id="data-table-default" class="table table-striped table-bordered">
  <thead>
  <tr>
      <th class="hidden">ID</th>
      <th>Description</th>
      <th>Date & Timestamp</th>
      <th style="text-align: center">Action</th>
  </tr>
  </thead>
  <tbody>
  <?php
      $view_query = mysqli_query($connection,"SELECT * FROM `r_terrain_hazard` WHERE haz_stat = 'Active' and haz_desc != 'None' ");
      while($row = mysqli_fetch_assoc($view_query))
      {
          $ID = $row["haz_ID"];
          $haz_desc = $row["haz_desc"];
          $haz_status = $row["haz_stat"];
          $haz_timestamp = $row["haz_timestamp"];
                      
  ?>      
      <tr class="gradeX">
          <td class="hidden"><?php echo $ID; ?></td>
          <td width=""><?php echo $haz_desc ?></td>
          <td width=""><?php echo $haz_timestamp; ?></td>
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