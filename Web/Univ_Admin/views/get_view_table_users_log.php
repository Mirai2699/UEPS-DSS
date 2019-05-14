<table id="data-table-buttons" class="table table-striped table-bordered">
  <thead>
  <tr>
      <th>Log No.</th>
      <th>Account Username</th>
      <th>Account User Type</th>
      <th>Date of Access</th>
      <th>Time of Access</th>
  </tr>
  </thead>
  <tbody>
  <?php
      $view_query = mysqli_query($connection,"SELECT * FROM `t_users_log` AS LOG 
                                              INNER JOIN `t_user_accounts` AS ACC 
                                              INNER JOIN `r_user_role` AS USR 
                                              ON LOG.log_userID = ACC.acc_ID and
                                              LOG.log_usertype = USR.usr_ID ORDER BY LOG.Log_No DESC");
      while($row = mysqli_fetch_assoc($view_query))
      {
          $No = $row["log_No"];
          $username = $row["acc_username"];
          $userrole = $row["usr_desc"];
          $log_date = new datetime($row["log_datestamp"]);
          $log_time = new datetime($row["log_timestamp"]);

          $new_date = $log_date->format('F d, Y'); 
          $new_time = $log_time->format('h:i a');
          
                      
  ?>      
      <tr class="gradeX">
          <td><?php echo $No; ?></td>
          <td width=""><?php echo $username ?></td>
          <td width=""><?php echo $userrole; ?></td>
          <td width=""><?php echo $new_date; ?></td>
          <td width=""><?php echo $new_time; ?></td>
      </tr>  
  <?php } ?>
  </tbody>                                 
</table>