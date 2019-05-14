
    <title>Reviewing Application Details | MUPDS</title>
<?php
    
    include("../utilities/Header.php");
   // include("../utilities/Notification.php");
    include("../utilities/navibar.php");
    include("../utilities/BaseJs.php");
    include("../utilities/Table_default.php");

    if (isset($_GET['getNo'])) 
    {
        $zdec_ID = $_GET['getNo'];
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
                   <?php include("get_view_details_zone_issuance.php");?>
                   <!--For Details-->
                      <div class="row">
                        <div class="col-md-6">
                           <div class="row" style="font-size: 17px">
                              <div class="col-md-6" style="border: 1px solid;">
                                <b>Application No:</b>
                                <p><?php echo $zi_za_no; ?></p>
                              </div>
                              <div class="col-md-6" style="border: 1px solid;">
                                <b>Decision No:</b>
                                <p><?php echo $zi_dec_no; ?></p>
                              </div>
                           </div>
                           <div class="row" style="font-size: 17px">
                              <div class="col-md-6" style="border: 1px solid;">
                                <b>LC No:</b>
                                <p><?php echo $zi_lc_no; ?></p>
                              </div>
                              <div class="col-md-6" style="border: 1px solid;">
                                <b>Date of Receipt:</b>
                                <p><?php echo $new_date_rpt; ?></p>
                              </div>
                           </div>
                           <div class="row" style="font-size: 17px">
                              <div class="col-md-6" style="border: 1px solid;">
                                <b>Applicant:</b>
                                <p><?php echo $compname; ?></p>
                              </div>
                              <div class="col-md-6" style="border: 1px solid;">
                                <b>Applicant's Address:</b>
                                <p><?php echo $za_app_address; ?></p>
                              </div>
                           </div>
                           <div class="row" style="font-size: 17px">
                              <div class="col-md-6" style="border: 1px solid;">
                                <b>Company:</b>
                                <p><?php echo $za_name_corporation; ?></p>
                              </div>
                              <div class="col-md-6" style="border: 1px solid;">
                                <b>Company's Address:</b>
                                <p><?php echo  $za_address_corporation; ?></p>
                              </div>
                           </div>
                           <div class="row" style="font-size: 17px">
                              <div class="col-md-6" style="border: 1px solid;">
                                <b>Project Type:</b>
                                <p><?php echo $za_project_type; ?></p>
                              </div>
                              <div class="col-md-6" style="border: 1px solid;">
                                <b>Area and Location:</b>
                                <p><?php echo  $za_area_loc_display; ?></p>
                              </div>
                           </div>
                           <div class="row" style="font-size: 17px">
                              <div class="col-md-6" style="border: 1px solid;">
                                <b>Decision:</b>
                                <p><?php echo $zi_dec_desc; ?></p>
                              </div>
                              <div class="col-md-6" style="border: 1px solid;">
                                <b>Right Over Land:</b>
                                <p><?php echo   $zi_ROL_desc; ?></p>
                              </div>
                           </div>
                           <div class="row" style="font-size: 17px">
                              <div class="col-md-6" style="border: 1px solid;">
                                <b>PMO NO/.OR:</b>
                                <p><?php echo $zi_pmo_no; ?></p>
                              </div>
                              <div class="col-md-6" style="border: 1px solid;">
                                <b>Amount Paid:</b>
                                <p>₱  <?php echo  $zi_pay_amount; ?></p>
                              </div>
                           </div>
                           <div id="SPACER" class="row" style="padding: 15px"></div>
                           <div class="panel">
                              <!-- <a href="print_zoning_issuance.php?getID=<?php echo $zdec_ID?>" class="btn btn-primary" style="font-size: 16px">
                                <i class="fa fa-print"></i>
                                &nbsp;Print Receipt
                              </a> -->
                               <button type="button" onclick="print();" class="btn btn-primary" style="font-size: 16px">
                                <i class="fa fa-print"></i>
                                &nbsp;Print Receipt
                              </button>
                              &nbsp;
                              &nbsp;
                              <a href="zone_iss_manage.php" class="btn btn-default" style="font-size: 16px; border: 1px solid">
                                <i class="fa fa-reply"></i>
                                &nbsp;Go Back
                              </a>
                           </div>
                        </div>
                        <div class="col-md-6">
                          <?php include("get_view_table_issued_condition.php");?>
                        </div>
                      </div>
                   <!-- end panel-body -->
                </div>
            </div>

            <!--CUSTOM PRINT-->
            <?php include("zone_iss_printable.php");?>
            <!--CUSTOM PRINT-->
            <!-- END CUSTOM CONTENT -->


        </div>
        <!-- end #content -->
        
    </div>
    <!-- end page container -->
    

   </body>

   <script src="../../../resources/custom/jasonday-printThis-edc43df/printThis.js"></script>
   <script type="text/javascript">
     function print()
     {
       $('#demo').printThis({
          debug: false,               // show the iframe for debugging
          importCSS: false,            // import page CSS
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





       
              
              

              
              
            