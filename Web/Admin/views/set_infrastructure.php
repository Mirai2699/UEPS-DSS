
    <title>Infrastructure Management | MUPDS</title>
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
                    <li class="breadcrumb-item active">Manage Infrastructure Entities</li>
                </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
                <h1 class="page-header">Infrastructure Entities Management</h1>
            <!-- end page-header -->
            <!--Line Divider-->
                <div class="row" style="padding: 1px; background-color: #262626; margin-bottom: 20px"></div>
            <!--Line Divider-->


            <!-- START CUSTOM CONTENT-->
            <div class="panel panel-inverse">
                <div class="panel-heading"  style="background-color: #004d4d">
                    <h2 class="panel-title" style="margin: 10px">
                        <i class="fa fa-map"></i>&nbsp;&nbsp;&nbsp;Add an Infrastructure Entity
                    </h2>
                </div>
                <div class="panel-body">
                  <!--START TABLE-->
                  <div class="col-lg-12">
                      <!-- begin panel -->
                      <div class="panel panel-inverse">
                          <!-- begin panel-body -->
                          <form action="../functionalities/insert_func.php" method="POST">
                              <div class="row" style="margin-bottom: 20px">
                                <div class="col-md-4">
                                  <label>Infrastructure Name</label>
                                  <input type="text" class="form-control" name="infra_name" required/>
                                </div>
                                <div class="col-md-5">
                                  <label>Infrastructure Description</label>
                                  <input type="text" class="form-control" name="infra_desc" required/>
                                </div>
                                <div class="col-md-1">
                                  <button type="submit" class="btn btn-success" name="add_infra" style="font-size: 16px; margin-top: 27px"><i class="far fa-save"></i>&nbsp;&nbsp; Save</button>
                                </div>
                              </div>
                          </form>
                          <!-- end panel-body -->
                      </div>
                      <!-- end panel -->
                  </div>
                  <!--END TABLE-->
                </div>
            </div>

             <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h2 class="panel-title" style="margin: 10px">
                        <i class="fa fa-map"></i>&nbsp;&nbsp;&nbsp;Manage Infrastructure Entities
                    </h2>
                </div>
                <div class="panel-body">
                  <!--START TABLE-->
                  <div class="col-lg-12">
                      <!-- begin panel -->
                      <div class="panel panel-inverse">
                          <!-- begin panel-body -->
                          <div class="panel-body">
                              <?php include("get_view_table_infrastructure.php");?>
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
