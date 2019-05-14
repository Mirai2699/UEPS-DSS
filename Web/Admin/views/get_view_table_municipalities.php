<table id="data-table-default" class="table table-striped table-bordered">
  <thead>
  <tr>
      <th class="hidden">ID</th>
      <th>Name</th>
      <th>District</th>
      <th>Area (Per Sq. m<sup>2</sup>)</th>
      <th>Density (Per Sq. m<sup>2</sup>)</th>
      <th>Latitude</th>
      <th>Longtitude</th>
      <th style="text-align: center">Action</th>
  </tr>
  </thead>
  <tbody>
  <?php
      $view_query = mysqli_query($connection,"SELECT * FROM `r_municipality` AS MUNIC
                                                INNER JOIN `r_district` AS DST
                                                ON MUNIC.munic_district = DST.dstrct_ID
                                              WHERE munic_stat = 'Active' ");
      while($row = mysqli_fetch_assoc($view_query))
      {
          $ID = $row["munic_ID"];
          $munic_name = $row["munic_name"];
          $munic_district = $row["munic_district"];
          $munic_area = $row["munic_area"];
          $munic_density = $row["munic_density"];
          $munic_coor_lat = $row["munic_coor_lat"];
          $munic_coor_lng = $row["munic_coor_lng"];
          $munic_stat = $row["munic_stat"];
          $munic_timestamp = $row["munic_timestamp"];

          $munic_dst_desc = $row["dstrct_name"];
                      
  ?>      
      <tr class="gradeX">
          <td class="hidden"><?php echo $ID; ?></td>
          <td width=""><?php echo $munic_name ?></td>
          <td width=""><?php echo $munic_dst_desc; ?></td>
          <td width=""><?php echo $munic_area; ?></td>
          <td width=""><?php echo $munic_density ?></td>
          <td width=""><?php echo $munic_coor_lat; ?></td>
          <td width=""><?php echo $munic_coor_lng; ?></td>
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