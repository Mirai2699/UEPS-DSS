<!-- <link href="../../../resources/custom/print_format.css" media="print" rel="stylesheet" /> -->
<style type="text/css">
  @page {
    size:4.5in 7.5in;
    margin-top: 0.2in; 
    margin-left: 0.2in;
    margin-right: 0.2in;
    margin-bottom: 0.2in;

  }
</style>


<div style="display: none">
  <div id="demo" class="panel-body" style="color: black">
     <!-- begin panel-body -->
     <!--For Details-->
     <?php include("get_view_details_zone_issuance.php");?>
     <!--For Details-->
     <div class="panel" style="font-family: arial">
        <p style="font-size: 11px; text-align: center">
           Republic of the Philippines<br>
           Province of Batangas<br>
           Municipality of Tuy<br>
        </p>
        <p style="font-size: 12px; font-weight:bold; text-align: center; margin-top: 20px">OFFICE OF THE DEPUTIZED ZONING ADMINISTRATOR</p>
        <p style="font-size: 12px; font-weight:bold; text-align: center; margin-top: 20px">DECISION ON ZONING</p>
        <table style="font-size: 10px;">
          <tr>
            <td style="width: 60%">Application No: <u><?php echo $zi_za_no; ?></u></td>
            <td style="width: 50%">Decision No: <u><?php echo $zi_dec_no; ?></u></td>
          </tr>
          <tr>
            <td style="width: 60%">Date of Receipt:<u><?php echo $new_date_rpt; ?></u></td>
            <td style="width: 50%">Date of Receipt:<u><?php echo $new_date_rpt; ?></u></td>
          </tr>
        </table>
        
        <table style="font-size: 11px; border: 1px solid; font-weight: bold">
          <tr>
            <td style="width: 50%; border: 1px solid">APPPLICANT:<br>
              <i>
                <center><?php echo $compname; ?></center>
              </i>
            </td>
            <td style="width: 50%; border: 1px solid">NAME OF CORPORATION:<br>
              <i>
                <center><?php echo $za_name_corporation; ?></center>
              </i>
            </td>
          </tr>
          <tr>
            <td style="width: 50%; border: 1px solid">ADDRESS:<br>
              <i>
                <center><?php echo $za_app_address; ?></center>
              </i>
            </td>
            <td style="width: 50%; border: 1px solid">ADDRESS:<br>
              <i>
                <center><?php echo $za_address_corporation; ?></center>
              </i>
            </td>
          </tr>
          <tr>
            <td style="width: 50%; border: 1px solid">TYPE OF PROJECT:<br>
              <i>
                <center><?php echo $za_project_type; ?></center>
              </i>
            </td>
            <td style="width: 50%; border: 1px solid">AREA AND LOCATION:<br>
              <i>
                <center><?php echo $za_area_loc_display; ?></center>
              </i>
            </td>
          </tr>
          <tr>
            <td style="width: 50%; border: 1px solid">DECISION:<br>
              <i>
               <center><?php echo $zi_dec_desc; ?></center>
              </i>
            </td>
            <td style="width: 50%; border: 1px solid">RIGHT OVER LAND:<br>
              <i>
                <center><?php echo $zi_ROL_desc; ?></center>
              </i>
            </td>
          </tr>
        </table>

        <p style="font-size: 10px; font-weight: bold">Main Conditions</p>
          <?php
              $get_condition = mysqli_query($connection,"SELECT * FROM `t_zoning_issuance_conditions` AS ZIC
                                                          INNER JOIN `r_zoning_conditions` AS ZC
                                                          ON ZIC.zic_zc_no = ZC.zc_ID
                                                          WHERE ZIC.zic_dec_no = '$zdec_ID'
                                                          and ZC.zc_type = 'Main Condition'
                                                          ORDER BY ZIC.zic_zc_no ASC");
              while($row3 = mysqli_fetch_assoc($get_condition))
              {
                  
                  $zc_desc = $row3["zc_desc"];
                  
                      echo 
                      ' 
                        <p style="margin-top: 2px; margin-left:10px; font-size: 9px; text-align: justify"><b>-</b> '.$zc_desc.'</p>
                          
                      ';  
                  
              }         
          ?>      
        <p style="font-size: 10px; font-weight: bold">Additionals Conditions</p>
           <?php
               $get_condition = mysqli_query($connection,"SELECT * FROM `t_zoning_issuance_conditions` AS ZIC
                                                           INNER JOIN `r_zoning_conditions` AS ZC
                                                           ON ZIC.zic_zc_no = ZC.zc_ID
                                                           WHERE ZIC.zic_dec_no = '$zdec_ID'
                                                           and ZC.zc_type = 'Additional Condition'
                                                           ORDER BY ZIC.zic_zc_no ASC");
               while($row3 = mysqli_fetch_assoc($get_condition))
               {
                   
                   $zc_desc = $row3["zc_desc"];
                   
                       echo 
                       ' 
                         <p style="margin-top: 2px; margin-left:10px; font-size: 9px; text-align: justify"><b>-</b> '.$zc_desc.'</p>
                           
                       ';  
                   
               }         
           ?>    
        <p style="font-size: 10px; text-align: right; margin-top: 20px; margin-right: 30%;">BY THE AUTHORITY OF THE BOARD:</p> 
        <table style="font-size: 9px">
          <tr>
            <td>LC.NO. <u><?php echo $zi_lc_no?></u></td>
          </tr>
          <tr>
            <td>PMO NO./OR. <u><?php echo $zi_pmo_no; ?></u></td>
          </tr>
          <tr>
            <td>Date Issued: <u><?php echo $new_date_iss; ?></u></td>
          </tr>
          <tr>
            <td style="width: 60%">Amount Paid: <u>₱  <?php echo $zi_pay_amount; ?></u></td>
          </tr>
          <tr>
            <td style="width: 60%"></td>
            <td style="width: ">
                <p style="font-size: 10px; text-align: center;"><u style="font-weight: bold; text-transform: uppercase;"><?php echo $up_compname; ?></u>
                  <br>
                  MPDC/Dep. Zoning Administrator
                  <?php //echo $up_position;?>
                </p>
            </td>
          </tr>
        </table>
       
     </div>
     <!-- end panel-body -->
  </div>
</div>