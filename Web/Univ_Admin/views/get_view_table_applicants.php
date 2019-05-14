<table id="data-table-default" class="table table-striped table-bordered">
  <thead>
  <tr>
      <th class="hidden">ID</th>
      <th>Name</th>
      <th>Home Address</th>
      <th>Active Status</th>
      <th style="text-align: center">Action</th>
  </tr>
  </thead>
  <tbody>
  <?php
      $view_query = mysqli_query($connection,"SELECT * FROM `t_applicants`");
      while($row = mysqli_fetch_assoc($view_query))
      {
          $ID = $row["app_ID"];
          $app_lname = $row["app_lastname"];
          $app_mname = $row["app_middlename"];
          $app_fname = $row["app_firstname"];
          $app_hadd = $row["app_homeaddress"];

          $app_stat = $row["app_active_status"];
          $app_mod_ts= $row["app_mod_timestamp"];

          $compname = $app_lname.', '.$app_fname;
                      
  ?>      
      <tr class="gradeX">
          <td class="hidden"><?php echo $ID; ?></td>
          <td width=""><?php echo $compname; ?></td>
          <td width=""><?php echo $app_hadd; ?></td>
          <td width=""><?php echo $app_stat; ?></td>
          <td style="text-align:center; width: 15%">
            <a href="" class="btn btn-warning" title="Edit Status">
              <i class="fa fa-edit"></i>
            </a>
            &nbsp;&nbsp;
            <a href="" class="btn btn-danger" title="Toggle Status">
              <i class="fa fa-sync"></i>
            </a>
          </td>
      </tr>  
  <?php } ?>
  </tbody>                                 
</table>