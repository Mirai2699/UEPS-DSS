
    <title>District Management | MUPDS</title>
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
                    <li class="breadcrumb-item active">District Management</li>
                </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
                <h1 class="page-header">District Management<small>&nbsp;&nbsp;&nbsp;Setup and Configuration</small></h1>
            <!-- end page-header -->
            <!--Line Divider-->
                <div class="row" style="padding: 1px; background-color: #262626; margin-bottom: 20px"></div>
            <!--Line Divider-->


            <!-- START CUSTOM CONTENT-->
            <!--2nd Part-->
            <div class="panel panel-inverse">
                <div class="panel-heading" style="background-color: #004d4d">
                    <h2 class="panel-title">Add District</h2>
                </div>
                <div class="panel-body">
                   <!-- begin panel-body -->
                   <form action="../functionalities/insert_func.php" method="POST">
                       <div class="row">
                           <div class="col-md-5">
                             <label>District Name</label>
                             <input type="text" class="form-control" name="District_name" required/>
                           </div>
                           <div class="col-md-5">
                             <label>Current District Representative</label>
                             <input type="text" class="form-control" name="District_rep" required/>
                           </div>
                           <div class="col-md-2">
                             <button type="submit" name="add_district" class="btn btn-success" style="font-size: 16px; margin-top: 27px">
                              <i class="far fa-save"></i>&nbsp;&nbsp; Save</button>
                           </div>
                        </div>
                   </form>
                   <!-- end panel-body -->
                </div>
            </div>
            <!--2nd Part-->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h2 class="panel-title">View Districts</h2>
                </div>
                <div class="panel-body">
                   <!-- begin panel-body -->
                   <?php include("get_view_table_districts.php");?>
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




       
              
              

              
              
            