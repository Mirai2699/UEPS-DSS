<?php 
 include("../../../db_con.php");
 $za_no = '2019-0001';
   $get_curr_za_iss = mysqli_query($connection,"SELECT zi_za_no FROM `t_zoning_issuance` WHERE zi_za_no = '$za_no' ");
      while($row_zone = mysqli_fetch_array($get_curr_za_iss))
      {  
         if(empty($row_zone['zi_za_no']))
         {
            echo '
            <a href="zone_iss_create.php?getID='.$za_ID.'" class="btn btn-success" style="font-size: 15px; margin-top: 10px;">
                <i class="fa fa-file-alt"></i>&nbsp;&nbsp;
               Issue Receipt
            </a>
            ';
         }
         else 
         {  echo
            '
             <a href="zone_iss_view_details.php?getNo='.$za_no.'" class="btn btn-primary" style="font-size: 15px; margin-top: 10px;">
                 <i class="fa fa-external-link-alt"></i>&nbsp;&nbsp;
                View Receipt
             </a>
            ';
         }
      }

?>