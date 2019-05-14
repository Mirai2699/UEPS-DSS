<table id="data-table-default" class="table table-striped table-bordered">
  <thead>
  <tr>
      <th class="hidden">ID</th>
      <th>District Name</th>
      <th>District Current Representative</th>
      <th>Date and time stamp</th>
      <th style="text-align: center">Action</th>
  </tr>
  </thead>
  <tbody>
  <?php
      $view_query = mysqli_query($connection,"SELECT * FROM `r_district` WHERE dstrct_stat = 1 ");
      while($row = mysqli_fetch_assoc($view_query))
      {
          $ID = $row["dstrct_ID"];
          $ds_name = $row["dstrct_name"];
          $ds_rep = $row["dstrct_representative"];
          $ds_timestamp = $row["dstrct_timestamp"];
                      
  ?>      
      <tr class="gradeX">
          <td class="hidden"><?php echo $ID; ?></td>
          <td width=""><?php echo $ds_name ?></td>
          <td width=""><?php echo $ds_rep; ?></td>
          <td width=""><?php echo $ds_timestamp; ?></td>
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