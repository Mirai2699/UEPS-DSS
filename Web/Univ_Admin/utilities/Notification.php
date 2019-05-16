<ul class="navbar-nav navbar-right">
        <!-- <li class="dropdown">
          <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
            <i class="fa fa-bell"></i>
            <span class="label">5</span>
          </a>
          <ul class="dropdown-menu media-list dropdown-menu-right">
            <li class="dropdown-header">NOTIFICATIONS (5)</li>
            <li class="media">
              <a href="javascript:;">
                <div class="media-left">
                  <i class="fa fa-bug media-object bg-silver-darker"></i>
                </div>
                <div class="media-body">
                  <h6 class="media-heading">Server Error Reports <i class="fa fa-exclamation-circle text-danger"></i></h6>
                  <div class="text-muted f-s-11">3 minutes ago</div>
                </div>
              </a>
            </li>
            <li class="media">
              <a href="javascript:;">
                <div class="media-left">
                  <img src="../assets/img/user/user-1.jpg" class="media-object" alt="" />
                  <i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
                </div>
                <div class="media-body">
                  <h6 class="media-heading">John Smith</h6>
                  <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                  <div class="text-muted f-s-11">25 minutes ago</div>
                </div>
              </a>
            </li>
            <li class="media">
              <a href="javascript:;">
                <div class="media-left">
                  <img src="../assets/img/user/user-2.jpg" class="media-object" alt="" />
                  <i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
                </div>
                <div class="media-body">
                  <h6 class="media-heading">Olivia</h6>
                  <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                  <div class="text-muted f-s-11">35 minutes ago</div>
                </div>
              </a>
            </li>
            <li class="media">
              <a href="javascript:;">
                <div class="media-left">
                  <i class="fa fa-plus media-object bg-silver-darker"></i>
                </div>
                <div class="media-body">
                  <h6 class="media-heading"> New User Registered</h6>
                  <div class="text-muted f-s-11">1 hour ago</div>
                </div>
              </a>
            </li>
            <li class="media">
              <a href="javascript:;">
                <div class="media-left">
                  <i class="fa fa-envelope media-object bg-silver-darker"></i>
                  <i class="fab fa-google text-warning media-object-icon f-s-14"></i>
                </div>
                <div class="media-body">
                  <h6 class="media-heading"> New Email From John</h6>
                  <div class="text-muted f-s-11">2 hour ago</div>
                </div>
              </a>
            </li>
            <li class="dropdown-footer text-center">
              <a href="javascript:;">View more</a>
            </li>
          </ul>
        </li> -->
        <li class="dropdown navbar-user">
          <?php 

               $userID = $_SESSION['UserID'];
               $view_query = mysqli_query($connection,"SELECT * FROM `t_admin_accounts` AS ACC 
                                                       INNER JOIN `r_user_role` AS USR 
                                                       INNER JOIN `t_admin_users` AS EMP 
                                                       ON  ACC.acc_user_role = USR.usr_ID
                                                       and ACC.acc_userID = EMP.u_ID
                                                       WHERE ACC.acc_ID = '$userID'");
               while($row = mysqli_fetch_assoc($view_query))
               {
                   $ID = $row["acc_ID"];
                   $up_lname = $row["u_lastname"];
                   $up_mname = $row["u_middlename"];
                   $up_fname = $row["u_firstname"];
                   $up_pic = $row["u_picture"];
                   
                   $acc_username = $row["acc_username"];
                   $acc_password = $row["acc_password"];
                   $acc_user_role = $row["acc_user_role"];
                   $acc_role = $row["usr_desc"];

                   $compname = $up_fname.' '.$up_lname;
                   $rev_compname = $up_fname.' '.$up_lname;
               }
          ?>
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">

            <?php  
               $view_query = mysqli_query($connection,"SELECT * FROM `t_admin_accounts` AS ACC 
                                                       INNER JOIN `r_user_role` AS USR 
                                                       INNER JOIN `t_admin_users` AS EMP 
                                                       ON  ACC.acc_user_role = USR.usr_ID
                                                       and ACC.acc_userID = EMP.u_ID
                                                       WHERE ACC.acc_ID = '$userID'");
               while ($row = mysqli_fetch_array($view_query)) 
               {
                 $pic = $row['u_picture'];

                 if($pic != NULL)
                 {
                    echo '<img src="../../../resources/images/'.$pic.'"  alt="">';
                 }
                 else if ($pic == NULL)
                     echo '<img src="../../../resources/images/default.png"  alt="">';
               }
             ?> 

            <span class="d-none d-md-inline">
              <?php echo $compname; ?>
            </span> <b class="caret"></b>

          </a>
          <div class="dropdown-menu dropdown-menu-right"><!-- 
            <a href="javascript:;" class="dropdown-item">
              <span class="badge badge-danger pull-right">5</span> 
              Notification</a>
            <a href="javascript:;" class="dropdown-item">
              <span class="badge badge-danger pull-right">2</span> 
              Inbox
            </a> -->
            <a href="javascript:;" class="dropdown-item">Change Password</a>
            <div class="dropdown-divider"></div>
            <a href="../../../logout.php" class="dropdown-item">Log Out</a>
          </div>
        </li>
      </ul>