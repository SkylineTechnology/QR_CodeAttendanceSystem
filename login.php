<?php
session_start();
include 'includes/connection.php';
$error = "";

$userid = $_SESSION["userid"];

$cse_code = $_SESSION['cse_code'];
$cse_name = $_SESSION['cse_name'];

if (isset($_POST["submit"])) {
    $matno = $_POST["start"];
    $captcha = $_POST["captcha"];


    $email_chk = mysqli_query($conn, "select password from login where username='$matno'");
    $email_avail = mysqli_num_rows($email_chk);

    if ($email_avail > 0) {
        if ($userid ==  $matno) {
            $_SESSION["matno"] = $matno;

            $matric = $_SESSION['matno'];

            $row1 = mysqli_fetch_array(mysqli_query($conn, "select * from student where matno='$matric' "));
                $matric_no = $row1['matno'];
                $fullname = $row1['fullname'];
                $dept = $row1['department'];
                $level = $row1['level'];
                $date = date('Y-m-d H:i:s');

            $insert_attendance = mysqli_query($conn, "insert into attendance values('','$matric_no', '$fullname', '$dept', '$level', '$cse_name', '$date')");
            if($insert_attendance){
                echo "<script>alert('Attendance Taken Successful!'); window.location.href='student2/class.php';</script>";
            } 

        } else {
            echo "<script>alert('Invalid Captcha, please try again!')</script>";
        }
    } else {
        echo "<script>alert('Invalid QR-Code, please try again!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="zxx">

    <head>
        <title>QR-CODE Attendance</title>
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
        <script src="ht.js"></script>
        <style>
            .result{
                background-color: green;
                color:#fff;
                padding:20px;
            }
            .row{
                display:flex;
            }
        </style>
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
                            <div class="bottom-content">
                                <form action="" method="post"> 
                                    <div class="row form23 d-grid forms23-grids">
                                        <div class="col">
                                            <div style="width:100%;" id="reader"></div>
                                        </div><audio id="myAudio1">
                                            <source src="success.mp3" type="audio/ogg">
                                        </audio>
                                        <audio id="myAudio2">
                                            <source src="failes.mp3" type="audio/ogg">
                                        </audio>
                                        <script>
            var x = document.getElementById("myAudio1");
            var x2 = document.getElementById("myAudio2");
            function showHint(str) {
                if (str.length == 0) {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("txtHint").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "gethint.php?q=" + str, true);
                    xmlhttp.send();
                }
            }

            function playAudio() {
                x.play();
            }


                                        </script>
                                        <div class="col" style="padding:30px;">
                                            <h4>QR-CODE RESULT</h4>
                                            <!--   <div>Student Matric Number</div><form action=""> -->
                                            <input type="text" class="input-form" value="" name="start" required="required" id="result" onkeyup="showHint(this.value)" placeholder="result here" readonly="" />
                                      <!--  <p><span id="txtHint"></span></p> -->
                                            
                                        </div>
                                    </div>


                                    <button type="submit" name="submit" class="loginhny-btn btn">Login</button>
                                </form>
                                <p>Not yet registered? <a href="register.php">Signup</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- //login-section -->
    </body>
</html>
<script type="text/javascript">
    function onScanSuccess(qrCodeMessage) {
        document.getElementById("result").value = qrCodeMessage;
        showHint(qrCodeMessage);
        playAudio();

    }
    function onScanError(errorMessage) {
        //handle scan error
    }
    var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {fps: 10, qrbox: 250});
    html5QrcodeScanner.render(onScanSuccess, onScanError);

</script>