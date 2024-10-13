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
            <h1><a class="navbar-brand" href="index.html"><span class="fa fa-area-chart"></span> QR-CODE<span class="dashboard_text">Attendance System</span></a></h1>
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
                <a href="managestudent.php">
                <i class="fa fa-dashboard"></i> <span>Manage Student</span>
                </a>
              </li>
              <li class="treeview">
                <a href="addcourse.php">
                <i class="fa fa-dashboard"></i> <span>Add Courses</span>
                </a>
                <li class="treeview">
                <a href="addlecturer.php">
                <i class="fa fa-dashboard"></i> <span>Add Lecturer</span>
                </a>
              </li>
              <li class="treeview">
                <a href="managecourse.php">
                <i class="fa fa-dashboard"></i> <span>Manage Courses</span>
                </a>
              </li>
              <li class="treeview">
                <a href="attendance.php">
                <i class="fa fa-dashboard"></i> <span>Manage Attendance</span>
                </a>
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