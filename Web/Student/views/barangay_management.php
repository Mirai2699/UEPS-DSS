
    <title>Barangay Management | UPDS</title>
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
                    <li class="breadcrumb-item active">Manage Barangays</li>
                </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
                <h1 class="page-header">Barangay Management</h1>
            <!-- end page-header -->
            <!--Line Divider-->
                <div class="row" style="padding: 1px; background-color: #262626; margin-bottom: 20px"></div>
            <!--Line Divider-->


            <!-- START CUSTOM CONTENT-->
            
             <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h2 class="panel-title" style="margin: 10px">
                        <i class="fa fa-map"></i>&nbsp;&nbsp;&nbsp;Manage Barangays
                    </h2>
                </div>
                <div class="panel-body">
                  <!--START TABLE-->
                  <div class="col-lg-12">
                      <!-- begin panel -->
                      <div class="panel panel-inverse">
                          <!-- begin panel-body -->
                          <div class="panel-body">
                              <?php include("get_view_table_barangays.php");?>
                          </div>
                          <!-- end panel-body -->
                      </div>
                      <!-- end panel -->
                  </div>
                  <!--END TABLE-->
                </div>
            </div>
            <!-- END CUSTOM CONTENT -->


        </div>
        <!-- end #content -->
        
    </div>
    <!-- end page container -->
    

   </body>
</html>

       
              
              

              
              
            