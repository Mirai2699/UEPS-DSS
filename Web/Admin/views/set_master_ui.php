
    <title>Changing UI | MUPDS</title>
<?php
    
    include("../utilities/Header.php");
   // include("../utilities/Notification.php");
    include("../utilities/navibar.php");
    include("../utilities/BaseJs.php");
    include("../utilities/Table_default.php");
?> 
     
        
        <!-- begin #content -->
        <div id="content" class="content">
            <!-- begin breadcrumb -->
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Configurations</a></li>
                    <li class="breadcrumb-item active">UI Management</li>
                </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
                <h1 class="page-header">User Interface Management<small>&nbsp;&nbsp;&nbsp;Setup and Configuration</small></h1>
            <!-- end page-header -->
            <!--Line Divider-->
                <div class="row" style="padding: 1px; background-color: #262626; margin-bottom: 20px"></div>
            <!--Line Divider-->


            <!-- START CUSTOM CONTENT-->
            <!--2nd Part-->
            <div class="panel panel-inverse">
                <div class="panel-heading" style="background-color: #004d4d">
                    <h2 class="panel-title">Add New UI Set</h2>
                </div>
                <div class="panel-body">
                   <!-- begin panel-body -->
                   <form action="../functionalities/insert_func.php" method="POST" enctype="multipart/form-data">

                       <div class="row">
                          <div class="col-md-3">
                            <label>Logo Image:</label>
                            <input type="file" name="file" class="form-control">
                          </div>
                          <div class="col-md-3">
                            <label>Province Name:</label>
                            <input type="text" name="muc_province" class="form-control">
                          </div>
                          <div class="col-md-3">
                            <label>Municipality Name:</label>
                            <input type="text" name="muc_munic" class="form-control">
                          </div>
                          <div class="col-md-2">
                            <label>Active Status:</label>
                            <select class="form-control" name="muc_stat">
                              <option value="" selected disabled> -- Select Status -- </option>
                              <option value="Active">Active</option>
                              <option value="Disabled">Disabled</option>
                            </select>
                          </div>
                          <div class="col-md-1">
                            <button type="submit" class="btn btn-success" name="save_ui_set" style="margin-top: 26px">
                              <i class="fa fa-save"></i>&nbsp;
                              Save
                            </button>
                          </div>
                       </div>
                   </form>
                   <!-- end panel-body -->
                </div>
            </div>
            <!--2nd Part-->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h2 class="panel-title">Other UI Sets</h2>
                </div>
                <div class="panel-body">
                   <!-- begin panel-body -->
                   <div class="col-md-12">
                    <?php include("get_view_table_master_ui.php");?>
                   <!-- end panel-body -->
                   </div>
                </div>
            </div>
            <!-- END CUSTOM CONTENT -->


        </div>
        <!-- end #content -->
        
    </div>
    <!-- end page container -->
    

   </body>
</html>




       
              
              

              
              
            