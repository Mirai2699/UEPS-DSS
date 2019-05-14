
    <title>Dashboard | MUPDS</title>
<?php
    
    include("../utilities/Header.php");
    include("../utilities/navibar.php");
    include("../utilities/BaseJs.php");
    include("../utilities/Charts.php");
?>
        <script src="../../../resources/custom/highcharts/highcharts.js"></script>
        <script src="../../../resources/custom/highcharts/modules/data.js"></script>
        <script src="../../../resources/custom/highcharts/modules/exporting.js"></script>
        <script src="../../../resources/custom/highcharts/modules/drilldown.js"></script>
        
        <!-- begin #content -->
        <div id="content" class="content">
            
            <!-- begin page-header -->
                <h1 class="page-header">Dashboard</h1>
            <!-- end page-header -->
            <!--Line Divider-->
                <div class="row" style="padding: 1px; background-color: #262626; margin-bottom: 20px"></div>
            <!--Line Divider-->


            <!-- START CUSTOM CONTENT-->
                    <!-- begin #content -->
                    <div id="content" class="col-md-12">
                        <?php include("get_view_details_admin_dashboard_count.php");?>
                        <!-- begin row -->
                        <div class="row">
                            <!-- begin col-3 -->
                            <div class="col-lg-3 col-md-6">
                                <div class="widget widget-stats bg-gradient-lime">
                                    <div class="stats-icon stats-icon-lg"><i class="fa fa-users fa-fw"></i></div>
                                    <div class="stats-content">
                                        <div class="stats-title" style="font-size: 15px">Total Number of User Accounts</div>
                                        <div class="stats-number"><?php echo $count_users; ?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-3 -->
                            <!-- begin col-3 -->
                            <div class="col-lg-3 col-md-6">
                                <div class="widget widget-stats bg-gradient-aqua">
                                    <div class="stats-icon stats-icon-lg"><i class="fa fa-map-marker-alt fa-fw"></i></div>
                                    <div class="stats-content">
                                        <div class="stats-title" style="font-size: 15px">Total Number of District Entities</div>
                                        <div class="stats-number"><?php echo $count_districts; ?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-3 -->
                            <!-- begin col-3 -->
                            <div class="col-lg-3 col-md-6">
                                <div class="widget widget-stats bg-gradient-purple">
                                    <div class="stats-icon stats-icon-lg"><i class="fa fa-map fa-fw"></i></div>
                                    <div class="stats-content">
                                        <div class="stats-title" style="font-size: 15px">Total Number of Municipal Entities</div>
                                        <div class="stats-number"><?php echo $count_munic; ?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-3 -->
                            <!-- begin col-3 -->   
                            <div class="col-lg-3 col-md-6">
                                <div class="widget widget-stats bg-gradient-green">
                                    <div class="stats-icon stats-icon-lg"><i class="fa fa-map-signs fa-fw"></i></div>
                                    <div class="stats-content">
                                        <div class="stats-title" style="font-size: 15px">Total Number of Barangay Entities</div>
                                        <div class="stats-number"><?php echo $count_brgy; ?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-3 -->
                        </div>
                        <!-- end row -->
                        <!-- begin row -->
                        <div class="row">
                            <!-- begin col-3 -->
                            <div class="col-lg-3 col-md-6">
                                <div class="widget widget-stats bg-gradient-orange">
                                    <div class="stats-icon stats-icon-lg"><i class="fa fa-th fa-fw"></i></div>
                                    <div class="stats-content">
                                        <div class="stats-title" style="font-size: 15px">Total Number of Land-Use Entities</div>
                                        <div class="stats-number"><?php echo $count_landuse; ?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-3 -->
                            <!-- begin col-3 -->
                            <div class="col-lg-3 col-md-6">
                                <div class="widget widget-stats bg-gradient-black">
                                    <div class="stats-icon stats-icon-lg"><i class="fa fa-building fa-fw"></i></div>
                                    <div class="stats-content">
                                        <div class="stats-title" style="font-size: 15px">Total Number of Infrastructures</div>
                                        <div class="stats-number"><?php echo $count_infra; ?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-3 -->
                            <!-- begin col-3 -->
                            <div class="col-lg-3 col-md-6">
                                <div class="widget widget-stats bg-gradient-red">
                                    <div class="stats-icon stats-icon-lg"><i class="fa fa-exclamation-circle fa-fw"></i></div>
                                    <div class="stats-content">
                                        <div class="stats-title" style="font-size: 15px">Total Number of Hazard Entities</div>
                                        <div class="stats-number"><?php echo $count_hazard; ?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-3 -->
                            <!-- begin col-3 -->   
                            <div class="col-lg-3 col-md-6">
                                <div class="widget widget-stats bg-gradient-blue">
                                    <div class="stats-icon stats-icon-lg"><i class="fa fa-book fa-fw"></i></div>
                                    <div class="stats-content">
                                        <div class="stats-title" style="font-size: 15px">Total Number of References</div>
                                        <div class="stats-number"><?php echo $count_reference; ?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-3 -->
                        </div>
                        <!-- end row -->
                        
                       
                        <!-- begin ow on three charts of application -->
                        <div class="row">
                            <!-- begin col-6 -->
                            <div class="col-md-12">
                                <div class="widget-chart with-sidebar bg-black">
                                    <div class="widget-content" style="margin:15px">
                                        <h4 class="chart-title">
                                           Total Logged-In Count Per User types
                                            <small>&nbsp;Basis of measurement for users with the most higher percentage of system usage.</small>
                                        </h4>
                                        <div id="visitors-line-chart" class="widget-chart-full-width nvd3-inverse-mode">
                                            <div class="col-md-12" >
                                                <div id="most_login"></div>
                                                    <script type="text/javascript">
                                                        Highcharts.chart('most_login', {
                                                        chart: {
                                                        type: 'bar'
                                                        },
                                                        title: {
                                                            text: 'Total Count of Log Ins Per User Types'

                                                        },
                                                        xAxis: {
                                                            type: 'category',
                                                            title: {
                                                                text: null
                                                            },
                                                            min: 0,
                                                            scrollbar: {
                                                                enabled: true
                                                            },
                                                            tickLength: 0
                                                        },
                                                        yAxis: {
                                                            title: {
                                                                text: null
                                                            }
                                                        },
                                                        legend: {
                                                            enabled: false
                                                        },
                                                        plotOptions: {
                                                            series: {
                                                                borderWidth: 0,
                                                                dataLabels: {
                                                                    enabled: true,
                                                                    format: '{point.y:.0f}'
                                                                }
                                                            }
                                                        },

                                                        tooltip: {
                                                            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                                            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>Total Count of {point.y:.0f} Log-Ins.</b><br/>'
                                                        },

                                                        series: [
                                                            {
                                                                name: "User Type",
                                                                colorByPoint: true,
                                                                data: [
                                                                    <?php
                                                                       $level1 =  mysqli_query($connection,"SELECT DISTINCT usr_ID, usr_desc FROM `r_user_role` ");
                                                                       while($row1 = mysqli_fetch_assoc($level1))
                                                                       {
                                                                        $usr_ID = $row1["usr_ID"];
                                                                        $usr_desc = $row1["usr_desc"];
                                                                                   //echo $display;
                                                                                    //$InvQty = $row["Quantity"];
                                                                    ?> 
                                                                    {
                                                                        name: '<?php echo $usr_desc?>',
                                                                        y: <?php
                                                                             $get_logs = "SELECT * FROM `t_users_log` WHERE log_usertype = '$usr_ID'";
                                                                                
                                                                            if($logs_result = mysqli_query($connection,$get_logs))
                                                                            {
                                                                              // Return the number of rows in result set
                                                                              $count_logs = mysqli_num_rows($logs_result);
                                                                              
                                                                            }
                                                                            else
                                                                            { 
                                                                              $count_logs = 0;
                                                                            }
                                                                             echo $count_logs;

                                                                           ?>,
                                                                        
                                                                    },
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                ]
                                                            }
                                                        ]
                                                            
                                                        });

                                                    </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-6 -->
                        </div>
                        <!-- end row on three charts of application-->
                        <!-- begin ow on three charts of application -->
                        <div class="row">
                            <!-- begin col-6 -->
                            <div class="col-md-12">
                                <div class="widget-chart with-sidebar bg-black">
                                    <div class="widget-content" style="margin:15px">
                                        <h4 class="chart-title">
                                           Total Population Per Municipality 
                                            <small>&nbsp;Municipality of Batangas</small>
                                        </h4>
                                        <div id="visitors-line-chart" class="widget-chart-full-width nvd3-inverse-mode">
                                            <div class="col-md-12" >
                                                <div id="population"></div>
                                                    <script type="text/javascript">
                                                        Highcharts.chart('population', {
                                                        chart: {
                                                        type: 'column'
                                                        },
                                                        title: {
                                                            text: 'Total Population Count in Batangas as of 2015'

                                                        },
                                                        subtitle: {
                                                            text: 'Click to View Population Per Barangay'
                                                        },
                                                        xAxis: {
                                                            type: 'category',
                                                            title: {
                                                                text: null
                                                            },
                                                            min: 0,
                                                            scrollbar: {
                                                                enabled: true
                                                            },
                                                            tickLength: 0
                                                        },
                                                        yAxis: {
                                                            title: {
                                                                text: null
                                                            }
                                                        },
                                                        legend: {
                                                            enabled: false
                                                        },
                                                        plotOptions: {
                                                            series: {
                                                                borderWidth: 0,
                                                                dataLabels: {
                                                                    enabled: true,
                                                                    format: '{point.y:.0f}'
                                                                }
                                                            }
                                                        },

                                                        tooltip: {
                                                            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                                            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>Total Population of {point.y:.0f}</b><br/>'
                                                        },

                                                        series: [
                                                            {
                                                                name: "Municpality",
                                                                colorByPoint: true,
                                                                data: [
                                                                    <?php
                                                                       $level1 =  mysqli_query($connection,"SELECT DISTINCT munic_ID, munic_name FROM `r_municipality` ");
                                                                       while($row1 = mysqli_fetch_assoc($level1))
                                                                       {
                                                                        $munic_ID = $row1["munic_ID"];
                                                                        $munic_name = $row1["munic_name"];
                                                                                   //echo $display;
                                                                                    //$InvQty = $row["Quantity"];
                                                                    ?> 
                                                                    {
                                                                        name: '<?php echo $munic_name?>',
                                                                        y: <?php
                                                                                 $compute1 = mysqli_query($connection, "SELECT * FROM `r_barangay_population` AS POP
                                                                                                                            INNER JOIN `r_barangay` AS BRGY
                                                                                                                            ON POP.brgy_pop_refID = BRGY.brgy_ID
                                                                                                                            INNER JOIN `r_municipality` AS MUNIC
                                                                                                                            ON BRGY.brgy_municipality = MUNIC.munic_ID
                                                                                                                            WHERE BRGY.brgy_municipality = '$munic_ID' ");
                                                                                 $totalpop = 0;
                                                                                 while($row_compute = mysqli_fetch_assoc($compute1))
                                                                                 {
                                                                                    $population = $row_compute['brgy_pop_count'];
                                                                                    $totalpop = $population + $totalpop;
                                                                                   
                                                                                 }
                                                                                 echo $totalpop;

                                                                           ?>,
                                                                        drilldown: 'FOR<?php echo $munic_ID?>',
                                                                    },
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                ]
                                                            }
                                                        ],
                                                            drilldown: {
                                                               series: [
                                                                //requisition types
                                                               <?php
                                                                  $level1 =  mysqli_query($connection,"SELECT DISTINCT munic_ID, munic_name FROM `r_municipality` where munic_ID = '$munic_ID'");
                                                                  while($row1 = mysqli_fetch_assoc($level1))
                                                                  {
                                                                   $munic_ID = $row1["munic_ID"];
                                                                   $munic_name = $row1["munic_name"];
                                                                              //echo $display;
                                                                               //$InvQty = $row["Quantity"];
                                                               ?> 
                                                               {
                                                                  name: 'Barangay:',
                                                                  id: 'FOR<?php echo $munic_ID?>',
                                                                  type:'column',
                                                                  data: [
                                                                        <?php

                                                                             $view_query = mysqli_query($connection,"SELECT DISTINCT brgy_ID, brgy_name FROM `r_barangay`
                                                                                                                    WHERE brgy_municipality = '$munic_ID'");
                                                                              while($row = mysqli_fetch_assoc($view_query))
                                                                                  {   
                                                                                      $ID_select = $row["brgy_ID"];
                                                                                      $display = $row["brgy_name"];
                                                                                      //echo $display;
                                                                                       //$InvQty = $row["Quantity"];

                                                                        ?>

                                                                        { 
                                                                            name: '<?php echo $display ?>',
                                                                            y: <?php
                                                                                 $view_query1 = mysqli_query($connection,"SELECT DISTINCT brgy_pop_refID, 
                                                                                                                        brgy_pop_count FROM `r_barangay_population` AS POP
                                                                                                                        INNER JOIN `r_barangay` AS BRGY
                                                                                                                        ON POP.brgy_pop_refID = BRGY.brgy_ID
                                                                                                                        WHERE POP.brgy_pop_refID = '$ID_select' ");
                                                                                $getrow = mysqli_fetch_assoc($view_query1);
                                                                                $population = $getrow['brgy_pop_count'];
                                                                                if($population != NULL)
                                                                                {
                                                                                    $population = $getrow['brgy_pop_count'];
                                                                                }
                                                                                else
                                                                                {
                                                                                    $population = 0;
                                                                                }
                                                                                echo $population;
                                                                                    
                                                                                  
                                                                               ?>,
                                                                            
                                                                        },
                                                                        <?php
                                                                        }?>
                                                                  ]
                                                           
                                                                }, 
                                                            <?php
                                                              }
                                                            ?>
                                                               

                                                          ]
                                                        },

                                                       

                                                            
                                                            
                                                        });

                                                    </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-6 -->
                        </div>
                        <!-- end row on three charts of application-->
                    </div>
                    <!-- end #content -->
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

       
              
              

              
              
            