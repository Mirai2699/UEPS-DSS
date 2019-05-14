<?php
    $view_query = mysqli_query($connection,"SELECT * FROM `r_barangay` AS BRGY
                                                 INNER JOIN `r_municipality` AS MUNIC
                                                 ON BRGY.brgy_municipality = MUNIC.munic_ID
                                           WHERE BRGY.brgy_stat = 'Active' ");

    while($row1 = mysqli_fetch_assoc($view_query))
    {
        $ID = $row1["brgy_ID"];
        $brgy_name = $row1["brgy_name"];
        $brgy_PSGC = $row1["brgy_PSGC"];
        $brgy_municipality = $row1["brgy_municipality"];
        $brgy_stat = $row1["brgy_stat"];
        $brgy_timestamp = $row1["brgy_timestamp"];

        $brgy_munic_desc = $row1["munic_name"];
                      
?>  
<div class="modal fade" id="brgy<?php echo $ID ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <center>
                <div class="modal-header" style="background-color: #004d4d;">
                    <h4 class="modal-title" style="color: white">Modify Details</h4>
                </div>
                <form action="../functionalities/manage_barangay.php" method="POST">
                  <input type="hidden" name="brgy_ID" value="<?php echo $ID?>" />
                  <div class="modal-body" style="text-align: justify; font-size: 16px">
                      <div class="panel">  
                          <div class="row" style="margin-top: 20px">
                            <div class="col-md-6">
                              <label>Barangay Name:</label>
                              <input type="text" class="form-control" name="brgy_name" required value="<?php echo $brgy_name; ?>" />
                            </div>
                            <div class="col-md-6">
                              <label>Municipality</label>
                              <select name="brgy_munic" required class="form-control">
                                <option value="<?php echo $brgy_municipality; ?>" selected readonly><?php echo $brgy_munic_desc; ?> (Selected) </option>
                                <?php
                                  
                                  $view_query1 = mysqli_query($connection,"SELECT * FROM `r_municipality` WHERE munic_stat = 'Active' ");
                                  while($row = mysqli_fetch_assoc($view_query1))
                                  {
                                      $munic_ID = $row["munic_ID"];
                                      $munic_name = $row["munic_name"];
                                ?>
                                <option value="<?php echo $munic_ID ?>"><?php echo $munic_name?></option>
                                <?php } ?>
                              </select>
                            </div>
                            
                          </div>
                          <div class="row" style="margin-top: 20px">
                            <div class="col-md-8">
                              <label>Philippine Standard Geographic Code:</label>
                              <input type="text" class="form-control" name="brgy_PSGC" required value="<?php echo $brgy_PSGC; ?>" />
                            </div>
                          </div>
                      </div>                           
                  </div>
                  <div class="modal-footer" style="text-align: center">
                      <div class="col-md-12" style="text-align: right; ">
                          <button type="submit" class="btn btn-success" name="save_modify_details" style="font-size:13px">
                              <i class="fa fa-save"></i>
                               Save 
                          </button>
                          <button type="submit" class="btn btn-danger" style="font-size:13px" data-dismiss="modal">
                              <i class="fa fa-times"></i>
                               Cancel
                          </button>
                      </div>
                  </div>
                
              </form>
            </center>
        </div>
    </div>
</div>
<?php } ?>