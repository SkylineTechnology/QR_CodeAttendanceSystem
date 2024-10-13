<?php
session_start();
include 'include/connection.php';
include 'include/functions.php';

if(!$_SESSION){
	header('location:login/login.php');
}

$userid = $_SESSION["userid"];
$role = $_SESSION["role"];

$row = mysqli_fetch_array(mysqli_query($conn, "select * from login where username='$userid'"));
$fullname = $row['role'];


if (isset($_GET['del'])) {
    $c_id = $_GET['del'];
    
     $delete_stud = mysqli_query($conn, "delete from course where cse_code = '" . $c_id . "'");
           
    if ($delete_stud) {
        echo "<script>alert('Course deleted succesfully!'); window.location.href='managecourse.php';</script>";
        
    } else {
        echo "<script>alert('Delete Operations Unsuccesfully!'); window.location.href='managecourse';</script>";
    }
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Attendance | <?php echo $sitename; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS -->

 <!-- side nav css file -->
 <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
 <!-- side nav css file -->
 
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		<?php
            include 'include/sidebar.php';
        ?>
	</div>
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
		<?php
            include 'include/header.php';
        ?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<h2 class="title1">Attendance</h2>
				

                <div class="bs-example widget-shadow" data-example-id="bordered-table"> 
						
                        <table class="table table-bordered"> 
                            <thead> 
                                <tr> 
                                    <th>#</th> 
                                    <th>Mat No</th> 
                                    <th>Fullname</th>
                                    <th>Department</th>
                                    <th>Level</th>
                                    <th>Course</th>
                                    <th>DateTime</th>
                                </tr> 
                            </thead> 
                                <tbody> 
                                <?php
                                            
                                            $get_rec = mysqli_query($conn, "select * from attendance");
                                            $a = 1;
                                               while ($row = mysqli_fetch_array($get_rec)) {
                                              $matno = $row['matric_no'];                     
                                               $fullname = $row["fullname"];
                                               $dept = $row['department'];
                                               $level = $row['level'];
                                               $cse = $row['course'];
                                               $datetime = $row['datetime'];
                      
                                                                      
                                           ?>
                                    <tr> 
                                        <th scope="row"><?php echo $a; ?></th> 
                                        <td><?php echo $matno; ?></td>
                                        <td><?php echo $fullname; ?></td> 
                                        <td><?php echo $dept; ?></td> 
                                        <td><?php echo $level; ?></td>
                                        <td><?php echo $cse; ?></td>
                                        <td><?php echo $datetime; ?></td>
                                        
                                        
                                    </tr> 

                                    <?php
                                    $a++;
                                        }
                                     ?>
                                   
                                </tbody> 
                            </table>
					</div>

				
						
			</div>
				</div>
				<div class="clearfix"> </div>	
			</div>
				
			</div>
		</div>

       
		<!--footer-->
		<?php
            include 'include/footer.php';
        ?>
        <!--//footer-->
	</div>
	
	<!-- side nav js -->
	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
		
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
   
</body>
</html>