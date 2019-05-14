
    <title>References and Materials | MUPDS</title>
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
                    <li class="breadcrumb-item active">View Applications</li>
                </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
                <h1 class="page-header">View References and Materials</h1>
            <!-- end page-header -->
            <!--Line Divider-->
                <div class="row" style="padding: 1px; background-color: #262626; margin-bottom: 20px"></div>
            <!--Line Divider-->


            <!-- START CUSTOM CONTENT-->
            <!--2nd Part-->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h2 class="panel-title">Download Materials</h2>
                </div>
                <div class="panel-body">
                   <!-- begin panel-body -->
                   <div class="row">
                        <?php include("get_view_details_references.php");?>
                   </div>
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




       
              
              

              
              
            