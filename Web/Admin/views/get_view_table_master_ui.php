<table id="data-table-default" class="table table-striped table-bordered">
  <thead>
  <tr>
      <th class="hidden">ID</th>
      <th>Province Name</th>
      <th>Municipality Name</th>
      <th>Logo File Name</th>
      <th style="text-align: center">Status</th>
      <th style="text-align: center">Action</th>
  </tr>
  </thead>
  <tbody>
  <?php
      $view_query = mysqli_query($connection,"SELECT * FROM `master_ui_change`");
      while($row = mysqli_fetch_assoc($view_query))
      {
          $muc_ID = $row["muc_ID"];
          $muc_logo = $row["muc_logo"];
          $muc_province = $row["muc_province"];
          $muc_munic = $row["muc_municipality"];
          $muc_active_stat = $row["muc_active_stat"]; 
          $muc_timestamp = $row["muc_timestamp"];

          echo
          '
            <tr class="gradeX">
                <td class="hidden">'.$muc_ID.'</td>
                <td width="">'.$muc_province.'</td>
                <td width="">'.$muc_munic.'</td>
                <td width="">'.$muc_logo.'</td>
           ';
           if($muc_active_stat == 'Active')
           {
            echo ' <td style="background-color: #00ff99; text-align: center; color: black">'.$muc_active_stat.'</td>';
           }
           else if($muc_active_stat == 'Disabled')
           {
            echo ' <td style="background-color: #ff9999; text-align: center; color: black">'.$muc_active_stat.'</td>';
           }
           echo'
                <td style="text-align:center; width: 25%">
                  <a data-toggle="modal" href="#" class="btn btn-warning">
                    <i class="fa fa-edit"></i>
                    Modify
                  </a>
                  &nbsp;
                   <a data-toggle="modal" href="#toggle_stat'.$muc_ID.'" class="btn btn-danger">
                    <i class="fa fa-sync"></i>
                    Toggle Status
                  </a>
                </td>
            </tr>  
          ';
      }
  ?>      
  </tbody>                                 
</table>
<?php
    $view_query = mysqli_query($connection,"SELECT * FROM `master_ui_change` ");
    while($row = mysqli_fetch_assoc($view_query))
    {
        $muc_ID = $row["muc_ID"];
?>
<div class="modal fade" id="toggle_stat<?php echo $muc_ID?>">
    <div class="modal-dialog" >
        <div class="modal-content">
            <center>
                <div class="modal-header" style="background-color: #ff4d4d;">
                    <h4 class="modal-title" style="color: white; text-align: center">Toggle Status</h4>
                </div>
                <form action="../functionalities/update_func.php" method="POST">
                <input type="hidden" name="muc_ID" value="<?php echo $muc_ID;?>">
                <div class="modal-body" style="text-align: justify; font-size: 16px">
                  <p style="text-align: center">
                    By changing the active status of the UI set, the system's configuration in terms of UI will change depending on the selected UI set. 
                    <br>
                    Are you sure you want to proceed?
                  </p>
                  <center>
                  <label>Select Status:</label>
                    <select class="form-control" name="muc_status" style="width:50%; font-size: 15px">
                      <option value="Active" selected="">Active</option>
                      <option value="Disabled">Disable</option>
                    </select>
                  </center>
                </div>

                <div class="modal-footer" style="text-align: center">
                    <div class="col-md-12" style="text-align: center; ">
                        <button type="submit" class="btn btn-success" name="update_UI_stat" style="font-size:13px">
                            <i class="fa fa-check"></i>
                            Yes
                        </button>
                        <button type="submit" class="btn btn-danger" style="font-size:13px" data-dismiss="modal">
                            <i class="fa fa-times"></i>
                             No
                        </button>
                    </div>
                </div>

            </center>
        </div>
    </div>
</div>
<?php } ?>
