
<div class="modal fade" id="conditions">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <center>
                <div class="modal-header" style="background-color: #004d4d;">
                    <h4 class="modal-title" style="color: white">Notice Zoning Conditions on Project Location Municipality</h4>
                </div>
                <p style="color: black; font-size: 15px; text-align: justify; margin: 20px;">
                  &nbsp;&nbsp;&nbsp;
                  With the selected municipality based on the project location preference, these are the possible conditions to be met by issuing the 
                  locational ground clearance, if the municipal planning and development coordinator allows the establishment to be constructed regardless of the 
                  system's evaluation and recommendation.
                </p>
                <table class="table table-striped table-bordered" style="color: black; font-size: 14px">
                  <thead>
                  <tr>
                      <th class="hidden">ID</th>
                      <th>Condition Type</th>
                      <th>Condition Description</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                      $view_query = mysqli_query($connection,"SELECT * FROM `r_zoning_conditions` AS ZC
                                                              LEFT JOIN `r_municipality` AS MUNIC
                                                              ON ZC.zc_municipality = MUNIC.munic_ID
                                                              WHERE zc_municipality = '$za_loc_municipality'
                                                              or zc_municipality = 0
                                                              ORDER BY zc_ID ASC");
                      while($row = mysqli_fetch_assoc($view_query))
                      {
                          $zc_ID = $row["zc_ID"];
                          $zc_type = $row["zc_type"];
                          $zc_desc = $row["zc_desc"];
                          $zc_stat = $row["zc_stat"];
                          $zc_municipality = $row["munic_name"];
                          $zc_timestamp = new datetime($row["zc_timestamp"]); 
                          
                          $new_date = $zc_timestamp->format('F d, Y');
                  ?>      
                      <tr class="gradeX">
                          <td class="hidden"><?php echo $zc_ID; ?></td>
                          <td width="25%"><?php echo $zc_type; ?></td>
                          <td width="75%"><?php echo $zc_desc; ?></td>
                      </tr>  
                  <?php } ?>
                  </tbody>                                 
                </table>
            </center>
            <div class="modal-footer">
              <div class="col-md-12" style="text-align: center">
                <button data-dismiss="modal" class="btn btn-success" style="font-size: 15px; background-color: green">
                  <i class="fa fa-check"></i>&nbsp;
                  Ok, I understand.
                </button>
              </div>
            </div>
        </div>
        
    </div>
</div>