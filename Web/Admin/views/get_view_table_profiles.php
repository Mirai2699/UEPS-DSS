<table id="data-table-buttons" class="table table-striped table-bordered">
  <thead>
  <tr>
      <th class="hidden">ID</th>
      <th>Name</th>
      <th>Position</th>
      <th>Municipality</th>
      <th style="text-align: center">Action</th>
  </tr>
  </thead>
  <tbody>
  <?php
      $view_query = mysqli_query($connection,"SELECT * FROM `r_user_profile` AS UP
                                              INNER JOIN `r_municipality` AS MUNIC
                                              ON UP.up_municipality = MUNIC.munic_ID");
      while($row = mysqli_fetch_assoc($view_query))
      {
          $ID = $row["up_ID"];
          $lname = $row["up_lastname"];
          $mname = $row["up_middlename"];
          $mname = $row["up_middlename"];
          $fname = $row["up_firstname"];
          $position = $row["up_position"];
          $munic = $row["munic_name"];
          $compname = $fname.' '.$lname;
                      
  ?>      
      <tr class="gradeX">
          <td class="hidden"><?php echo $ID; ?></td>
          <td width=""><?php echo $compname ?></td>
          <td width=""><?php echo $position; ?></td>
          <td width=""><?php echo $munic; ?></td>
          <td style="text-align:center">
            <a href="" class="btn btn-warning">
              <i class="fa fa-edit"></i>
              Edit
            </a>
          </td>
      </tr>  
  <?php } ?>
  </tbody>                                 
</table>