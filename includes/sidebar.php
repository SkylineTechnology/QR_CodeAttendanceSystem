<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	

        <div class="user-profile">
            <div class="ulogo">
                <a href="index">
                    <!-- logo for regular state and mobile devices -->
                    <h3><b>DISPLINARY-MGT</b></h3>
                </a>
            </div>
            <div class="profile-pic">
                <img src="../images/icon.png" alt="user">	
                <div class="profile-info"><h4><?php echo $userid; ?></h4>
                    <div class="list-icons-item dropdown">
                        <a href="#" class="list-icons-item dropdown-toggle btn-xs btn btn-primary text-white" data-toggle="dropdown"><span class="mr-2 badge badge-ring fill badge-warning"></span>Online</a>

                    </div>
                </div>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">
            <?php
            if ($role == "student") {
                ?>
                <li>
                    <a href="student-dashboard">
                        <i class="ti-agenda"></i>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="student-allegation">
                        <i class="ti-user"></i>
                        <span>Allegation</span></a>
                </li>

                <?php
            } elseif ($role == "admin") {
                ?>
                <li>
                    <a href="index">
                        <i class="ti-agenda"></i>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="admin-reg-invigilator">
                        <i class="ti-bolt"></i>
                        <span>Add/Manage Staff</span></a>
                </li> 

                <li>
                    <a href="misconduct-reports">
                        <i class="ti-agenda"></i>
                        <span>Misconduct Report(s)</span></a>
                </li> 
                <?php
            } elseif ($role == "invigilator") {
                ?>
                <li>
                    <a href="invigilator-dashboard">
                        <i class="ti-agenda"></i>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="invigilator-malpractice-report">
                        <i class="ti-bolt"></i>
                        <span>Misconduct Report</span></a>
                </li>
                <?php
            } elseif ($role == "emc") {
                ?>
                <li>
                    <a href="emc-dashboard">
                        <i class="ti-agenda"></i>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="emc-findings">
                        <i class="ti-agenda"></i>
                        <span>Submit Findings</span></a>
                </li>
                <?php
            }
            ?>



            <li>
                <a href="changepassword">
                    <i class="ti-lock"></i>
                    <span>Change Password</span></a>
            </li>
            <li>
                <a href="logout">
                    <i class="ti-power-off"></i>
                    <span>Log Out</span>
                </a>
            </li> 
        </ul>
    </section>
</aside>