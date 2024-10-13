<?php
session_start();
include '../includes/connection.php';
include 'include/functions.php';

if(!$_SESSION){
	header('location:login/login.php');
}

$userid = $_SESSION["userid"];
$role = $_SESSION["role"];

$message1 = "";
$message2 = "";
$message3 = "";

$row = mysqli_fetch_array(mysqli_query($conn, "select * from student where email='$userid'"));
$email = $row['email'];
$fullname = $row['fullname'];

if (isset($_POST["submit"])) {
    $op = $_POST["op"];
    $np = $_POST["np"];
    $cp = $_POST["cp"];

    $get_curr_pass = mysqli_query($conn, "select * from login where username='$userid'") or die(mysqli_error($conn));
    $curr_pass = mysqli_fetch_array($get_curr_pass);
    $pass = $curr_pass["password"];
    if ($op == $pass) {
        if ($np == $cp) {
            $update_pass = mysqli_query($conn, "update login set password='$np' where username='$userid'") or die(mysqli_error($conn));
            if ($update_pass) {
                $message1 = "password changed successfully";
            }
        } else {
            $message2 = "new password doesnt match confirm password!";
        }
    } else {
        $message3 = "incorrect old password, please try after some minute";
    }
}


?>
<!DOCTYPE HTML>
<html>
<head>
<title>Compose | <?php echo $sitename; ?></title>
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
			include 'include/sidebar.php'
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
			<div class="main-page compose">
				<h2 class="title1">Change password Page</h2>


				


				<div class="col-md-8 compose-right widget-shadow">
					<div class="panel-default">
						<div class="panel-heading">
							Change password 
						</div>
						<div class="panel-body">
							<div class="alert alert-info">
								<p style="color:green; font-size:19px"><?php echo $message1;  ?></p>
                                <p style="color:red; font-size:19px"><?php echo $message2;  ?></p>
                                <p style="color:red; font-size:19px"><?php echo $message3;  ?></p>
							</div>
							<form class="com-mail" action="" method="post">
								<input type="password" name="op" value="" class="form-control1 control3" placeholder="Enter old password">
								<input type="password" name="np" class="form-control1 control3" placeholder="Enter new password">
								<input type="password" name="cp" class="form-control1 control3" placeholder="Confirm new password">
								<input type="submit" name="submit" value="Change Password"> 
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>	
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