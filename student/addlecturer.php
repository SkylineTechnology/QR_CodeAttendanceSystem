<?php
session_start();
include 'include/connection.php';
include 'include/function.php';

if(!$_SESSION){
	header('location:login/login.php');
}

$userid = $_SESSION["userid"];
$role = $_SESSION["role"];


$msg1 = "";
$message1 = "";

$row = mysqli_fetch_array(mysqli_query($conn, "select * from login where username='$userid'"));

$fullname = $row['role'];



if(isset($_POST['submit'])){
	$lec_id = 'Lec-'.date('ism');
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$sex = $_POST['sex'];
    $date = date('Y-m-d');

	$cse_chk = mysqli_fetch_array(mysqli_query($conn, "select * from lecturer where lecturer_id='$lec_id'"));
if ($cse_chk > 0) {
		echo "<script>alert('Lecturer Already Exist'); window.location.href='addlecturer.php';</script>";
    } else {
		$add_lec = mysqli_query($conn, "insert into student values('$lec_id','$fullname','$email','$phone','$sex','','','lecturer','$date')");
        if($add_lec){
			$lec_login = mysqli_query($conn, "insert into login values('$email','$email','lecturer','active')");
			echo "<script>alert('Lecturer and Addedd succussfully'); window.location.href='addlecturer.php';</script>";
		}else{
            echo "<script>alert('Error occur please try after sometime'); window.location.href='addlecturer.php';</script>";
        }
	
  }
}


?>
<!DOCTYPE HTML>
<html>
<head>
<title>Add Course | <?php echo $sitename; ?></title>
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
				<h2 class="title1">Add Lecturer</h2>


				


				<div class="col-md-4 compose-right widget-shadow">
					<div class="panel-default">
						<div class="panel-heading">
							Add New Lecturer
						</div>
						<div class="panel-body">
							
							<form class="com-mail" action="" method="post">
								<input type="text" name="fullname" class="form-control1 control3" placeholder="Lecturer Name ">
								<input type="email" name="email" class="form-control1 control3" placeholder="Lecturer Email ">
								<input type="text" name="phone" class="form-control1 control3" placeholder="Lecturer Phone ">
								<select name="sex" class="form-control1 control3">
                                        <option value="">Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select> 
								<input type="submit" name="submit" value="Add Lecturer"> 
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