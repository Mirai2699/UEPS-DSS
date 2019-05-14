<table id="data-table-default" class="table table-striped table-bordered">
  <thead>
  <tr>
      <th class="hidden">ID</th>
      <th>Name</th>
      <th>Description</th>
      <th>Date & Timestamp</th>
      <th style="text-align: center">Action</th>
  </tr>
  </thead>
  <tbody>
  <?php
      $view_query = mysqli_query($connection,"SELECT * FROM `r_infrastructures` ");
      while($row = mysqli_fetch_assoc($view_query))
      {
          $ID = $row["inf_id"];
          $inf_name = $row["inf_name"];
          $inf_desc = $row["inf_desc"];
          $inf_timestamp = $row["created_at"];
                      
  ?>      
      <tr class="gradeX">
          <td class="hidden"><?php echo $ID; ?></td>
          <td width=""><?php echo $inf_name ?></td>
          <td width=""><?php echo $inf_desc ?></td>
          <td width=""><?php echo $inf_timestamp; ?></td>
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