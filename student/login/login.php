<?php
session_start();
include '../include/connection.php';
$error = "";
if (isset($_POST["login"])) {
    $username = htmlentities(trim(addslashes($_POST["username"])));
    $password = $_POST["password"];

    $get_rec = mysqli_query($conn, "select * from login where password='$password' and username='$username' ");

    if (mysqli_num_rows($get_rec) > 0) {
        $row = mysqli_fetch_array($get_rec);
        $_SESSION["userid"] = $row["username"];
        $_SESSION["role"] = $row["role"];
         header("location:../index");
       
    } else {
        echo "<script>alert('Username and Password do not match,<br> please check and try again!');</script>";
        //$error = "Username and Password do not match,<br> please check and try again";
    }
}
?>

<!DOCTYPE html>
<html lang="zxx">

    <head>
        <title>Login</title>
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
                                <h6 class="sec-one">SECURE MAIL SYSTEM USING <br> ASYMMETRIC TECHNIQUES</h6>
                                <br>
                                <div class="speci-login first-look">
                                    <img src="images/user.png" alt="" class="img-responsive">
                                </div>

                            </div>
                            <div class="bottom-content">
                                <form action="" method="post">
                                    <input type="email" name="username" class="input-form" placeholder="Your Email"
                                           required="required" />
                                    <input type="password" name="password" class="input-form"
                                           placeholder="Your Password" required="required" />
                                    <p style="text-align: center; color:red;" ><?php echo $error; ?></p>
                                    <button type="submit" name="login" class="loginhny-btn btn">Login</button>
                                </form>
                              <p>Not a registered yet? <a href="register">Join Now!</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- //login-section -->
    </body>

</html>