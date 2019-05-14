
    <title>Dashboard | UPDS</title>
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
                        <?php include("get_view_details_dashboard_count.php");?>
                        <!-- begin row -->
                        <div class="row">
                            <!-- begin col-3 -->
                            <div class="col-lg-3 col-md-6">
                                <div class="widget widget-stats bg-gradient-red">
                                    <div class="stats-icon stats-icon-lg"><i class="fa fa-exclamation-circle fa-fw"></i></div>
                                    <div class="stats-content">
                                        <div class="stats-title" style="font-size: 15px">Total Pending Applications</div>
                                        <div class="stats-number"><?php echo $count_pending; ?></div>
                                       
                                        <div class="stats-desc"><?php echo $pm_count_pending; ?> Only for this month of <?php echo $currmonth_desc?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-3 -->
                            <!-- begin col-3 -->
                            <div class="col-lg-3 col-md-6">
                                <div class="widget widget-stats bg-gradient-orange">
                                    <div class="stats-icon stats-icon-lg"><i class="fa fa-sync fa-fw"></i></div>
                                    <div class="stats-content">
                                        <div class="stats-title" style="font-size: 15px">Total For Revisions Applications</div>
                                        <div class="stats-number"><?php echo $count_forrevision; ?></div>
                                        <div class="stats-desc"><?php echo $pm_count_forrevision; ?> Only for this month of <?php echo $currmonth_desc?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-3 -->
                            <!-- begin col-3 -->
                            <div class="col-lg-3 col-md-6">
                                <div class="widget widget-stats bg-gradient-green">
                                    <div class="stats-icon stats-icon-lg"><i class="fa fa-check fa-fw"></i></div>
                                    <div class="stats-content">
                                        <div class="stats-title" style="font-size: 15px">Total Current Approved Applications</div>
                                        <div class="stats-number"><?php echo $count_approved; ?></div>
                                        <div class="stats-desc"><?php echo $pm_count_approved; ?> Only for this month of <?php echo $currmonth_desc?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-3 -->
                            <!-- begin col-3 -->   
                            <div class="col-lg-3 col-md-6">
                                <div class="widget widget-stats bg-gradient-black">
                                    <div class="stats-icon stats-icon-lg"><i class="fa fa-times fa-fw"></i></div>
                                    <div class="stats-content">
                                        <div class="stats-title" style="font-size: 15px">Total Closed Applications</div>
                                        <div class="stats-number"><?php echo $count_closed; ?></div>
                                        <div class="stats-desc"><?php echo $pm_count_closed; ?> Only for this month of <?php echo $currmonth_desc?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-3 -->
                        </div>
                        <!-- end row -->
                        <!-- begin row -->
                        <div class="row">
                            <!-- begin col-3 -->
                            <div class="col-lg-4 col-md-6">
                                <div class="widget widget-stats bg-gradient-aqua">
                                    <div class="stats-icon stats-icon-lg"><i class="fa fa-gavel fa-fw"></i></div>
                                    <div class="stats-content">
                                        <div class="stats-title" style="font-size: 15px">Total Project Developments</div>
                                        <div class="stats-number"><?php echo $disp_project_result; ?></div>
                                       
                                        <div class="stats-desc"><?php echo $disp_project_result_pm;  ?> Only for this month of <?php echo $currmonth_desc?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-3 -->
                            <!-- begin col-3 -->
                            <div class="col-lg-4 col-md-6">
                                <div class="widget widget-stats bg-gradient-purple">
                                    <div class="stats-icon stats-icon-lg"><i class="fa fa-chart-line fa-fw"></i></div>
                                    <div class="stats-content">
                                        <div class="stats-title" style="font-size: 15px">Total Zoning Issuances</div>
                                        <div class="stats-number"><?php echo $disp_issues_result; ?></div>
                                        <div class="stats-desc"><?php echo $disp_issues_result_pm; ?> Only for this month of <?php echo $currmonth_desc?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-3 -->
                            <!-- begin col-3 -->
                            <div class="col-lg-4 col-md-6">
                                <div class="widget widget-stats bg-gradient-lime">
                                    <div class="stats-icon stats-icon-lg"><i class="fa fa-dollar-sign fa-fw"></i></div>
                                    <div class="stats-content">
                                        <div class="stats-title" style="font-size: 15px">Total Collection from Issuance Payment</div>
                                        <div class="stats-number">₱ <?php echo $total_collection; ?></div>
                                        <div class="stats-desc">₱ <?php echo  $total_collection_pm; ?> Only for this month of <?php echo $currmonth_desc?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-4 -->

                        </div>
                        <!-- end row -->
                        
                        <!-- begin ow on line charts -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="widget-chart with-sidebar bg-black">
                                    <div class="widget-content" style="margin:15px">
                                        <h4 class="chart-title">
                                           Monthly Total Number of Zoning Applications of the Year <?php $curryear = date('Y'); echo $curryear; ?>
                                            <small>Collective Record of Transactions</small>
                                        </h4>
                                        <div id="visitors-line-chart" class="widget-chart-full-width nvd3-inverse-mode">
                                            <div class="col-md-12" >
                                                <div id="line"></div>
                                                <script type="text/javascript">
                                                    Highcharts.chart('line', {
                                                    chart: {
                                                        type: 'line'
                                                    },
                                                    title: {
                                                        text: 'Monthly Total Number of Applications Per Year'
                                                    },
                                                    xAxis: {
                                                        categories: [<?php
                                                                        $curryear = date("Y");

                                                                             $view_query2 = mysqli_query($connection,"SELECT DISTINCT month(za_add_timestamp) AS Month, monthname(za_add_timestamp) AS Name from t_zoning_application WHERE year(za_add_timestamp) = '$curryear'");
                                                                            while($row2 = mysqli_fetch_assoc($view_query2))
                                                                                {   
                                                                                    $eventMonth = $row2["Month"];
                                                                                    $m_name = $row2["Name"];
                                                                                    echo '\''.$m_name.'\',';
                                                                                }
                                                                     ?>
                                                              ]
                                                    },
                                                    yAxis: {
                                                        title: {
                                                            text: 'Number of Applications'
                                                        }
                                                    },
                                                    plotOptions: {
                                                        line: {
                                                            dataLabels: {
                                                                enabled: true
                                                            },
                                                            enableMouseTracking: true
                                                        }
                                                    },
                                                    series: [{
                                                        name: 'Number of Applications this Month',
                                                        data: [
                                                              <?php
                                                                $curryear = date("Y");

                                                                $view_query2 = mysqli_query($connection,"SELECT DISTINCT month(za_add_timestamp) AS Month, monthname(za_add_timestamp) AS Name from t_zoning_application WHERE year(za_add_timestamp) = '$curryear'");
                                                                    while($row2 = mysqli_fetch_assoc($view_query2))
                                                                        {   
                                                                            $eventMonth = $row2["Month"];
                                                                            $m_name = $row2["Name"];
                                                              ?>
                                                            {
                                                                    name: '<?php
                                                                              echo $m_name; 
                                                                           ?>',
                                                                    y: <?php 
                                                                          $view_query3 = mysqli_query($connection,"SELECT COUNT(*) AS rate FROM `t_zoning_application` WHERE month(za_add_timestamp) = '$eventMonth' ");
                                                                          while($row3 = mysqli_fetch_assoc($view_query3))
                                                                              {
                                                                                    $InvQty = $row3["rate"];
                                                                                    echo ($InvQty);
                                                                              }
                                                                       ?>
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
                        </div>
                        <!-- end row on line charts-->

                        <!-- begin ow on two charts of application -->
                        <div class="row">
                            <!-- begin col-6 -->
                            <div class="col-md-6">
                                <div class="widget-chart with-sidebar bg-black">
                                    <div class="widget-content" style="margin:15px">
                                        <h4 class="chart-title">
                                           Total Number of Applications Per Land Use
                                            <small>Collective Record of Transactions</small>
                                        </h4>
                                        <div id="visitors-line-chart" class="widget-chart-full-width nvd3-inverse-mode">
                                            <div class="col-md-12" >
                                                <div id="groupregion"></div>
                                                <script type="text/javascript">
                                                    Highcharts.chart('groupregion', {
                                                    chart: {
                                                        type: 'column'
                                                    },
                                                    title: {
                                                        text: 'Zoning Applications Per Land Use'
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
                                                        pointFormat: '<span style="color:{point.color}">{point.name}</span>:Total of  <b>{point.y:.0sf}</b><br/>'
                                                    },

                                                    series: [
                                                        {
                                                            name: "Application on Land Use:",
                                                            colorByPoint: true,
                                                            data: [
                                                                <?php
                                                                    $view_query = mysqli_query($connection,"SELECT * FROM `t_zoning_application` AS ZA
                                                                                                              INNER JOIN `r_land_use` AS LU
                                                                                                              ON ZA.za_land_use_ID = LU.lu_ID
                                                                                                          ");
                                                                        while($row = mysqli_fetch_assoc($view_query))
                                                                            {   
                                                                                $bygrp = $row["za_land_use_ID"];
                                                                                $name = $row["lu_desc"];
                                                                                //$InvQty = $row["Quantity"];
                                                                ?> 
                                                                    {
                                                                        name: '<?php echo $name?>',
                                                                        y: <?php
                                                                        $view_query2 = mysqli_query($connection,"SELECT COUNT(za_land_use_ID) AS rate FROM `t_zoning_application` WHERE za_land_use_ID = '$bygrp'");
                                                                            while($row2 = mysqli_fetch_assoc($view_query2))
                                                                                {   
                                                                                    $InvQty = $row2["rate"];
                                                                                    echo ($InvQty);
                                                                                }
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

                            <!-- begin col-6 -->
                            <div class="col-md-6">
                                <div class="widget-chart with-sidebar bg-black">
                                    <div class="widget-content" style="margin:15px">
                                        <h4 class="chart-title">
                                           Total Number of Applications Per Barangay
                                            <small>Collective Record of Transactions</small>
                                        </h4>
                                        <div id="visitors-line-chart" class="widget-chart-full-width nvd3-inverse-mode">
                                            <div class="col-md-12" >
                                                <div id="za_brgy"></div>
                                                <script type="text/javascript">
                                                    Highcharts.chart('za_brgy', {
                                                    chart: {
                                                        type: 'column'
                                                    },
                                                    title: {
                                                        text: 'Zoning Applications Per Barangay'
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
                                                        pointFormat: '<span style="color:{point.color}">{point.name}</span>:Total of  <b>{point.y:.0sf}</b><br/>'
                                                    },

                                                    series: [
                                                        {
                                                            name: "Applications in Barangay:",
                                                            colorByPoint: true,
                                                            data: [
                                                                <?php
                                                                    $view_query = mysqli_query($connection,"SELECT * FROM `t_zoning_application` AS ZA
                                                                                                              INNER JOIN `r_barangay` AS BRGY
                                                                                                              ON ZA.za_loc_brgy = BRGY.brgy_ID
                                                                                                          ");
                                                                        while($row = mysqli_fetch_assoc($view_query))
                                                                            {   
                                                                                $bygrp = $row["za_loc_brgy"];
                                                                                $name = $row["brgy_name"];
                                                                                //$InvQty = $row["Quantity"];
                                                                ?> 
                                                                    {
                                                                        name: '<?php echo $name?>',
                                                                        y: <?php
                                                                        $view_query2 = mysqli_query($connection,"SELECT COUNT(za_loc_brgy) AS rate FROM `t_zoning_application` WHERE za_loc_brgy = '$bygrp'");
                                                                            while($row2 = mysqli_fetch_assoc($view_query2))
                                                                                {   
                                                                                    $InvQty = $row2["rate"];
                                                                                    echo ($InvQty);
                                                                                }
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
                        <!-- end row on two charts of application-->
                        
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

       
              
              

              
              
            