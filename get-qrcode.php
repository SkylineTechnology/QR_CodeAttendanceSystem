<?php
session_start();
include 'includes/connection.php';
$code = isset($_SESSION["matno"]) ? $_SESSION["matno"] : "";
?>

<!DOCTYPE html>
<html lang="zxx">

    <head>
        <title>Download Login QR Code</title>
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
                                <h6 class="sec-one">Download Login QR Code</h6>
                                <div class="speci-login first-look">
                                    <img src="images/user.png" alt="" class="img-responsive">
                                </div>
                            </div>
                            <div class="bottom-content">
                                <p><img width="350" height="350" src="qrcode.php?s=qrl&d=<?php echo $code; ?>"></p>
                                <p>Download QR Code and GOTO <a href="index.php">Login</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- //login-section -->
    </body>
</html>