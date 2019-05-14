<table id="data-table-default" class="table table-striped table-bordered">
  <thead>
  <tr>
      <th class="hidden">ID</th>
      <th>File Name</th>
      <th>Date Uploaded</th>
      <th style="text-align: center">Action</th>
  </tr>
  </thead>
  <tbody>
  <?php
      $view_query = mysqli_query($connection,"SELECT * FROM `r_zoning_requirement`");
      while($row = mysqli_fetch_assoc($view_query))
      {
          $rqr_ID = $row["rqrmnt_ID"];
          $rqr_desc = $row["rqrmnt_desc"];
          $rqr_stat = $row["rqrmnt_stat"];
          $rqr_timestamp = $row["rqrmnt_timestamp"];
  ?>      
      <tr class="gradeX">
          <td class="hidden"><?php echo $rqr_ID; ?></td>
          <td width=""><?php echo $rqr_desc ?></td>
          <td width=""><?php echo $rqr_stat; ?></td>
          <td style="text-align:center">
            <a href="#" class="btn btn-warning">
              <i class="fa fa-edit"></i>
              Edit
            </a>
          </td>
      </tr>  
  <?php } ?>
  </tbody>                                 
</table>