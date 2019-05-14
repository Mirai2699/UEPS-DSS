
    <title>Reviewing Application Details | MUPDS</title>
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
     
        <!--ON PAGE STYLE-->

        <!-- begin #content -->
        <div id="content" class="content">
            <!-- begin breadcrumb -->
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">View Pending Applications</a></li>
                    <li class="breadcrumb-item active">Review Applciation</li>
                </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
                <h1 class="page-header">Reviewing Application's Details</h1>
            <!-- end page-header -->
            <!--Line Divider-->
                <div class="row" style="padding: 1px; background-color: #262626; margin-bottom: 20px"></div>
            <!--Line Divider-->


            <!-- START CUSTOM CONTENT-->
            <!--2nd Part-->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h2 class="panel-title">Map Zone Application</h2>
                </div>
                <div class="panel-body">
                   <!-- begin panel-body -->
                   <!--For Details-->
                   <?php include("get_view_details_zone_application.php");?>
                   <!--For Details-->

                   <div class="col-md-12">
                        <div class="panel">
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

                          <!--Project Information-->
                          <div class="row" style="margin-top: 10px; color: black" >
                              <div class="col-md-12">
                              <h4><i class="fa fa-building"></i> Project Information</h4>
                              <div class="row" style="background-color: #262626; padding: 1px; margin-bottom: 10px"></div>
                              </div>
                              <div class="col-md-3">
                                <b>Project Type:</b><p><?php echo $za_project_type;?></p>
                              </div>
                              <div class="col-md-3">
                                <b>Project Nature:</b><p><?php echo $za_project_nature;?></p>
                              </div>
                               <div class="col-md-3">
                                <b>Project Tenure:</b><p><?php echo $za_project_tenure;?></p>
                              </div>
                              <div class="col-md-3">
                                <b>Project Tenure Years (If Temporary):</b><p><?php echo $za_project_tenure_years;?></p>
                              </div>
                              <div class="col-md-3">
                                <b>Project Cost/Capitalization: (Figures)</b><p><?php echo $za_project_cost_num;?></p>
                              </div>
                              <div class="col-md-3">
                                <b>Project Cost/Capitalization: (Words)</b><p><?php echo $za_project_cost_words;?></p>
                              </div>
                          </div>
                          <!--Project Information-->

                          
                        </div>
                        <!--Start Accordion-->
                        <div id="accordion" class="card-accordion">
                          <!-- begin card 1-->
                          <div class="card">
                            <div class="card-header bg-black text-white pointer-cursor" data-toggle="collapse" data-target="#collapseOne">
                              View More Information
                              <i class="fa fa-angle-double-right"></i>
                            </div>
                            <div id="collapseOne" class="collapse" data-parent="#accordion">
                              <div class="card-body">
                                <div class="panel">
                                    <!--For Details-->
                                      <!--Applicant's Information-->
                                      <div class="row" style="margin-top: 10px; color: black" >
                                          <div class="col-md-12">
                                          <h4><i class="fa fa-user"></i> Applicant's Information</h4>
                                          <div class="row" style="background-color: #262626; padding: 1px; margin-bottom: 10px"></div>
                                          </div>
                                          <div class="col-md-3">
                                            <b>Applicant's Name:</b><p><?php echo $compname ;?></p>
                                          </div>
                                          <div class="col-md-3">
                                            <b>Applicant's Address:</b><p><?php echo $za_app_address; ?></p>
                                          </div>
                                          <div class="col-md-3">
                                            <b>Company's Name:</b><p><?php echo $za_name_corporation;?></p>
                                          </div>
                                          <div class="col-md-3">
                                            <b>Company's Address:</b><p><?php echo $za_address_corporation;?></p>
                                          </div>
                                          <div class="col-md-3">
                                            <b>Name of Authorized Personnel:</b><p><?php echo $za_name_auth_rep;?></p>
                                          </div>
                                          <div class="col-md-3">
                                            <b>Address of Authorized Personnel:</b><p><?php echo $za_address_auth_rep;?></p>
                                          </div>
                                      </div>
                                      <!--Applicant's Information-->
                                      
                                      <!--Project Application History Information-->
                                       <div class="row" style="margin-top: 10px; color: black" >
                                          <div class="col-md-12">
                                          <h4><i class="fa fa-history"></i> Project Application History Information</h4>
                                          <div class="row" style="background-color: #262626; padding: 1px; margin-bottom: 10px"></div>
                                          </div>
                                          <div class="col-md-6">
                                            <b> &nbsp;&nbsp;&nbsp; Is the project applied for the subject of written notice(s) from the commission and/or its deputized zoning
                                            administrator to the effect requiring for presentation of locational clearance certificate of zoning compliane (LC/CZC)
                                            or to apply for LC/CZC?
                                            </b><p style="font-size: 19px"><?php echo $za_zoning_compliance ;?></p>
                                          </div>
                                          <div class="col-md-6">
                                            <b>A.) Name of the HRLB Officer or Zoning Administrator who issued the notice(s):</b>
                                            <p><?php echo $za_zoning_admin?></p>
                                            <b>B.) Date(s) of Notice(s):</b>
                                            <p><?php echo $za_zoning_notice_date ?></p>
                                            <b>C.) Order/Request  indicated in the notice(s):</b>
                                            <p><?php echo $za_zoning_notice_request_desc ?></p>
                                          </div>
                                          <div class="col-md-12">
                                            <div class="panel" style="background-color: #6e6e6e; padding: 1px"></div>
                                          </div>
                                          <div class="col-md-6">
                                            <b> &nbsp;&nbsp;&nbsp; Is the project applied for the subject of similar application(s) with other office of the commission and/or deputized by zoning administrator?
                                            </b><p style="font-size: 19px"><?php echo $za_similar_application ;?></p>
                                          </div>
                                          <div class="col-md-6">
                                            <b>A.) Other HLRB office where similar applications were filled:</b>
                                            <p><?php echo $za_simapp_other_office ?></p>
                                            <b>B.) Date Filled:</b>
                                            <p><?php echo $za_simapp_date_filled ?></p>
                                            <b>C.) Action taken by mention in:</b>
                                            <p><?php echo $za_simapp_action_taken ?></p>
                                          </div>
                                      </div>
                                      <!--Project Application History Information-->

                                       <!-- Delivery Method Information-->
                                       <div class="row" style="margin-top: 10px; color: black" >
                                          <div class="col-md-12">
                                          <h4><i class="fa fa-envelope"></i> Delivery Method Information</h4>
                                          <div class="row" style="background-color: #262626; padding: 1px; margin-bottom: 10px"></div>
                                          </div>
                                          <div class="col-md-4">
                                            <b>Preferred Mode of Release of Decision:</b><p><?php echo $za_mode_release ;?></p>
                                            
                                          </div>
                                          <div class="col-md-4">
                                            <b>If mail is selected, it is addressed to:</b><p><?php echo $za_moderel_address_to ;?></p>
                                          </div>
                                      </div>
                                      <!-- Delivery Method Information-->  
                                    <!--For Details-->                  
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- end card 1-->

                          <!-- begin card 2-->
                          <div class="card">
                            <div class="card-header bg-black text-white pointer-cursor" data-toggle="collapse" data-target="#collapseTwo">
                              View Mapping Evaluation
                              <i class="fa fa-angle-double-right"></i>
                            </div>
                            <div id="collapseTwo" class="collapse show" data-parent="#accordion">
                              <div class="card-body">
                                <div class="panel">
                                    <!--For Mapping-->
                                    <!--Location Information-->
                                    <div class="row" style="margin-top: 10px; color: black" >
                                        <div class="col-md-12">
                                        <h4><i class="fa fa-map-marker-alt"></i> Location Information</h4>
                                        <div class="row" style="background-color: #262626; padding: 1px; margin-bottom: 10px"></div>
                                        </div>
                                        <div class="col-md-3">
                                          <b>Number:</b><p><?php echo $za_loc_number;?></p>
                                        </div>
                                        <div class="col-md-3">
                                          <b>Street:</b><p><?php echo $za_loc_street;?></p>
                                        </div>
                                         <div class="col-md-3">
                                          <b>Municipality:</b><p><?php echo $munic_name;?></p>
                                        </div>
                                        <div class="col-md-3">
                                          <b>Barangay:</b><p><?php echo $za_loc_brgy;?></p>
                                        </div>
                                        <div class="col-md-3">
                                          <b>Target Project Area (Sq.m2):</b><p><?php echo $za_project_area;?></p>
                                        </div>
                                        <div class="col-md-3">
                                          <b>Right Over Land:</b><p><?php echo $za_project_ROL ;?></p>
                                        </div>
                                        <div class="col-md-3">
                                          <b>Existing Land Use:</b><p><?php echo $za_land_use_desc; ?></p>
                                        </div>
                                        <div class="col-md-3">
                                          <b>Tenancy Status:</b><p><?php echo $za_tenancy;?></p>
                                        </div>
                                    </div>
                                    <!--Location Information-->
                                     <div class="row">
                                          <div class="col-md-12" style="background-color: #262626;">
                                            <h4 class="chart-title" style="margin: 10px; color: white">
                                                Mapping for Zone Application No: <?php echo $za_no;?>
                                            </h4>
                                            <div id="map" style="width:100%; height:80%;"></div>
                                          </div>
                                          <!--PREDICTIVE-->
                                          <div class="col-md-12" style="background-color: #0d1a26;">
                                            <hr style="padding: 2px">
                                            <p style="font-size: 20px; color: white">System's Evaluation and Recommendation </p>
                                            <hr>
                                            <p style="font-size: 14px; text-align: justify; color: white">
                                                &nbsp;&nbsp;&nbsp;
                                                The system generated an evaluation and recommendations based on the applicant's preferences, history data,  
                                                together with the evaluation and inputs of the mapping expert:
                                            </p>
                                             <?php include("get_view_details_predictive_analysis.php");?>

                                             <div class="col-md-12" style="text-align: center; margin-bottom: 10px">
                                               <a href="#conditions" data-toggle="modal" class="btn" style="background-color: green; color: white; font-size: 14px"> 
                                                 <i class="fa fa-info-circle"></i>&nbsp;
                                                 View Zoning Conditions for the Project Location's Municipality 
                                               </a>
                                             </div>
                                             <?php include("get_view_modal_munic_conditions.php");?>
                                          </div>
                                          <!--FOR CONDTIONS-->
                                          
                                     </div>

                                      <div class="row" style="margin-top: 20px">
                                        <div class="col-md-12">
                                          <div class="row" style="margin-top: 5px; color: black" >
                                              <div class="col-md-12">
                                              <h4><i class="fa fa-tasks"></i> Evaluation Information</h4>
                                              <div class="row" style="background-color: #262626; padding: 1px; margin-bottom: 10px"></div>
                                              </div>
                                              <div class="col-md-3">
                                                <b>Last Evaluated By:</b><p><?php echo $up_compname.'<br><i>'.$up_pos.'</i>'?></p>
                                              </div>
                                              <div class="col-md-3">
                                                <b>Last Evaluated On:</b><p><?php echo $za_app_new_eval_date;?></p>
                                              </div>
                                               <div class="col-md-5">
                                                <b>Lastest Evaluation Statement:</b><p><?php echo $za_app_map_eval;?></p>
                                              </div>
                                          </div>
                                        </div>
                                    </div>
                                    <!--For Mapping-->                
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- end card 2-->
                        </div>
                        <!--End Accordion-->
                        <!--FORM-->
                          <form action="../functionalities/manage_zone_application.php" method="POST">
                            <input type="hidden" name="za_ID" value="<?php echo $zapplication_ID?>">
                            <div class="col-md-12">
                              <div class="row" style="margin-top: 5px; color: black" >
                                  <div class="col-md-12">
                                  <h4><i class="fa fa-tasks"></i> Application Decision</h4>
                                  <div class="row" style="background-color: #262626; padding: 1px; margin-bottom: 10px"></div>
                                  </div>
                                  <div class="col-md-8">
                                     <input type="hidden" name="za_ID" value="<?php echo $zapplication_ID; ?>">
                                     <p style="text-align:justify">&nbsp;&nbsp;&nbsp;By analyzing the current application details, together with the mapping evaluation, verdict and remarks will be given, to conclude whether the project zoning application is for revise or approve.</p>
                                     <label>Add Remarks:</label>
                                     <textarea class="form-control" rows="6" name="za_add_remarks" style="font-size:17px" required></textarea>
                                  </div>
                                  <div class="col-md-4" >
                                     <div class="row" style="margin-top: 55px;">
                                       <label>Verdict:</label>
                                       <select class="form-control" name="za_verdict" required style="color: black; font-size: 16px;">
                                         <option value="" selected disabled> -- Select Verdict -- </option>
                                         <option value="REVISE">To be Revised</option>
                                         <option value="APPROVED">Approved</option>
                                       </select>
                                     </div>
                                     <div class="row" style="margin-top: 75px; text-align: right;">
                                       
                                       <?php 
                                          $get_curr_remarks = mysqli_query($connection,"SELECT za_app_remarks FROM `t_zoning_application` WHERE za_ID = '$zapplication_ID' ");
                                             while($row_remark = mysqli_fetch_array($get_curr_remarks))
                                             {
                                                if(!empty($row_remark['za_app_remarks']))
                                                {
                                                   echo '
                                                   <a href="#show_eval" data-toggle="modal" class="btn btn-primary" style="font-size: 15px; margin-top: 10px; background-color: green">
                                                       <i class="fa fa-check"></i>&nbsp;&nbsp;
                                                       Show Latest Remarks
                                                   </a>
                                                   &nbsp;&nbsp;
                                                   ';
                                                }
                                                else
                                                {
                                                  //No display;
                                                }
                                             }
                                       ?>
                                       <a href="#confirmation" data-toggle="modal" class="btn btn-success" style="font-size: 15px; margin-top: 10px;">
                                           <i class="fa fa-external-link-alt"></i>&nbsp;&nbsp;
                                           Give Verdict
                                       </a>
                                       &nbsp;&nbsp;
                                       <a href="zone_app_manage.php"  class="btn btn-default" style="font-size: 15px; margin-top: 10px;">
                                           <i class="fa fa-reply"></i>&nbsp;&nbsp;
                                           Go Back
                                       </a>
                                     </div>
                                  </div>
                              </div>
                            </div>
                            <!--MODAL-->
                            <!--Show Curr Eval-->
                            <div class="modal fade" id="show_eval">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <center>
                                            <div class="modal-header" style="background-color: green;">
                                                <h4 class="modal-title" style="color: white">Latest Remarks</h4>
                                            </div>
                                            <div class="modal-body" style="text-align: justify; font-size: 16px">
                                                <b>
                                                   &nbsp;&nbsp;&nbsp;The latest remarks is stated below:<br><br>
                                                </b>
                                                <p>&nbsp;&nbsp;&nbsp;<?php echo $za_app_remarks ?></p>
                                            </div>
                                            <div class="modal-footer" style="text-align: center">
                                                <button type="submit" class="btn btn-danger"  data-dismiss="modal">Close</button>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <!--To Give Eval-->
                            <div class="modal fade" id="confirmation">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <center>
                                            <div class="modal-header" style="background-color: teal;">
                                                <h4 class="modal-title" style="color: white">Final Verdict</h4>
                                                
                                            </div>
                                            <div class="modal-body" style="text-align: justify;">
                                                <p>
                                                    
                                                    &nbsp;&nbsp;&nbsp;After reviewing and evaluating the application, choosing the verdict "For revision", means that this application will return to the zoning officer as for revise, to inform the applicant that there are some changes to be made.<br><br>
                                                    &nbsp;&nbsp;&nbsp;By choosing the verdict "Approved", means that this application will be set as approved to proceed for development, will redirect you to the issuance receipt record creation,  and the record will be transferred for the Project Development Officer to monitor the status of the development of the project.<br><br>
                                                    &nbsp;&nbsp;&nbsp;Are you sure you want proceed with verdict and remarks?<br>
                                                    
                                                </p>
                                            </div>
                                            <div class="modal-footer" style="text-align: center">
                                                <button type="submit" class="btn btn-success" name="final_dec">Yes, I want to proceed.</button>
                                                <button class="btn btn-danger" data-dismiss="modal">No, let me review it again.</button>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <!--MODAL-->        
                          </form>
                        <!--FORM-->
                   </div>
                   <!--For Details-->

                   <!-- end panel-body -->
                </div>
            </div>
            <!-- END CUSTOM CONTENT -->


        </div>
        <!-- end #content -->
        
    </div>
    <!-- end page container -->
    

    <?php include("../functionalities/map-pendingApp.php")?>
    <!--SCRIPT ON PAGE-->
    <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip(); 
    });
    </script>
   </body>
</html>


    

       
              
              

              
              
            