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
      $view_query = mysqli_query($connection,"SELECT * FROM `r_references` WHERE status = 1 ");
      while($row = mysqli_fetch_assoc($view_query))
      {
          $ID = $row["id"];
          $file_name = $row["file_name"];
          $file_date_upload = $row["uploaded_on"];
          $file_status = $row["status"];
          $file_path = '../../../resources/uploads/'.$file_name  
  ?>      
      <tr class="gradeX">
          <td class="hidden"><?php echo $ID; ?></td>
          <td width=""><?php echo $file_name ?></td>
          <td width=""><?php echo $file_date_upload; ?></td>
          <td style="text-align:center">
            <a href="<?php echo $file_path?>" class="btn btn-primary">
              <i class="fa fa-download"></i>
              Download
            </a>
          </td>
      </tr>  
  <?php } ?>
  </tbody>                                 
</table>