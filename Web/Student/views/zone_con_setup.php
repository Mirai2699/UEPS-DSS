
    <title>Setup Zoning Conditions | MUPDS</title>
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
                    <li class="breadcrumb-item active">Setup Zoning Conditions</li>
                </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
                <h1 class="page-header">Create Zoning Conditions</h1>
            <!-- end page-header -->
            <!--Line Divider-->
                <div class="row" style="padding: 1px; background-color: #262626; margin-bottom: 20px"></div>
            <!--Line Divider-->


            <!-- START CUSTOM CONTENT-->
            <!--FIRST PART-->
            <div class="panel panel-inverse">
                <div class="panel-heading" style="background-color: #004d4d">
                    <h2 class="panel-title" style="margin: 2px">
                        <i class="fa fa-paste"></i>&nbsp;&nbsp;&nbsp;Setup Zoning Conditions
                    </h2>
                </div>
                <form action="../functionalities/zone_condition_manage.php" method="POST">
                    <div class="panel-body">
                      <div class="col-md-12">
                          <div class="panel">
                            <!--Multiple Insert-->
                            <div class="adv-table">
                              <table class="display table table-bordered table-striped">                                
                                  <tr>
                                      <td>                                        
                                         <div class="form-content">
                                             <div class="row">
                                                 <div class="col-md-12">
                                                         <p>
                                                             <button type="button" id="btnAdd" class="btn btn-primary">      
                                                             <i class="fa fa-plus"></i>&nbsp;
                                                               Add Condition
                                                             </button>
                                                         </p>
                                                 </div>
                                             </div>
                                             <div class="row group">       
                                                  
                                                  <div class="col-md-3">
                                                     <div class="form-group">
                                                         <label>Condition Type:</label><br>
                                                         <select class="form-control" name="cond_type[]" style="color: black; font-size:15px" required>
                                                           <option value="" selected disabled=""> -- Select Type -- </option>
                                                           <option value="Main Condition">Main Condition</option>
                                                           <option value="Additional Condition">Additional Condition</option>
                                                           <option value="General Special Condition">General Special Condition</option>
                                                         </select>
                                                     </div>
                                                  </div>                                                 
                                                  <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label>Condition Description:</label><br>
                                                         <textarea type="text" name="cond_desc[]" class="form-control" required style="color: black;"></textarea>
                                                     </div>
                                                  </div>

                                                   <div class="col-md-2">
                                                     <div class="form-group">
                                                         <label>Municipal Location</label>
                                                         <select name="cond_munic[]" required class="form-control" style="color: black">
                                                           <option value="" selected disabled>-- Select Municipality-- </option>
                                                           <option value="0" >-- Applicable to All -- </option>
                                                           <?php
                                                             
                                                             $get_munic = mysqli_query($connection,"SELECT * FROM `r_municipality` WHERE munic_stat = 'Active'");
                                                             while($row = mysqli_fetch_assoc($get_munic))
                                                             {
                                                                 $munic_ID = $row["munic_ID"];
                                                                 $munic_name = $row["munic_name"];
                                                           ?>
                                                           <option value="<?php echo $munic_ID ?>"><?php echo $munic_name?></option>
                                                           <?php } ?>
                                                         </select> 
                                                     </div>
                                                  </div>

                                                  <div class="col-md-1">
                                                     <div class="form-group">   
                                                         <button type="button" class="btn btn-danger btnRemove" style="margin-top: 40px;">
                                                          <i class="fa fa-times"></i>
                                                        </button>
                                                     </div>
                                                 </div>
                                             </div>

                                          </div>
                                     </td>
                                 </tr>
                              </table>
                            </div>
                            <!--Multiple Insert-->
                            <div class="modal-footer" style="text-align: center">
                                <div class="col-md-12" style="text-align: right; ">
                                    <a href="#confirmation_save" data-toggle="modal" class="btn btn-success" name="save_tasks" style="font-size:13px">
                                        <i class="fa fa-save"></i>
                                         Save Entries
                                    </a>
                                    <a href="#confirmation_reset" class="btn btn-danger" style="font-size:13px" data-toggle="modal">
                                        <i class="fa fa-sync"></i>
                                        Reset All Entries
                                    </a>
                                </div>
                            </div>

                          </div>
                      </div>
                    </div>
                    <!--MODAL-->
                    <div class="modal fade" id="confirmation_save">
                        <div class="modal-dialog" >
                            <div class="modal-content">
                                <center>
                                    <div class="modal-header" style="background-color: teal;">
                                        <h4 class="modal-title" style="color: white">Saving Entries...</h4>
                                    </div>
                                    <div class="modal-body" style="text-align: justify; font-size: 14px">
                                        <p>&nbsp;&nbsp;&nbsp;By saving these entries, you can now choose the following conditions for zoning issuance.<br><br>
                                           Are you sure you want proceed?
                                        </p>                         
                                    </div>
                                    <div class="modal-footer" style="text-align: center">
                                        <div class="col-md-12" style="text-align: right; ">
                                            <button type="submit" class="btn btn-success" name="save_conditions" style="font-size:13px">
                                                <i class="fa fa-save"></i>
                                                 Yes, proceed in saving entries.
                                            </button>
                                            <button type="button" class="btn btn-danger" style="font-size:13px" data-dismiss="modal">
                                                <i class="fa fa-times"></i>
                                                 No, let me it review again.
                                            </button>
                                        </div>
                                    </div>

                                </center>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="confirmation_reset">
                        <div class="modal-dialog" >
                            <div class="modal-content">
                                <center>
                                    <div class="modal-header" style="background-color: #cc2900;">
                                        <h4 class="modal-title" style="color: white">Resetting All Entries...</h4>
                                    </div>
                                    <div class="modal-body" style="text-align: justify; font-size: 14px">
                                        <p>&nbsp;&nbsp;&nbsp;Confirming this will reset all your form entries.<br><br>
                                           Are you sure you want proceed?
                                        </p>                         
                                    </div>
                                    <div class="modal-footer" style="text-align: center">
                                        <div class="col-md-12" style="text-align: right; ">
                                            <a href="zone_con_setup.php" class="btn btn-danger" style="font-size:13px">
                                                <i class="fa fa-sync"></i>
                                                 Yes, reset the values.
                                            </a>
                                            <button type="button" class="btn btn-default" style="font-size:13px; border:1px solid" data-dismiss="modal">
                                                <i class="fa fa-times"></i>
                                                 No, let me it review again.
                                            </button>
                                        </div>
                                    </div>

                                </center>
                            </div>
                        </div>
                    </div>
                    <!--MODAL-->
                </form>
                <!--FIRST PART-->
               
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

 <script src="../../../resources/custom/advanced-form.js"></script>
 <script src="../../../resources/custom/jquery.multifield.min.js"></script> 
 <script>

        $('.form-content').multifield({
            section: '.group',
            btnAdd:'#btnAdd',
            btnRemove:'.btnRemove',
        });

        $(function(){
            $('select').on('change',function(){                        
                $('input[name=place]').val($(this).val());            
            });
        });

        $(function(){
            $('select').on('change',function(){                        
                $('input[name=reqperson]').val($(this).val());            
            });
        });

        $(function(){
            $('select').on('change',function(){                        
                $('input[name=asttypesss]').val($(this).val());            
            });
        });

</script>
<!-- ======= ON PAGE SCRIPT ======== -->



       
              
              

              
              
            