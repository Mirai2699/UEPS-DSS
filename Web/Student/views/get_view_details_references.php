<?php

  $references = mysqli_query($connection,"SELECT * FROM `r_references` WHERE status = 1");
  while($row = mysqli_fetch_assoc($references))
  {
      $rf_ID = $row["id"];
      $rf_name = $row["file_name"];
      $rf_dateuploaded = new datetime($row["uploaded_on"]);
      $nf_dateup = $rf_dateuploaded->format('F d, Y');
      $rf_status = $row["status"];
      $file_path = '../../../resources/uploads/'.$rf_name;  

      echo
      '
         
          <div class="col-md-4">
             <a href="'.$file_path.'"> 
              <div class="panel" style="border-radius: 25px; border: 2px solid; margin-top:20px">
                  <div class="row" style="margin:5px">
                    <div class="col-md-3" style="font-size:80px; color: #132639">
                     <i class="fa fa-book"></i>
                    </div>
                    <div class="col-md-9" style="text-align:left; font-size: 14px">
                        <p style="color:#262626; font-weight:bold">'.$rf_name.'</p>
                         <p style="color:#262626; font-weight:bold">Date Uploaded: '.$nf_dateup.'</p>
                    </div>
                  </div>
              </div>
            </a>
          </div>
      ';
  } 

?>