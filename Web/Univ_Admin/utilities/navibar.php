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
            <a href="references.php">
                <i class="fa fa-book"></i>
                <span>References</span>
            </a>  
          </li>
          <li class="has-sub">
            <a href="javascript:;">
              <b class="caret"></b>
              <i class="fa  fa-user"></i> 
              <span>Manage Applicants</span>
            </a>
            <ul class="sub-menu">
                <li><a href="applicant_add.php">Add Applicant</a></li>
                <li><a href="applicant_manage.php">View Applicants</a></li>
            </ul>
          </li>
          <li class="has-sub">
            <a href="javascript:;">
              <b class="caret"></b>
              <i class="fa  fa-expand-arrows-alt"></i> 
              <span>Zoning Applications</span>
            </a>
            <ul class="sub-menu">
                <li><a href="zone_app_add.php">Create Application</a></li>
                <li><a href="zone_app_manage.php">Manage Pending Applications</a></li>
                <li><a href="zone_app_revision.php">Review For Revision Applications</a></li>
                <li><a href="zone_app_close.php">View Approved Applications</a></li>
            </ul>
          </li>
          
          <li class="has-sub">
            <a href="javascript:;">
              <b class="caret"></b>
              <i class="fa fa-cogs"></i> 
              <span>Report</span>
            </a>
            <ul class="sub-menu">
                <li><a href="report_applicant.php">Applicants' Report</a></li>
                <li><a href="report_zoning.php">Zoning Report</a></li>
            </ul>
          </li>
          <hr>
        </ul>
        <!-- end sidebar nav -->
      </div>
      <!-- end sidebar scrollbar -->
    </div>
    <div class="sidebar-bg"></div>
    <!-- end #sidebar -->