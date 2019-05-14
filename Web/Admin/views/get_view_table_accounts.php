<table id="data-table-default" class="table table-striped table-bordered">
  <thead>
  <tr>
      <th class="hidden">ID</th>
      <th>Username</th>
      <th>Email</th>
      <th>User Role</th>
      <th>Status</th>
      <th style="text-align: center">Action</th>
  </tr>
  </thead>
  <tbody>
  <?php
      $view_query = mysqli_query($connection,"SELECT * FROM `t_user_accounts` AS ACC
                                              INNER JOIN `r_user_role` AS USR
                                              ON ACC.acc_user_role = USR.usr_ID");
      while($row = mysqli_fetch_assoc($view_query))
      {
          $ID = $row["acc_ID"];
          $username = $row["acc_username"];
          $email = $row["acc_email"];
          $active_flag = $row["acc_active_flag"];
          $userrole = $row["usr_desc"];
                      
  ?>      
      <tr class="gradeX">
          <td class="hidden"><?php echo $ID; ?></td>
          <td width=""><?php echo $username ?></td>
          <td width=""><?php echo $email; ?></td>
          <td width=""><?php echo $userrole; ?></td>
          <td width=""><?php echo $active_flag; ?></td>
          <td style="text-align:center">
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