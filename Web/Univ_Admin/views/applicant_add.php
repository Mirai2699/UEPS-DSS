
    <title>Add Applicant | MUPDS</title>
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
                    <li class="breadcrumb-item active">Add an Applicant</li>
                </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
                <h1 class="page-header">Add Applicant</h1>
            <!-- end page-header -->
            <!--Line Divider-->
                <div class="row" style="padding: 1px; background-color: #262626; margin-bottom: 20px"></div>
            <!--Line Divider-->


            <!-- START CUSTOM CONTENT-->
                        <!--FIRST PART-->
                        <div class="panel panel-inverse">
                            <div class="panel-heading" style="background-color: #004d4d">
                                <h2 class="panel-title" style="margin: 10px">
                                    <i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;Add User Profile Details
                                </h2>
                            </div>
                            <form action="../functionalities/manage_applicant.php" method="POST">
                                <div class="panel-body">
                                  <div class="col-md-12">
                                      <div class="panel">
                                            <div class="row">
                                                <div class="col-md-4">
                                                  <label>Last Name</label>
                                                  <input type="text" class="form-control" name="app_lname" required/>
                                                </div>
                                                <div class="col-md-4">
                                                  <label>Middle Name</label><small> (Optional)</small>
                                                  <input type="text" class="form-control" name="app_mname"/>
                                                </div>
                                                <div class="col-md-4">
                                                  <label>First Name</label>
                                                  <input type="text" class="form-control" name="app_fname" required/>
                                                </div>
                                           </div>
                                           <div class="row" style="margin-top: 10px">
                                                <div class="col-md-9">
                                                  <label>Home Address</label>
                                                  <input type="text" class="form-control" name="app_hadd" placeholder="Bldg No, Street, Barangay, Municipality/City, Province " required>
                                                </div>
                                                <div class="col-md-3">
                                                  <label>Contact Number:</label>
                                                  <input type="text" class="form-control" maxlength="11" name="app_con_num" required>
                                                </div>
                                           </div>
                                           <div class="row" style="margin-top: 10px">
                                                 <div class="col-md-12" style="text-align: right">
                                                    <a href="#confirmation" data-toggle="modal" class="btn btn-success" style="font-size: 16px; margin-top: 10px">
                                                        <i class="far fa-save"></i>&nbsp;&nbsp;
                                                        Save
                                                    </a>
                                                 </div>
                                           </div>
                                      </div>
                                  </div>
                                </div>
                                <!--FIRST PART-->
                                <!--MODAL-->
                                <div class="modal fade" id="confirmation">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <center>
                                                <div class="modal-header" style="background-color: green;">
                                                    <h4 class="modal-title" style="color: white">Confirmation for the next step...</h4>
                                                    <button type="button" class="close"  style="color: white" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body" style="text-align: justify;">
                                                    <p>
                                                        &nbsp;&nbsp;&nbsp;By saving this record, you can proceed depending on the choices below:<br><br>
                                                        &nbsp;&nbsp;&nbsp;By choosing the zoning application button, you will be redirected to the zoning application form which you can fill-up for the applicant's request.<br><br>
                                                        &nbsp;&nbsp;&nbsp;But if you only intented to save the applicant's record, choose the "Redirect to Applicants' Records."
                                                    </p>
                                                </div>
                                                <div class="modal-footer" style="text-align: center">
                                                    <button type="submit" class="btn btn-success" name="add_applicant_zone"> Redirect to the Zoning Application</button>
                                                    <button type="submit" class="btn btn-warning" name="add_applicant_view">Redirect to Applicants' Records</button>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <!--MODAL-->
                            </form>
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



       
              
              

              
              
            