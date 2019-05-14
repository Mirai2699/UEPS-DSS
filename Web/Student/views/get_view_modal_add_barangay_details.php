<?php
    $get_details = mysqli_query($connection,"SELECT * FROM `r_barangay` AS BRGY 
                                             WHERE BRGY.brgy_stat = 'Active'");

    while($row = mysqli_fetch_assoc($get_details))
    {
        $ID = $row["brgy_ID"];
                      
?>  
<div class="modal fade" id="brgy_detail<?php echo $ID ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <center>
                <div class="modal-header" style="background-color: #004d4d;">
                    <h4 class="modal-title" style="color: white">Setup Barangay Details</h4>
                </div>
                <form action="../functionalities/manage_barangay.php" method="POST">
                  <input type="hidden" name="brgy_ID" value="<?php echo $ID?>" />
                <?php
                    $get_brgy_det = mysqli_query($connection,"SELECT * FROM `r_barangay` AS BRGY 
                                                              INNER JOIN `r_barangay_details` AS BRGY_DET 
                                                              ON BRGY.brgy_ID = BRGY_DET.brgy_det_refID
                                                              INNER JOIN `r_barangay_population` AS BRGY_POP 
                                                              ON BRGY.brgy_ID = BRGY_POP.brgy_pop_refID
                                                        WHERE BRGY.brgy_ID = '$ID'");
                    if(mysqli_num_rows($get_brgy_det) == 0)
                    {
                        $ID = $get_row["brgy_ID"];
                        

                        echo 
                        '
                          <div class="modal-body" style="text-align: justify; font-size: 16px">
                              <div class="panel">  
                                  <div class="row" style="margin-top: 20px">
                                      <div class="col-md-12">
                                        <label>Barangay Captain:</label>
                                        <input type="text" class="form-control" name="brgy_captain" required />
                                      </div>
                                  </div>
                                  <div class="row" style="margin-top: 20px">
                                    <div class="col-md-4">
                                      <label>Population Count:</label>
                                      <input type="number" class="form-control" name="brgy_population_count" min="1" required />
                                    </div>
                                    <div class="col-md-4">
                                      <label>On Year:</label>
                                      <input type="text" class="form-control" name="brgy_population_year" required />
                                    </div>
                                    <div class="col-md-4">
                                      <label>Growth Rate P/A:</label>
                                      <input type="text" class="form-control" name="brgy_population_per_annum" required />
                                    </div>
                                  </div>
                              </div>                           
                          </div>
                          <div class="modal-footer" style="text-align: center">
                              <div class="col-md-12" style="text-align: right; ">
                                  <button type="submit" class="btn btn-success" name="save_add_details" style="font-size:13px">
                                      <i class="fa fa-save"></i>
                                       Save 
                                  </button>
                                  <button type="submit" class="btn btn-danger" style="font-size:13px" data-dismiss="modal">
                                      <i class="fa fa-times"></i>
                                       Cancel
                                  </button>
                              </div>
                          </div>
                        ';
                    }
                    else
                    
                    while($get_row = mysqli_fetch_assoc($get_brgy_det))
                    {
                        $ID = $get_row["brgy_ID"];
                        $brgy_captain = $get_row["brgy_det_captain"];
                        $brgy_pop_count = $get_row["brgy_pop_count"];
                        $brgy_pop_year = $get_row["brgy_pop_year"];
                        $brgy_pop_per_annum = $get_row["brgy_pop_per_annum"];

                        echo 
                        '
                          <div class="modal-body" style="text-align: justify; font-size: 16px">
                              <div class="panel">  
                                  <div class="row" style="margin-top: 20px">
                                      <div class="col-md-12">
                                         <label>Barangay Captain:</label>
                                        <input type="text" class="form-control" name="brgy_captain" required value="'.$brgy_captain.'"/>
                                      </div>
                                  </div>
                                  <div class="row" style="margin-top: 20px">
                                    <div class="col-md-4">
                                      <label>Population Count:</label>
                                      <input type="number" class="form-control" name="brgy_population_count" min="1" required value="'.$brgy_pop_count.'"/>
                                    </div>
                                    <div class="col-md-4">
                                      <label>On Year:</label>
                                      <input type="text" class="form-control" name="brgy_population_year" required value="'.$brgy_pop_year.'"/>
                                    </div>
                                    <div class="col-md-4">
                                      <label>Growth Rate P/A:</label>
                                      <input type="text" class="form-control" name="brgy_population_per_annum" required value="'.$brgy_pop_per_annum.'"/>
                                    </div>
                                  </div>
                              </div>                           
                          </div>
                          <div class="modal-footer" style="text-align: center">
                              <div class="col-md-12" style="text-align: right; ">
                                  <button type="submit" class="btn btn-success" name="save_update_details" style="font-size:13px">
                                      <i class="fa fa-save"></i>
                                       Save 
                                  </button>
                                  <button type="submit" class="btn btn-danger" style="font-size:13px" data-dismiss="modal">
                                      <i class="fa fa-times"></i>
                                       Cancel
                                  </button>
                              </div>
                          </div>
                        ';
                    }
                                      
                ?>  
               
                
              </form>
            </center>
        </div>
    </div>
</div>
<?php } ?>