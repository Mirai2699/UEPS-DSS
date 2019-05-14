
    <title>Municipal Management | MUPDS</title>
<?php
    
    include("../utilities/Header.php");
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
                    <li class="breadcrumb-item active">Manage Municipalities</li>
                </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
                <h1 class="page-header">Municipal Management</h1>
            <!-- end page-header -->
            <!--Line Divider-->
                <div class="row" style="padding: 1px; background-color: #262626; margin-bottom: 20px"></div>
            <!--Line Divider-->


            <!-- START CUSTOM CONTENT-->
            <div class="panel panel-inverse">
                <div class="panel-heading"  style="background-color: #004d4d">
                    <h2 class="panel-title" style="margin: 10px">
                        <i class="fa fa-map"></i>&nbsp;&nbsp;&nbsp;Add a Municipality
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
                                  <label>Municipal Name</label>
                                  <input type="text" class="form-control" name="munic_name" required/>
                                </div>
                                <div class="col-md-4">
                                  <label>District</label>
                                  <select name="munic_district" required class="form-control">
                                    <option value="" selected disabled> -- Select District -- </option>
                                    <?php
                                      
                                      $view_query1 = mysqli_query($connection,"SELECT * FROM `r_district` WHERE dstrct_stat = 1 ");
                                      while($row = mysqli_fetch_assoc($view_query1))
                                      {
                                          $ds_ID = $row["dstrct_ID"];
                                          $ds_name = $row["dstrct_name"];
                                    ?>
                                    <option value="<?php echo $ds_ID ?>"><?php echo $ds_name?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                                <div class="col-md-2">
                                  <label>Area (Per Sq. m<sup>2</sup>)</label>
                                  <input type="text" class="form-control" name="munic_area" required/>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-3">
                                  <label>Density (Per Sq. m<sup>2</sup>)</label>
                                  <input type="text" class="form-control" name="munic_density" required/>
                                </div>
                                <div class="col-md-3">
                                  <label>Latitude Coordinates</label>
                                  <input type="text" class="form-control" name="munic_lat" required/>
                                </div>
                                <div class="col-md-3">
                                  <label>Longtitude Coordinates</label>
                                  <input type="text" class="form-control" name="munic_long" required/>
                                </div>
                                <div class="col-md-3">
                                  <button type="submit" class="btn btn-success" name="add_municipal" style="font-size: 16px; margin-top: 27px">
                                    <i class="far fa-save"></i>&nbsp;&nbsp; Save</button>
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
                        <i class="fa fa-map"></i>&nbsp;&nbsp;&nbsp;Manage Municipalities
                    </h2>
                </div>
                <div class="panel-body">
                  <!--START TABLE-->
                  <div class="col-lg-12">
                      <!-- begin panel -->
                      <div class="panel panel-inverse">
                          <!-- begin panel-body -->
                          <div class="panel-body">
                              <?php include("get_view_table_municipalities.php");?>
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




       
              
              

              
              
            