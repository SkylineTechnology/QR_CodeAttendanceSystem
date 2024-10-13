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
	
	$cse_code = $_POST['cse_code'];
	$cse_name = $_POST['cse_name'];
	$dept = $_POST['dept'];
	$level = $_POST['level'];
    $status = 'not active';

	$cse_chk = mysqli_fetch_array(mysqli_query($conn, "select cse_code from course where cse_code='$cse_code'"));
if ($cse_chk > 0) {
        //echo "<script>alert('This email is not a valid email, Please check and try again!'); window.location.href='compose'</script>";
		echo "<script>alert('Course Already Exist'); window.location.href='addcourse.php';</script>";
    } else {
		$insert_cse = mysqli_query($conn, "insert into course values('$cse_code','$cse_name','$dept','$level','$status')");

        if($insert_cse){
			$sql = "CREATE TABLE $cse_name (id INT(6) NOT NULL AUTO_INCREMENT, user_id VARCHAR(50) NOT NULL, fullname VARCHAR(100) NOT NULL, lecture VARCHAR(900000) NOT NULL, reg_date DATETIME, PRIMARY KEY (id))";
            $create_table = mysqli_query($conn, $sql);
			if($create_table){
				echo "<script>alert('Course and Addedd succussfully'); window.location.href='addcourse.php';</script>";
			}
		}else{
            echo "<script>alert('Error occur please try after sometime'); window.location.href='addcourse.php';</script>";
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
				<h2 class="title1">Add Course</h2>


				


				<div class="col-md-4 compose-right widget-shadow">
					<div class="panel-default">
						<div class="panel-heading">
							Add New Course
						</div>
						<div class="panel-body">
							
							<form class="com-mail" action="" method="post">
								<input type="text" name="cse_code" class="form-control1 control3" placeholder="Course Code">
								<input type="text" name="cse_name" class="form-control1 control3" placeholder="Course Name ">
                                <select name="dept" class="form-control1 control3">
                                        <option value="">Department</option>
                                        <option value="Computer Science">Computer Science</option>
                                        <option value="Science Laboratory Technology">Science Laboratory Technology</option>
                                        <option value="Building Technology">Building Technology</option>
                                        <option value="Computer Engineering">Computer Engineering</option>
                                        <option value="Science Laboratory Technology">Science Laboratory Technology</option>
                                    </select>  

                                    <select name="level" class="form-control1 control3">
                                        <option value="">Level</option>
                                        <option value="ND I">ND I</option>
                                        <option value="ND II">ND II</option>
                                        <option value="HND I">HND I</option>
                                        <option value="HND II">HND II</option>
                                    </select> 
								
								<input type="submit" name="submit" value="Add Course"> 
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