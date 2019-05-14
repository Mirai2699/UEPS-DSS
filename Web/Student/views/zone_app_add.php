
    <title>Create Zoning Application | MUPDS</title>
<?php
    
    include("../utilities/Header.php");
   // include("../utilities/Notification.php");
    include("../utilities/navibar.php");
    include("../utilities/BaseJs.php");
    include("../utilities/Charts.php");
?>
     
        
        <!-- begin #content -->
        <div id="content" class="content">
            <!-- begin breadcrumb -->
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
                    <li class="breadcrumb-item active">Create Application</li>
                </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
                <h1 class="page-header">Create Zoning Application</h1>
            <!-- end page-header -->
            <!--Line Divider-->
                <div class="row" style="padding: 1px; background-color: #262626; margin-bottom: 20px"></div>
            <!--Line Divider-->


            <!-- START CUSTOM CONTENT-->
            <!--FIRST PART-->
            <div class="panel panel-inverse">
                <div class="panel-heading" style="background-color: #004d4d">
                    <h2 class="panel-title" style="margin: 10px">
                        <i class="fa fa-tasks"></i>&nbsp;&nbsp;&nbsp;Creating an Application for Zoning Issuance
                    </h2>
                </div>
                <form action="../functionalities/manage_zone_application.php" method="POST">
                    <div class="panel-body">
                      <div class="col-md-12">
                          <div class="panel">
                                <!--Applicants Information-->
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-md-12">
                                    <h4>Applicant's Information</h4>
                                    <div class="row" style="background-color: #262626; padding: 1px; margin-bottom: 10px"></div>
                                    </div>
                                    <div class="col-md-4">
                                      <label>Applicant's Name</label>
                                      <select name="za_app_name" required class="form-control" style="color: black">
                                        <?php
                                          
                                          $view_query1 = mysqli_query($connection,"SELECT * FROM `t_applicants` WHERE app_active_status = 'Active' ORDER BY app_ID DESC");
                                          while($row = mysqli_fetch_assoc($view_query1))
                                          {
                                              $app_ID = $row["app_ID"];
                                              $app_lname = $row["app_lastname"];
                                              $app_mname = $row["app_middlename"];
                                              $app_fname = $row["app_firstname"];

                                              $compname = $app_lname.', '.$app_fname;
                                        ?>
                                        <option value="<?php echo $app_ID ?>"><?php echo $compname?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                    <div class="col-md-4">
                                      <label>Company's Name</label>
                                      <input type="text" class="form-control" name="za_company_name" required/>
                                    </div>
                                    <div class="col-md-4">
                                      <label>Company's Address</label>
                                      <input type="text" class="form-control" name="za_company_add" required/>
                                    </div>
                               </div>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-md-4">
                                      <label>Name of Authorized Personnel</label><small> (Optional)</small>
                                      <input type="text" class="form-control" name="za_auth_name" />
                                    </div>
                                    <div class="col-md-4">
                                      <label>Address of Authorized Personnel</label><small> (Optional)</small>
                                      <input type="text" class="form-control" name="za_auth_add" />
                                    </div>
                               </div>
                               <!--Applicants Information-->
                            
                                <!--Project Information-->
                                <div class="row" style="margin-top: 30px">
                                    <div class="col-md-12">
                                    <h4>Project Application Information</h4>
                                    <div class="row" style="background-color: #262626; padding: 1px; margin-bottom: 10px"></div>
                                    </div>
                                    <div class="col-md-2">
                                      <label>Project Type</label>
                                      <input type="text" class="form-control" name="za_project_type" required/>
                                    </div>
                                    <div class="col-md-4" style="border: 1px solid">
                                      <label>Project Nature</label><br>
                                      <div class="radio radio-css radio-inline">
                                        <input type="radio" id="za_pn_newdev" name="za_project_nature" value="New Development" required/>
                                        <label for="za_pn_newdev">New Development</label>
                                      </div>
                                      <div class="radio radio-css radio-inline">
                                        <input type="radio" id="za_pn_forimprv" name="za_project_nature" value="For Improvement" required/>
                                        <label for="za_pn_forimprv">For Improvement</label>
                                      </div>
                                      <br>
                                      <div class="radio radio-css radio-inline">
                                        <input type="radio" id="za_pn_others" name="za_project_nature" value="Others" required/>
                                        <label for="za_pn_others">Others</label>
                                      </div>
                                    </div>
                                    <div class="col-md-1">
                                      <label>Number</label>
                                      <input type="text" class="form-control" name="za_loc_number" required/>
                                    </div>
                                    <div class="col-md-2">
                                      <label>Street</label>
                                      <input type="text" class="form-control" name="za_loc_street" required/>
                                    </div>
                                    <div class="hidden">
                                      <label>Municipal Location</label>
                                      <input type="hidden" class="form-control" name="za_loc_munic" required value="2"/>
                                      <!-- <select name="za_loc_munic" required class="form-control" style="color: black">
                                        <option value="" selected disabled>-- Select Municipality-- </option>
                                        <?php
                                          
                                          $get_munic = mysqli_query($connection,"SELECT * FROM `r_municipality` WHERE munic_stat = 'Active'");
                                          while($row = mysqli_fetch_assoc($get_munic))
                                          {
                                              $munic_ID = $row["munic_ID"];
                                              $munic_name = $row["munic_name"];
                                        ?>
                                        <option value="<?php echo $munic_ID ?>"><?php echo $munic_name?></option>
                                        <?php } ?>
                                      </select> -->
                                    </div>
                                    <div class="col-md-3">
                                      <label>Barangay Location</label>
                                      <select name="za_loc_brgy" required class="form-control" style="color: black">
                                        <option value="" selected disabled>-- Select Barangay-- </option>
                                        <?php
                                          
                                          $get_brgy = mysqli_query($connection,"SELECT * FROM `r_barangay` WHERE brgy_stat = 'Active'
                                            and brgy_municipality = 2");
                                          while($row = mysqli_fetch_assoc($get_brgy))
                                          {
                                              $brgy_ID = $row["brgy_ID"];
                                              $brgy_name = $row["brgy_name"];
                                        ?>
                                        <option value="<?php echo $brgy_ID ?>"><?php echo $brgy_name?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                    <input type="hidden" name="za_loc_province" value="Batangas" required="">
                               </div>
                                <div class="row" style="margin-top: 20px">
                                    <div class="col-md-2">
                                      <label>Project Area (Sq. M)</label>
                                      <input type="text" class="form-control" name="za_project_area" required/>
                                    </div>
                                    <div class="col-md-3" style="border: 1px solid">
                                      <label>Right Over Land</label><br>
                                      <div class="radio radio-css radio-inline">
                                        <input type="radio" id="za_rol_owner" name="za_right_overland" value="Owner" required/>
                                        <label for="za_rol_owner">Owner</label>
                                      </div>
                                      <div class="radio radio-css radio-inline">
                                        <input type="radio" id="za_rol_lease" name="za_right_overland" value="Lease" required/>
                                        <label for="za_rol_lease">Lease</label>
                                      </div>
                                      <div class="radio radio-css radio-inline">
                                        <input type="radio" id="za_rol_others" name="za_right_overland" value="Others" required/>
                                        <label for="za_rol_others">Others</label>
                                      </div>
                                    </div>
                                    <div class="col-md-3" style="border: 1px solid">
                                      <label>Project Tenure</label><br>
                                      <div class="radio radio-css radio-inline">
                                        <input type="radio" id="za_projten_permn" name="za_project_tenure" value="Permanent" required/>
                                        <label for="za_projten_permn">Permanent</label>
                                      </div>
                                      <div class="radio radio-css radio-inline">
                                        <input type="radio" id="za_projten_temp" name="za_project_tenure" value="Temporary" required/>
                                        <label for="za_projten_temp">Temporary</label>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <label>(If temporary, specify years)</label>
                                      <input type="text" class="form-control" name="za_pt_temp_years" />
                                    </div>
                                    <div class="col-md-2">
                                      <label>Existing Land Uses of the Site</label>
                                      <select name="za_exist_landuse" required class="form-control" style="color: black">
                                        <option value="" selected disabled> -- Select Land Use -- </option>
                                        <?php
                                          
                                          $view_query1 = mysqli_query($connection,"SELECT * FROM `r_land_use` WHERE lu_active_status = 'Active' ");
                                          while($row = mysqli_fetch_assoc($view_query1))
                                          {
                                              $lu_ID = $row["lu_ID"];
                                              $lu_desc = $row["lu_desc"];

                                        ?>
                                        <option value="<?php echo $lu_ID ?>"><?php echo $lu_desc?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                               </div>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-md-3" style="border: 1px solid">
                                      <label>Tenancy Status</label><br>
                                      <div class="radio radio-css radio-inline">
                                        <input type="radio" id="za_tenancy_tenanted" name="za_tenancy" value="Tenanted"/>
                                        <label for="za_tenancy_tenanted">Tenanted</label>
                                      </div>
                                      <div class="radio radio-css radio-inline">
                                        <input type="radio" id="za_tenancy_nontenanted" name="za_tenancy" value="Non-Tenanted"/>
                                        <label for="za_tenancy_nontenanted">Non-Tenanted</label>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <label>Project Cost/Capitalization</label><small> (In Pesos, type in figures)</small>
                                      <input type="number" class="form-control" name="za_project_cost_figure" min="1" />
                                    </div>
                                    <div class="col-md-4">
                                      <label>Project Cost/Capitalization</label><small> (In Pesos, type in words)</small>
                                      <input type="text" class="form-control" name="za_project_cost_word" />
                                    </div>
                               </div>
                               <!--Project Information-->


                                <!--Application History Information-->
                                <div class="row" style="margin-top: 30px">
                                    <div class="col-md-12">
                                            <h4>Application History Information</h4>
                                            <div class="row" style="background-color: #262626; padding: 1px; margin-bottom: 10px"></div>
                                    </div>

                                    <div class="col-md-6">
                                      <p style="font-size: 16px; text-align: justify; color: black">
                                       &nbsp;&nbsp;&nbsp; Is the project applied for the subject of written notice(s) from the commission and/or its deputized zoning
                                      administrator to the effect requiring for presentation of locational clearance certificate of zoning compliane (LC/CZC)
                                      or to apply for LC/CZC? </p>
                                      <div class="radio radio-css radio-inline">
                                        <input type="radio" id="za_lcczc_yes" name="za_lzczc_stat" value="Yes" required/>
                                        <label for="za_lcczc_yes">Yes</label>
                                      </div>
                                      <div class="radio radio-css radio-inline">
                                        <input type="radio" id="za_lzczc_no" name="za_lzczc_stat" value="No" required/>
                                        <label for="za_lzczc_no">No</label>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <p style="color: black; font-size: 16px">If yes, answer the following:</p>
                                      <label>A.) Name of the HRLB Officer or Zoning Administrator who issued the notice(s):</label>
                                      <input type="text" class="form-control" name="za_lzczc_yes_names"/>
                                      <label>B.) Date(s) of Notice(s):</label><small> (Put coma in between if more than 1)</small>
                                      <input type="text" class="form-control" name="za_lzczc_yes_dates"/>
                                      <label>C.) Order/Request  indicated in the notice(s):</label><small> (Put coma in between if more than 1)</small>
                                      <input type="text" class="form-control" name="za_lzczc_yes_notices"/>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="row" style="background-color: #6e6e6e; padding: 1px; margin-bottom: 10px; margin-top:10px"></div>
                                    </div>

                                    <div class="col-md-6">
                                      <p style="font-size: 16px; text-align: justify; color: black">
                                       &nbsp;&nbsp;&nbsp; Is the project applied for the subject of similar application(s) with other office of the commission
                                       and/or deputized by zoning administrator? </p>
                                      <div class="radio radio-css radio-inline">
                                        <input type="radio" id="za_simapp_yes" name="za_similar_app" value="Yes" required/>
                                        <label for="za_simapp_yes">Yes</label>
                                      </div>
                                      <div class="radio radio-css radio-inline">
                                        <input type="radio" id="za_simapp_no" name="za_similar_app" value="No" required/>
                                        <label for="za_simapp_no">No</label>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <p style="color: black; font-size: 16px">If yes, answer the following:</p>
                                      <label>A.) Other HLRB office where similar applications were filled:</label>
                                      <input type="text" class="form-control" name="za_simapp_yes_officers"/>
                                      <label>B.) Date Filled:</label>
                                      <input type="text" class="form-control" name="za_simapp_yes_dates"/>
                                      <label>C.) Action taken by mention in:</label>
                                      <input type="text" class="form-control" name="za_simapp_yes_actions"/>
                                    </div>
                                </div>
                                <!---Application history Information-->

                                <!-- Delivery Method Preferrability-->
                                <div class="col-md-12" style="margin-top: 20px">
                                    <h4>Choosing the Delivery Method</h4>
                                    <div class="row" style="background-color: #262626; padding: 1px; margin-bottom: 10px"></div>
                                </div>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-md-4">
                                        <label>Preferred Mode of Release of Decision:</label>
                                        <div class="radio radio-css radio-inline">
                                          <input type="radio" id="Rel_dec_pickup" name="za_release_decision" value="Pick-Up" required/>
                                          <label for="Rel_dec_pickup">Pick-Up</label>
                                        </div>
                                        <div class="radio radio-css radio-inline">
                                          <input type="radio" id="Rel_dec_mail" name="za_release_decision" value="By Snail Mail" required/>
                                          <label for="Rel_dec_mail">By Snail Mail</label>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>If mail, address to:</label><br>
                                        <select name="za_rel_dec_mail_add" class="form-control">
                                          <option value="" selected readonly> -- Select Addresse -- </option>
                                          <option value="Applicant">Applicant</option>
                                          <option value="Authorized Personnel">Authorized Personnel</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Delivery Method Preferrability-->
                               <div class="row" style="margin-top: 10px">
                                     <div class="col-md-12" style="text-align: right">
                                        <a href="#confirmation" data-toggle="modal" class="btn btn-success" style="font-size: 16px; margin-top: 10px">
                                            <i class="fa fa-paper-plane"></i>&nbsp;&nbsp;
                                            Submit Application
                                        </a>
                                     </div>
                               </div>
                          </div>
                      </div>
                    </div>
                    <!--MODAL-->
                    <div class="modal fade" id="confirmation">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <center>
                                    <div class="modal-header" style="background-color: green;">
                                        <h4 class="modal-title" style="color: white">Submit Form Confirmation</h4>
                                        
                                    </div>
                                    <div class="modal-body" style="text-align: justify;">
                                        <p>
                                            &nbsp;&nbsp;&nbsp;By submitting this form, the information filled-in in this form will be subject to evaulation by the mapping officer and the municipal project developement coordinator for approval. Further notices regarding to this matter will be announced through the admin officer of the municipality<br><br>
                                            &nbsp;&nbsp;&nbsp;Changing details of this form after submission shall only be allowed if the applicant gives the permission to do so.<br><br>
                                            &nbsp;&nbsp;&nbsp;Are you sure you want proceed?<br>
                                            
                                        </p>
                                    </div>
                                    <div class="modal-footer" style="text-align: center">
                                        <button type="submit" class="btn btn-success" name="add_zone_app"> Yes, Proceed to Submission.</button>
                                        <button type="submit" class="btn btn-warning"  data-dismiss="modal">Wait, Let me review it again.</button>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                    <!--MODAL-->
                </form>
                <!--FIRST PART-->
               
            <!-- END CUSTOM CONTENT -->


        </div>
        <!-- end #content -->
        
    </div>
    <!-- end page container -->
    

   </body>
</html>
<!-- ======= ON PAGE SCRIPT ======== -->
<script>
    $(document).ready(function() { 
        App.init();
    });
</script>
<!-- ======= ON PAGE SCRIPT ======== -->



       
              
              

              
              
            