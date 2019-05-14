
    <title>View Application's Details | MUPDS</title>
<?php
    
    include("../utilities/Header.php");
   // include("../utilities/Notification.php");
    include("../utilities/navibar.php");
    include("../utilities/BaseJs.php");
    include("../utilities/Table_default.php");

    if (isset($_GET['getID'])) 
    {
        $zapplication_ID = $_GET['getID'];
    }
?>
     
        
        <!-- begin #content -->
        <div id="content" class="content">
            <!-- begin breadcrumb -->
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Manage Pending Applications</a></li>
                    <li class="breadcrumb-item active">View Details</li>
                </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
                <h1 class="page-header">View Application's Details</h1>
            <!-- end page-header -->
            <!--Line Divider-->
                <div class="row" style="padding: 1px; background-color: #262626; margin-bottom: 20px"></div>
            <!--Line Divider-->


            <!-- START CUSTOM CONTENT-->
            <!--2nd Part-->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h2 class="panel-title">Review Zoning Issuance Form</h2>
                </div>
                <div class="panel-body">
                   <!-- begin panel-body -->
                   <?php include("get_view_details_zone_application.php");?>
                   <div class="col-md-12">
                       <div class="panel">
                            <form action="../functionalities/manage_zone_application.php" method="POST">
                                 <input type="hidden" name="za_ID" value="<?php echo $zapplication_ID?>">
                                 <!--Filling Information-->
                                 <div class="row" style="margin-top: 10px; color: black" >
                                     <div class="col-md-12">
                                     <h4><i class="fa fa-file"></i> File Information</h4>
                                     <div class="row" style="background-color: #262626; padding: 1px; margin-bottom: 10px"></div>
                                     </div>
                                     <div class="col-md-3">
                                       <b>Zoning Application No:</b><p><?php echo $za_no;?></p>
                                     </div>
                                     <div class="col-md-3">
                                       <b>Application Date Fiiled:</b><p><?php echo $newdate;?></p>
                                     </div>
                                 </div>
                                 <!--Filling Information-->

                                 <!--Evaluation Status Information-->
                                 <div class="row" style="margin-top: 10px; color: black" >
                                     <div class="col-md-12">
                                     <h4><i class="fa fa-sync"></i> Processing Status</h4>
                                     <div class="row" style="background-color: #262626; padding: 1px; margin-bottom: 10px"></div>
                                     </div>
                                     <div class="col-md-2">
                                       <b>Status:</b><p><?php echo $za_app_status;?></p>
                                     </div>
                                     <div class="col-md-3">
                                       <b>Processing Stage:</b><p><?php echo $za_app_step;?></p>
                                     </div>
                                     <div class="col-md-3">
                                       <b>Current Remarks:</b><p><?php echo $za_app_remarks;?></p>
                                     </div>
                                     <div class="col-md-3">
                                       <b>Mapping Evaluation:</b><p><?php echo $za_app_map_eval;?></p>
                                     </div>
                                 </div>
                                 <!--Evaluation Status Information-->

                                 <!--Applicants Information-->
                                 <div class="row" style="margin-top: 10px">
                                     <div class="col-md-12">
                                     <h4><i class="fa fa-user"></i> Applicant's Information</h4>
                                     <div class="row" style="background-color: #262626; padding: 1px; margin-bottom: 10px"></div>
                                     </div>
                                     <div class="col-md-4">
                                       <label>Applicant's Name</label>
                                       <input type="text" class="form-control" name="za_app_name" disabled style="color:black" value="<?php echo $compname?>">
                                     </div>
                                      <div class="col-md-6">
                                       <label>Applicant's Address</label>
                                       <input type="text" class="form-control" name="za_app_address" disabled style="color:black" value="<?php echo $za_app_address?>">
                                     </div>
                                 </div>
                                 <div class="row" style="margin-top: 10px">
                                     <div class="col-md-4">
                                       <label>Company's Name</label>
                                       <input type="text" class="form-control" name="za_company_name" required value="<?php echo         
                                       $za_name_corporation?>"/>
                                     </div>
                                     <div class="col-md-6">
                                       <label>Company's Address</label>
                                       <input type="text" class="form-control" name="za_company_add" required value="<?php echo 
                                       $za_address_corporation?>"/>
                                     </div>
                                </div>
                                 <div class="row" style="margin-top: 10px">
                                     <div class="col-md-4">
                                       <label>Name of Authorized Personnel</label><small> (Optional)</small>
                                       <input type="text" class="form-control" name="za_auth_name" value="<?php echo $za_name_auth_rep?>"/>
                                     </div>
                                     <div class="col-md-6">
                                       <label>Address of Authorized Personnel</label><small> (Optional)</small>
                                       <input type="text" class="form-control" name="za_auth_add" value="<?php echo $za_address_auth_rep?>"/>
                                     </div>
                                </div>
                                <!--Applicants Information-->
                             
                                 <!--Project Information-->
                                 <div class="row" style="margin-top: 30px">

                                     <div class="col-md-12">
                                     <h4><i class="fa fa-edit"></i> Project Application Information</h4>
                                     <div class="row" style="background-color: #262626; padding: 1px; margin-bottom: 10px"></div>
                                     </div>
                                     <div class="col-md-3">
                                       <label>Project Type</label>
                                       <input type="text" class="form-control" name="za_project_type" required value="<?php echo $za_project_type?>" />
                                     </div>
                                     <div class="col-md-5">
                                       <label>Project Nature</label>
                                       <select name="za_project_nature" class="form-control">
                                           <option value="<?php echo $za_project_nature?>" selected readonly><?php echo $za_project_nature?> (Selected)</option>
                                           <option value="New Development">New Development</option>
                                           <option value="For Improvement">For Improvement</option>
                                           <option value="Others">Others</option>
                                       </select>
                                     </div>
                                 </div>
                                 <div class="row" style="margin-top: 10px">
                                     <div class="col-md-2">
                                       <label>Number</label>
                                       <input type="text" class="form-control" name="za_loc_number" required value="<?php echo $za_loc_number?>" />
                                     </div>
                                     <div class="col-md-3">
                                       <label>Street</label>
                                       <input type="text" class="form-control" name="za_loc_street" required value="<?php echo $za_loc_street?>" />
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
                                         <option value="<?php echo $za_loc_brgy?>" selected readonly><?php echo $brgy_name?> (Selected)</option>
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
                                     <div class="col-md-4">
                                       <label>Project Area (Sq. M)</label>
                                       <input type="text" class="form-control" name="za_project_area" required value="<?php echo $za_project_area?>" />
                                     </div>
                                     <div class="col-md-4">
                                       <label>Right Over Land</label>
                                       <select class="form-control" name="za_right_overland">
                                           <option value="<?php echo $za_project_ROL; ?>" selected readonly><?php echo $za_project_ROL; ?> (Selected)</option>
                                           <option value="Owner">Owner</option>
                                           <option value="Lease">Lease</option>
                                           <option value="Others">Others</option>
                                       </select>
                                     </div>
                                 </div>
                                 <div class="row" style="margin-top: 20px">
                                     <div class="col-md-4">
                                       <label>Project Tenure</label>
                                       <select class="form-control" name="za_project_tenure">
                                           <option value="<?php echo $za_project_tenure?>" selected readonly><?php echo $za_project_tenure?> (Selected)</option>
                                           <option value="Permanent">Permanent</option>
                                           <option value="Temporary">Temporary</option>
                                       </select>
                                     </div>
                                     <div class="col-md-4">
                                       <label>(If temporary, specify years)</label>
                                       <input type="text" class="form-control" name="za_pt_temp_years" value="<?php echo $za_project_tenure_years?>" />
                                     </div>
                                </div>
                                <div class="row" style="margin-top: 20px">
                                     <div class="col-md-4">
                                       <label>Existing Land Use of the Site</label>
                                       <select name="za_exist_landuse" required class="form-control" style="color: black">
                                         <option value="<?php echo $za_land_use_ID?>" selected readonly> <?php echo $za_land_use_desc?> (Selected)</option>
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
                                     <div class="col-md-4">
                                       <label>Tenancy Status</label>
                                       <select class="form-control" name="za_tenancy">
                                           <option value="<?php echo $za_tenancy?>" selected readonly><?php echo $za_tenancy?> (Selected)</option>
                                           <option value="Tenanted">Tenanted</option>
                                           <option value="Non-Tenanted">Non-tenanted</option>
                                       </select>
                                     </div>
                                </div>
                                 <div class="row" style="margin-top: 10px">
                                     
                                     <div class="col-md-4">
                                       <label>Project Cost/Capitalization</label><small> (In Pesos, type in figures)</small>
                                       <input type="number" class="form-control" name="za_project_cost_figure" min="1" value="<?php echo $za_project_cost_num?>" />
                                     </div>
                                     <div class="col-md-4">
                                       <label>Project Cost/Capitalization</label><small> (In Pesos, type in words)</small>
                                       <input type="text" class="form-control" name="za_project_cost_word" value="<?php echo 
                                       $za_project_cost_words?>" />
                                     </div>
                                </div>
                                <!--Project Information-->


                                 <!--Application History Information-->
                                 <div class="row" style="margin-top: 30px">
                                     <div class="col-md-12">
                                             <h4><i class="fa fa-clipboard"></i> Application History Information</h4>
                                             <div class="row" style="background-color: #262626; padding: 1px; margin-bottom: 10px"></div>
                                     </div>

                                     <div class="col-md-6">
                                       <p style="font-size: 16px; text-align: justify; color: black">
                                        &nbsp;&nbsp;&nbsp; Is the project applied for the subject of written notice(s) from the commission and/or its deputized zoning
                                       administrator to the effect requiring for presentation of locational clearance certificate of zoning compliane (LC/CZC)
                                       or to apply for LC/CZC? </p>
                                       <select class="form-control" name="za_lzczc_stat" style="width:25%">
                                           <option value="<?php echo $za_zoning_compliance?>" selected readonly><?php echo $za_zoning_compliance?> (Selected)</option>
                                           <option value="Yes">Yes</option>
                                           <option value="No">No</option>
                                       </select>
                                     </div>
                                     <div class="col-md-6">
                                       <label>A.) Name of the HRLB Officer or Zoning Administrator who issued the notice(s):</label>
                                       <input type="text" class="form-control" name="za_lzczc_yes_names" value="<?php echo $za_zoning_admin?>" />
                                       <label>B.) Date(s) of Notice(s):</label><small> (Put coma in between if more than 1)</small>
                                       <input type="text" class="form-control" name="za_lzczc_yes_dates" value="<?php echo $za_zoning_notice_date?>" />
                                       <label>C.) Order/Request  indicated in the notice(s):</label><small> (Put coma in between if more than 1)</small>
                                       <input type="text" class="form-control" name="za_lzczc_yes_notices" value="<?php echo $za_zoning_notice_request_desc?>" />
                                     </div>

                                     <div class="col-md-12">
                                         <div class="row" style="background-color: #6e6e6e; padding: 1px; margin-bottom: 10px; margin-top:10px"></div>
                                     </div>

                                     <div class="col-md-6">
                                       <p style="font-size: 16px; text-align: justify; color: black">
                                        &nbsp;&nbsp;&nbsp; Is the project applied for the subject of similar application(s) with other office of the commission
                                        and/or deputized by zoning administrator? </p>
                                        <select class="form-control" name="za_similar_app" style="width:25%">
                                            <option value="<?php echo $za_similar_application?>" selected readonly><?php echo $za_similar_application?> (Selected)</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                     </div>
                                     <div class="col-md-6">
                                       <label>A.) Other HLRB office where similar applications were filled:</label>
                                       <input type="text" class="form-control" name="za_simapp_yes_officers" value="<?php echo $za_simapp_other_office?>" />
                                       <label>B.) Date Filled:</label>
                                       <input type="text" class="form-control" name="za_simapp_yes_dates" value="<?php echo $za_simapp_date_filled?>" />
                                       <label>C.) Action taken by mention in:</label>
                                       <input type="text" class="form-control" name="za_simapp_yes_actions" value="<?php echo $za_simapp_action_taken?>" />
                                     </div>
                                 </div>
                                 <!---Application history Information-->

                                 <!-- Delivery Method Preferrability-->
                                 <div class="col-md-12" style="margin-top: 20px">
                                     <h4><i class="fa fa-envelope"></i> Chosen Delivery Method</h4>
                                     <div class="row" style="background-color: #262626; padding: 1px; margin-bottom: 10px"></div>
                                 </div>
                                 <div class="row" style="margin-top: 10px">
                                     <div class="col-md-4">
                                         <label>Preferred Mode of Release of Decision:</label>
                                         <select class="form-control" name="za_release_decision" style="width:50%">
                                             <option value="<?php echo $za_mode_release?>" selected readonly><?php echo $za_mode_release?> (Selected)</option>
                                             <option value="Pick-Up">Pick-Up</option>
                                             <option value="By Snail Mail">By Snail Mail</option>
                                         </select>
                                     </div>

                                     <div class="col-md-4">
                                         <label>If mail, address to:</label><br>
                                         <select name="za_rel_dec_mail_add" class="form-control">
                                           <option value="<?php echo $za_moderel_address_to?>" selected readonly><?php echo $za_moderel_address_to?> (Selected)</option>
                                           <option value="Applicant">Applicant</option>
                                           <option value="Authorized Personnel">Authorized Personnel</option>
                                         </select>
                                     </div>
                                 </div>
                                 <!-- Delivery Method Preferrability-->
                                <div class="row" style="margin-top: 10px">
                                      <div class="col-md-12" style="text-align: right">
                                          <button type="button" onclick="print();" class="btn btn-primary" style="font-size: 16px; margin-top: 10px">
                                           <i class="fa fa-print"></i>
                                           &nbsp;Print For Notarized Copy
                                         </button>
                                         <a href="#confirmation" data-toggle="modal" class="btn btn-warning" style="font-size: 16px; margin-top: 10px">
                                             <i class="fa fa-save"></i>&nbsp;&nbsp;
                                             Save Changes
                                         </a>
                                         <a href="#confirmation" data-toggle="modal" class="btn btn-default" style="font-size: 16px; margin-top: 10px">
                                             <i class="fa fa-reply"></i>&nbsp;&nbsp;
                                             Go Back
                                         </a>
                                      </div>
                                </div>
                                <!--MODAL-->
                                <div class="modal fade" id="confirmation">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <center>
                                                <div class="modal-header" style="background-color: goldenrod;">
                                                    <h4 class="modal-title" style="color: white">Saving Changes...</h4>
                                                    
                                                </div>
                                                <div class="modal-body" style="text-align: justify;">
                                                    <p>
                                                        
                                                        &nbsp;&nbsp;&nbsp;Changing the details of this form after submission is only necessary, if there are corrections or adjustments to be made, and shall only be allowed if the applicant gives the permission to do so.<br><br>
                                                        &nbsp;&nbsp;&nbsp;Are you sure you want proceed?<br>
                                                        
                                                    </p>
                                                </div>
                                                <div class="modal-footer" style="text-align: center">
                                                    <button type="submit" class="btn btn-success" name="mod_zone_app"> Yes, Save the Changes.</button>
                                                    <button type="submit" class="btn btn-danger"  data-dismiss="modal">Cancel Editing</button>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <!--MODAL-->
                            </form>
                       </div>
                   </div>
                   <!-- end panel-body -->
                </div>
            </div>
            <!-- END CUSTOM CONTENT -->


        </div>
        <!-- end #content -->
        
    </div>
    <!-- end page container -->
    
   <?php include("zone_app_print.php");?>
   </body>
   <script src="../../../resources/custom/jasonday-printThis-edc43df/printThis.js"></script>
   <script type="text/javascript">
     function print()
     {
       $('#demo').printThis({
          debug: false,               // show the iframe for debugging
          importCSS: true,            // import page CSS
          importStyle:true,           // import style tags
          printContainer: true,       // grab outer container as well as the contents of the selector
          //loadCSS: "",              // path to additional css file - use an array [] for multiple
          pageTitle: "",              // add title to print page
          removeInline: false,        // remove all inline styles from print elements
          printDelay: 333,            // variable print delay
          header: null,               // prefix to html
          footer: null,               // postfix to html
          base: false ,               // preserve the BASE tag, or accept a string for the URL
          formValues: true,           // preserve input/form values
          canvas: false,              // copy canvas elements (experimental)
          doctypeString: null,        // enter a different doctype for older markup
          removeScripts: false,       // remove script tags from print content
          copyTagClasses: false       // copy classes from the html & body tag
        });
     }
   </script>
</html>




       
              
              

              
              
            