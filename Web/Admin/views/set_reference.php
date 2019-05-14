
    <title>Reference Management | MUPDS</title>
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
                <h1 class="page-header">Reference Management<small>&nbsp;&nbsp;&nbsp;Setup and Configuration</small></h1>
            <!-- end page-header -->
            <!--Line Divider-->
                <div class="row" style="padding: 1px; background-color: #262626; margin-bottom: 20px"></div>
            <!--Line Divider-->


            <!-- START CUSTOM CONTENT-->
            <!--2nd Part-->
            <div class="panel panel-inverse">
                <div class="panel-heading" style="background-color: #004d4d">
                    <h2 class="panel-title">Upload Files</h2>
                </div>
                <div class="panel-body">
                   <!-- begin panel-body -->
                   <form action="../functionalities/insert_func.php" method="POST" enctype="multipart/form-data">
                       <div class="col-md-5">
                         <label>Select File to Upload:</label>
                         <input type="file" name="file" class="form-control">
                           <div style="text-align: right" style="">
                              <input type="submit" name="upload_reference" value="Upload" class="btn btn-sucess" style="margin-top: 10px;font-size: 16px">
                           </div>
                        </div>
                   </form>
                   <!-- end panel-body -->
                </div>
            </div>
            <!--2nd Part-->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h2 class="panel-title">View Files</h2>
                </div>
                <div class="panel-body">
                   <!-- begin panel-body -->
                   <div class="col-md-12">
                    <?php include("get_view_table_references.php");?>
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




       
              
              

              
              
            