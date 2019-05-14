<div class="cover with-shadow"></div>
<div class="image">
  <?php  
     $view_query = mysqli_query($connection,"SELECT * FROM `t_user_accounts` AS ACC 
                                             INNER JOIN `r_user_role` AS USR 
                                             INNER JOIN `r_user_profile` AS EMP 
                                             ON  ACC.acc_user_role = USR.usr_ID
                                             and ACC.acc_profID = EMP.up_ID
                                             WHERE ACC.acc_ID = '$userID'");
     while ($row = mysqli_fetch_array($view_query)) 
     {
       $pic = $row['up_picture'];

       if($pic != NULL)
       {
          echo '<img src="../../../resources/images/'.$pic.'"  alt="">';
       }
       else if ($pic == NULL)
           echo '<img src="../../../resources/images/default.png"  alt="">';
     }
   ?> 
</div>
<div class="info">
   <?php echo $compname; ?>
  <small><?php echo $up_pos; ?></small>
</div>