<?php
session_start();
include '../include/connection.php';
include '../include/functions.php';
$error = "";
if (isset($_POST["submit"])) {
    $fulname = secure($_POST["fullname"]);
    $email = secure($_POST["email"]);
    $phone = secure($_POST["phone"]);
    $gender = secure($_POST["gender"]);
    $password = $_POST["password"];
    $reg_date = date("Y-m-d");

    $email_chk = mysqli_query($conn, "select username from login where username='$email'");
    $email_avail = mysqli_num_rows($email_chk);

    if ($email_avail > 0) {
        echo "<script>alert('This email has already been registered, Please use another email!'); window.location.href='register'</script>";
    } else {
        $reg_member = mysqli_query($conn, "insert into registration values ('$fulname','$email','$phone','$gender','$reg_date')");

        if ($reg_member) {           
            $insert_login = mysqli_query($conn, "insert into login values ('$email','$password','user','active')");
           echo "<script>alert('Registration Successfull!'); window.location.href='login';</script>";
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
                                <h6 class="sec-one">Registration</h6>
                                <div class="speci-login first-look">
                                    <img src="images/user.png" alt="" class="img-responsive">
                                </div>
                            </div>
                            <div class="bottom-content">
                                <form action="" method="post">                                   
                                    <input type="text" name="fullname" class="input-form" placeholder=" Enter Fullname "
                                           required="required" />
                                    <input type="email" name="email" class="input-form" placeholder=" Enter Email "
                                           required="required" />
                                    <input type="text" name="phone" class="input-form" placeholder=" Enter Phone "
                                           required="required" />
                                    <select name="gender" class="input-form">
                                        <option value="">Select gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <input type="password" name="password" class="input-form"
                                           placeholder=" Password" required="required" />
                                    <button type="submit" name="submit" class="loginhny-btn btn">Register</button>
                                </form>
                                <p>Already registered? <a href="login">Login Here!</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- //login-section -->
    </body>

</html>