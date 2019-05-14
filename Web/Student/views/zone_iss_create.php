
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
     
        
        <!-- begin #content -->
        <div id="content" class="content">
            <!-- begin breadcrumb -->
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Review Application</a></li>
                    <li class="breadcrumb-item active">Zoning Issuance</li>
                </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
                <h1 class="page-header">Zoning Issuance</h1>
            <!-- end page-header -->
            <!--Line Divider-->
                <div class="row" style="padding: 1px; background-color: #262626; margin-bottom: 20px"></div>
            <!--Line Divider-->


            <!-- START CUSTOM CONTENT-->
            <!--2nd Part-->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                  <h4 style="color: white">Create an Issue Receipt Record</h4>
                </div>
                <div class="panel-body" style="color: black">
                   <!-- begin panel-body -->
                   <!--For Details-->
                   <?php include("get_view_details_zone_application.php");?>
                   <!--For Details-->
                   <form action="../functionalities/manage_zone_issuance.php" method="POST">
                      <div class="row">
                        <div class="col-md-6" style="margin-left: 25px">
                           <div class="row" style="font-size: 17px">
                              <div class="col-md-6" style="border: 1px solid;">
                                <b>Application No:</b>
                                <p><?php echo $za_no; ?></p>
                              </div>
                              <div class="col-md-6" style="border: 1px solid;">
                                <b>Decision No:</b>
                                <p><?php echo $za_no; ?></p>
                              </div>
                           </div>
                           <div class="row" style="margin-top:10px; font-size: 17px">
                              <div class="col-md-6" style="border: 1px solid;">
                                <b>Applicant:</b>
                                <p><?php echo $compname; ?></p>
                              </div>
                              <div class="col-md-6" style="border: 1px solid;">
                                <b>Applicant's Address:</b>
                                <p><?php echo $za_app_address; ?></p>
                              </div>
                           </div>
                           <div class="row" style="margin-top:10px; font-size: 17px">
                              <div class="col-md-6" style="border: 1px solid;">
                                <b>Company:</b>
                                <p><?php echo $za_name_corporation; ?></p>
                              </div>
                              <div class="col-md-6" style="border: 1px solid;">
                                <b>Company's Address:</b>
                                <p><?php echo  $za_address_corporation; ?></p>
                              </div>
                           </div>
                           <div class="row" style="margin-top:10px; font-size: 17px">
                              <div class="col-md-6" style="border: 1px solid;">
                                <b>Project Type:</b>
                                <p><?php echo $za_project_type; ?></p>
                              </div>
                              <div class="col-md-6" style="border: 1px solid;">
                                <b>Area and Location:</b>
                                <p><?php echo  $za_area_loc_display; ?></p>
                              </div>
                           </div>
                           <div class="row" style="margin-top:10px; font-size: 17px">
                              <div class="col-md-6" style="border: 1px solid;">
                                <b>Decision:</b>
                                <p><?php echo $za_decision; ?></p>
                              </div>
                              <div class="col-md-6" style="border: 1px solid;">
                                <b>Right Over Land:</b>
                                <p><?php echo   $za_project_ROL_desc; ?></p>
                              </div>
                           </div>
                           <div id="SPACER" class="row" style="padding: 15px"></div>
                        </div>
                        <div class="col-md-5">
                          <div class="row">
                            <div class="col-md-6">
                                <label>PMO NO/.OR</label>
                                <input type="text" class="form-control" name="zi_pmo_no" required>
                            </div>
                            <div class="col-md-6">
                                <label>Amount Paid:</label>
                                <input type="number" class="form-control" name="zi_amount_pay" required>
                            </div>
                          </div>
                          <div class="panel" style="margin-top: 20px; text-align: right">
                              <button type="submit" class="btn btn-success" name="submit_issuance">
                                <i class="fa fa-save"></i>
                                &nbsp;Save Issuance Record
                              </button>
                          </div>
                        </div>
                      </div>

                      <!--OTHER FIELDS-->
                      <input type="hidden" name="zi_za_no" value="<?php echo $za_no; ?>">
                      <input type="hidden" name="zi_dec_no" value="<?php echo $za_no; ?>">
                      <input type="hidden" name="zi_lc_no" value="<?php echo $za_no; ?>">
                      <input type="hidden" name="zi_dec_desc" value="<?php echo $za_decision; ?>">
                      <input type="hidden" name="zi_ROL_desc" value="<?php echo $za_project_ROL_desc; ?>">
                      <input type="hidden" name="zi_user" value="<?php echo $userID?>">
                      <!--OTHER FIELDS-->

                      <div class="col-md-12">
                        <div class="panel-heading" style="background-color: #00264d; color:white">
                            <h2 class="panel-title">Inclusive Conditions for Issuance</h2>
                        </div>
                        <?php include("get_view_table_condition_select.php");?>
                      </div>


                   </form>
                   <!-- end panel-body -->
                </div>
            </div>
            <!-- END CUSTOM CONTENT -->


        </div>
        <!-- end #content -->
        
    </div>
    <!-- end page container -->
    

   </body>
</html>




       
              
              

              
              
            