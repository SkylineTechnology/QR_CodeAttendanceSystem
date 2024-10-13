<?php

$sitename = "QRCODE Attendance System";
$conn = mysqli_connect("localhost", "root", "", "studentinfo");
if (!$conn) {
    die(mysqli_error($conn) . "Error connecting Database!");
}
?>