    <!-- begin #sidebar -->
    <div id="sidebar" class="sidebar">
      <!-- begin sidebar scrollbar -->
      <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
          <li class="nav-profile">
              <?php include("side-profile.php");?>
          </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
          <li class="nav-header">Navigation</li>
          <li class="has-sub">
            <a href="index.php">
                <i class="fa fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>  
          </li>
          <li class="has-sub">
            <a href="javascript:;">
              <b class="caret"></b>
              <i class="fa fa-users"></i> 
              <span>User Management</span>
            </a>
            <ul class="sub-menu">
                <li><a href="set_account.php">Create Account</a></li>
                <li><a href="view_acc_manage.php">Account Management</a></li>
            </ul>
          </li>
          <li class="has-sub">
            <a href="javascript:;">
              <b class="caret"></b>
              <i class="fa fa-cogs"></i> 
              <span>Configurations</span>
            </a>
            <ul class="sub-menu">
                <li><a href="set_district.php">Setup Districts</a></li>
                <li><a href="set_municipality.php">Setup Municipalities</a></li>
                <li><a href="set_barangay.php">Setup Barangays</a></li>
                <li><a href="set_land_use.php">Setup Land Use</a></li>
                <li><a href="set_infrastructure.php">Setup Infrastructures</a></li>
                <li><a href="set_hazard_terrain.php">Setup Hazard Terrain</a></li>
                <li><a href="set_reference.php">Setup References</a></li>
                <li><a href="set_requirements.php">Setup Requirements</a></li>
            </ul>
          </li>
           <li class="has-sub">
            <a href="set_master_ui.php">
              <i class="fa fa-image"></i> 
              <span>Change Default UI</span>
            </a>
          </li>
          <li class="has-sub">
            <a href="view_users_log.php">
              <i class="fa fa-laptop"></i> 
              <span>Users' Log</span>
            </a>
          </li>
          <hr>
        </ul>
        <!-- end sidebar nav -->
      </div>
      <!-- end sidebar scrollbar -->
    </div>
    <div class="sidebar-bg"></div>
    <!-- end #sidebar -->