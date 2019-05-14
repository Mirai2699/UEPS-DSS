<!-- <link href="../../../resources/custom/print_format.css" media="print" rel="stylesheet" /> -->
<style type="text/css">
  @page {
    size:legal;
    margin-top: 0.4in; 
    margin-left: 0.7in;
    margin-right: 0.7in;
    margin-bottom: 0.7in;
   
  }
  hr {
     border: none; 
     border-bottom: 1px solid black;
  }
</style>


<div style="display: none">
  <div id="demo" class="panel-body" style="color: black">
     <!-- begin panel-body -->
     <!--For Details-->
     <?php include("get_view_details_zone_application.php");?>
     <!--For Details-->
     <div class="panel" style="font-family: arial;">
        <p style="font-size: 14px; text-align: center">
           Republic of the Philippines<br>
           Province of Batangas<br>
           Municipality of Tuy<br>
        </p>
        <p style="font-size: 15px; font-weight:bold; text-align: center; margin-top: 20px">OFFICE OF THE DEPUTIZED ZONING ADMINISTRATOR</p>
        <p style="font-size: 15px; font-weight:bold; text-align: center; margin-top: 30px">APPLICATION FOR LOCATIONAL CLEARANCE/CERTIFICATE OF ZONING COMPLIANCE</p>
        <hr>
        <table>
          <tr>
            <td style="width: 380px; font-size: 14px">
              1. NAME OF THE APPLICANT (Last, First, Middle)
              <br>&nbsp;&nbsp;&nbsp;
              <?php echo $compname; ?>
            </td>
            <td style="width: 350px; font-size: 14px">
               2. NAME OF CORPORATION
               <br>&nbsp;&nbsp;&nbsp;
               <?php echo $za_name_corporation; ?>
            </td>
          </tr>
        </table>
        <hr>
         <table>
          <tr>
            <td style="width: 380px; font-size: 14px">
              3. ADDRESS OF THE APPLICANT
              <br>&nbsp;&nbsp;&nbsp;
              <?php echo $za_app_address; ?>
            </td>
            <td style="width: 350px; font-size: 14px">
               4. ADDRESS OF CORPORATION
               <br>&nbsp;&nbsp;&nbsp;
               <?php echo $za_address_corporation; ?>
            </td>
          </tr>
        </table>
        <hr>
         <table>
          <tr>
            <td style="width: 380px; font-size: 14px">
              5. NAME OF AUTHORIZED REP
              <br>&nbsp;&nbsp;&nbsp;
              <?php echo $za_name_auth_rep; ?>
            </td>
            <td style="width: 350px; font-size: 14px">
               6. ADDRESS OF AUTHORIZED REP
               <br>&nbsp;&nbsp;&nbsp;
               <?php echo $za_address_auth_rep; ?>
            </td>
          </tr>
        </table>
        <hr>
         <table>
          <tr>
            <td style="width: 380px; font-size: 14px">
              7. PROJECT TYPE
              <br>&nbsp;&nbsp;&nbsp;
              <?php echo $za_project_type?>
            </td>
            <td style="width: 350px; font-size: 14px">
               8. PROJECT NATURE
               <br>&nbsp;&nbsp;&nbsp;
               <?php echo $za_project_nature?>
            </td>
          </tr>
        </table>
        <hr>
         <table>
          <tr>
            <td style="width: 380px;font-size: 14px">
              9. PROJECT LOCATION
              <br>&nbsp;&nbsp;&nbsp;
              <?php echo $za_loc_display;?> 
              <br>&nbsp;&nbsp;&nbsp;
              <small>(Number, Street/Brgy/Mun/Prov)</small>
            </td>
            <td style="width: 350px;font-size: 14px">
               10. PROJECT AREA (In Sq.M.)
               <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <?php echo $za_project_area?> Sq. m
            </td>
          </tr>
        </table>
        <hr>
         <table>
          <tr>
            <td style="width: 380px;font-size: 14px">
              11. RIGHT OVER LAND
              <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <?php echo $za_project_ROL; ?>
            </td>
            <td style="width: 350px;font-size: 14px">
               12. PPROJECT TENURE
               <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <?php echo $za_project_tenure?>
            </td>
          </tr>
        </table>
         <hr>
         <table>
          <tr>
            <td style="width: 400px;font-size: 14px">
              13. EXISTING LAND USE OF THE PROJECT SITE
              <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <?php echo $za_land_use_desc?>
            </td>
            <td style="width: 200px;font-size: 14px">
              TENANCY STATUS:
              <br>&nbsp;
             <?php echo $za_tenancy?>
            </td>
          </tr>
        </table>
         <hr>
         <table>
          <tr>
            <td style="width: 500px;font-size: 14px">
              14. PROJECT COST/CAPITALIZATION
              <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <small>(In pesos, in figures and in words)</small>
              <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              ₱ <?php echo $za_project_cost_num.'  ('.$za_project_cost_words.')'?>
            </td>
          </tr>
        </table>
        <hr>
        <p style="font-size: 14px; text-transform: uppercase; text-align: justify; ">
           15. Is the project applied for the subject of written notice(s) from the commission and/or its 
           deputized zoning administrator to the effect requiring for presentation of locational 
           clearance certificate of zoning compliane (LC/CZC) or to apply for LC/CZC?
        </p>
         <table>
          <tr>
            <td style="width: 50px;font-size: 14px">
              &nbsp;&nbsp;
              <b><?php echo $za_zoning_compliance?></b>
            </td>
            <td style="width: 600px;font-size: 14px">
              15.A.) Name of the HRLB Officer or Zoning Administrator who issued the notice(s): <u><?php echo $za_zoning_admin?></u><br>
              15.B.) Date(s) of Notice(s): <u><?php echo $za_zoning_notice_date?></u><br>
              15.C.) Order/Request indicated in the notice(s): <u><?php echo $za_zoning_notice_request_desc?></u>
            </td>
          </tr>
        </table>
         <hr>
        <p style="font-size: 14px; text-transform: uppercase; text-align: justify; ">
           16.   Is the project applied for the subject of similar application(s) with other 
           office of the commission and/or deputized by zoning administrator?
        </p>
         <table>
          <tr>
            <td style="width: 50px;font-size: 14px">
              &nbsp;&nbsp;
              <b><?php echo $za_similar_application?></b>
            </td>
            <td style="width: 600px;font-size: 14px">
              16.A.) Other HLRB office where similar applications were filled: <u><?php echo $za_simapp_other_office?></u><br>
              16.B.) Date Filled: <u><?php echo $za_simapp_date_filled?></u><br>
              16.C.) Action taken by mention in: <u><?php echo $za_simapp_action_taken?></u>
            </td>
          </tr>
        </table>
        <hr>
        <p style="font-size: 15px; text-transform: uppercase; text-align: justify; ">
           17. Preferred Mode of Release of Decision:
        </p>
         <table>
          <tr>
            <td style="width: 90px;font-size: 14px">
              &nbsp;&nbsp;
              <b><?php echo $za_mode_release?></b>
            </td>
            <td style="width: 600px;font-size: 14px">
              If by Mail, is addressed to: <u><?php echo $za_moderel_address_to?></u>
            </td>
          </tr>
        </table>
        <hr>
         <table style="margin-bottom: 20px">
          <tr>
            <td style="width: 380px; text-transform: uppercase;font-size: 14px">
              18. Signature of Applicant 
            </td>
            <td style="width: 350px; text-transform: uppercase;font-size: 14px">
                Signature of Authorized Rep.
            </td>
          </tr>
        </table>
        <hr>
        <table>
          <tr>
            <td style="width: 380px;font-size: 14px">
              Republic of the Philippines<br>
              Province of <u><?php echo $za_loc_province; ?></u> )S.S.<br>
              Municipality of <u><?php echo $munic_name; ?></u>
            </td>
          </tr>
        </table>
        <hr>
        <p style="text-align: justify;font-size: 14px">SUBSCRIBED AND SWORN TO before me this ________ day of ________ , <?php echo date('Y')?> in the 
           City/Municipality of <u><?php echo $munic_name; ?></u>,
           Province of <u><?php echo $za_loc_province; ?></u> affiant exhibited to me his/her
           Residence Certificate No.____________________ issued at ______________________
           on _________________.
        </p>
        <table>
          <tr>
            <td style="width: 500px;font-size: 14px">
              <br>
              Doc No._________<br>
              Page No._________<br>
              Book No.__________<br>
              Series of__________
            </td>
             <td style="width: 200px;">
              NOTARY PUBLIC
            </td>
          </tr>
        </table>
       
     </div>
     <!-- end panel-body -->
  </div>
</div>