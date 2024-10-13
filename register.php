<?php
session_start();
include 'includes/connection.php';
$error = "";
if (isset($_POST["submit"])) {
    $fullname = $_POST["fullname"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $dept = $_POST["dept"];
    $level = $_POST["level"];
    $matno = $_POST["matno"];
    $date = date('Y-m-d');


    $email_chk = mysqli_query($conn, "select matno, email from student where matno='$matno' or email='$email'");
    $email_avail = mysqli_num_rows($email_chk);

    if ($email_avail > 0) {
        echo "<script>alert('This matno or email has already been registered, Please use another matno!'); window.location.href='register.php'</script>";
    } else {
        $reg_student = mysqli_query($conn, "insert into student values ('$matno','$fullname','$email','$phone','$gender','$dept','$level','student','$date')") or die(mysqli_error($conn));

        if ($reg_student) {
            $insert_login_details = mysqli_query($conn, "insert into login values ('$matno','$matno','student','active')") or die(mysqli_error($conn));
            if ($insert_login_details) {
                $_SESSION["matno"] = $matno;
                header("location:get-qrcode.php");
                //echo "<script>alert('Registration successfull'); window.location.href='login'</script>";
                //$alert = 'Your registeration is successfully!';
            } else {
                $alert = 'Operations Failed, Please Try after some minutes --- error 502!';
            }
        } else {
            echo "<script>alert('Operations Failed, Please Try after some minutes!')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="zxx">

    <head>
        <title>User Registration</title>
        <!-- Meta tag Keywords -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8" />
        <meta name="keywords"
              content="Trendz Login Form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script>
            addEventListener("load", function () {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>
        <!-- //Meta tag Keywords -->
        <!--/Style-CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
        <!--//Style-CSS -->
    </head>

    <body>
        <!-- /login-section -->

        <section class="w3l-forms-23">
            <div class="forms23-block-hny">
                <div class="wrapper">

                    <div class="d-grid forms23-grids">
                        <div class="form23">
                            <div class="main-bg">
                                <h6 class="sec-one">Student Registration</h6>
                                <div class="speci-login first-look">
                                    <img src="images/user.png" alt="" class="img-responsive">
                                </div>
                            </div>
                            <div class="bottom-content">
                                <form action="" method="post">    
                                    <input type="text" name="matno" class="input-form" placeholder="Matriculation Number"
                                           required="required" />

                                    <input type="text" name="fullname" class="input-form" placeholder="Enter Fullname"
                                           required="required" />
                                    <input type="email" name="email" class="input-form" placeholder=" Email"
                                           required="required" />
                                    <input type="text" name="phone" class="input-form" placeholder=" Phone"
                                           required="required" />
                                    <select name="gender" class="input-form">
                                        <option value="">Select gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>   
                                    <select name="dept" class="input-form">
                                        <option value="">Department</option>
                                        <option value="Computer Science">Computer Science</option>
                                        <option value="Science Laboratory Technology">Science Laboratory Technology</option>
                                        <option value="Building Technology">Building Technology</option>
                                        <option value="Computer Engineering">Computer Engineering</option>
                                        <option value="Science Laboratory Technology">Science Laboratory Technology</option>
                                    </select>  

                                    <select name="level" class="input-form">
                                        <option value="">Level</option>
                                        <option value="ND I">ND I</option>
                                        <option value="ND II">ND II</option>
                                        <option value="HND I">HND I</option>
                                        <option value="HND II">HND II</option>
                                    </select>  

                                    <button type="submit" name="submit" class="loginhny-btn btn">Register</button>
                                </form>
                                <p>Already registered? <a href="index.php">Already Registered? Login</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- //login-section -->
    </body>
</html>