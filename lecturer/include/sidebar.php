<?php
$get_num = mysqli_num_rows(mysqli_query($conn, "select * from student where matno='$userid'"));
?>
<aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="index.html"><span class="fa fa-area-chart"></span>Secure<span class="dashboard_text">Learning System</span></a></h1>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <li class="treeview">
                <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>
              
              <li class="treeview">
                <a href="#">
                <i class="fa fa-envelope"></i> <span>Teach Class </span>
                <i class="fa fa-angle-left pull-right"></i><small class="label pull-right label-info1"></small></a>
                <ul class="treeview-menu">
                <?php
                 $result = mysqli_query($conn, "select * from course where status='activate'");
                                                
                  while ($row = mysqli_fetch_array($result)) {
                        $cse_code = $row["cse_code"];
                        $cse_name = $row["cse_name"];

                        $_SESSION['cse_code'] = $cse_code;
                        $_SESSION['cse_name'] = $cse_name;
                    ?>
                  <li><a href="class.php"><i class="fa fa-angle-right"></i><?php echo $cse_name; ?></a></li>
                  
                  <?php
                      }
                   ?>
                </ul>
              </li>
              
              <li class="treeview">
                <a href="changepass.php">
                <i class="fa fa-dashboard"></i> <span>Change Password</span>
                </a>
              </li>

              <li class="treeview">
                <a href="logout.php">
                <i class="fa fa-dashboard"></i> <span>Logout</span>
                </a>
              </li>
              
            </ul>
          </div>
          <!-- /.navbar-collapse -->
      </nav>
    </aside>