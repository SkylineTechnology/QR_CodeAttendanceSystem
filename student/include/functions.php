<?php

//include 'resize_img_code.php';


function secure($val) {
    $clean = htmlentities(addslashes($val));
    return $clean;
}


//getting date intervals
function gatDates($date) {
    $db_date = date_create($date);
    $current_date = date_create(date("Y-m-d H:i:s"));
    $date_diff = date_diff($current_date, $db_date);
    $min = $date_diff->format("%i");
    $day = $date_diff->format("%d");
    $month = $date_diff->format("%m");
    $hour = $date_diff->format("%h");
    $sec = $date_diff->format("%s");
    $year = $date_diff->format("%Y");
    if ($year > 0) {
        return $Year . " Year. " . $months . " months(s) ago ";
    } elseif ($month > 0) {
        return $month . " Month(s) " . $day . " day(s) ago ";
    } elseif ($month < 1 && $day > 0) {
        return $day . " day(s) " . $hour . " Hrs ago ";
    } elseif ($month < 1 && $day < 1 && $hour > 0) {
        return $hour . " Hr(s) " . $min . " mins ago ";
    } elseif ($month < 1 && $day < 1 && $hour < 1 && $min > 0) {
        return $min . " mins ago ";
    } else {
        return $sec . " secs ago ";
    }
}

//Upload audio media file 
function upload_audio($path1, $ext) {
    $aud_url = 'HFMIFileaud' . '_' . date('mdYHis.') . $ext;
    $bool = move_uploaded_file($path1, "media/audio/" . $aud_url);
    if ($bool == TRUE) {
        return $aud_url;
    } else {
        return "";
    }
}

//Upload video media file 
function upload_video($paths, $ext) {
    $vid_url = 'HFMIFilevid' . '_' . date('mdYHis.') . $ext;
    $bool = move_uploaded_file($paths, "media/video/" . $vid_url);
    if ($bool == TRUE) {
        return $vid_url;
    } else {
        return "";
    }
}

//Upload and Crop testimony images 
function upload_screenshot($path, $ext, $sn) {
    $img_url = 'img' . $sn . '_' . date('mdYHis.') . $ext;
    move_uploaded_file($path, "temp_img/" . $img_url);

    $resizeObj = new resize("temp_img/" . $img_url);
    $resizeObj->resizeImage(350, 350, 'exact');
    $resizeObj->saveImage("media/testifiers/" . $img_url, 100);
    unlink("temp_img/" . $img_url);
    return $img_url;
}

//Upload and Crop blog images 
function upload_art_img($path, $ext, $sn) {
    $img_url = 'art' . $sn . '_' . date('mdYHis.') . $ext;
    move_uploaded_file($path, "temp_img/" . $img_url);

    $resizeObj = new resize("temp_img/" . $img_url);
    $resizeObj->resizeImage(720, 330, 'exact');
    $resizeObj->saveImage("media/blog_images/" . $img_url, 100);
    unlink("temp_img/" . $img_url);
    return $img_url;
}

//Upload and Crop gallery images 
function upload_gallery_image($path, $ext, $sn) {
    $img_url = 'pic' . $sn . '_' . date('mdYHis.') . $ext;
    move_uploaded_file($path, "temp_img/" . $img_url);

    $resizeObj = new resize("temp_img/" . $img_url);
    $resizeObj->resizeImage(640, 380, 'exact');
    $resizeObj->saveImage("media/gallery/" . $img_url, 100);
    unlink("temp_img/" . $img_url);
    return $img_url;
}

//Get unique code
//Get unique code
function uniqueCode($conn) {
    $num_rows = mysqli_num_rows(mysqli_query($conn, "select * from customer")) + 1;
    $num_str_len = strlen($num_rows);

    switch ($num_str_len) {
        case 1:
            $zeroes = "000";
            break;
        case 2:
            $zeroes = "00";
            break;
        case 3:
            $zeroes = "0";
            break;
        default :
            $zeroes = "";
    }
    $id_code = "CUS-" . date("Y") . "/" . $zeroes . $num_rows;
    $check_code = mysqli_num_rows(mysqli_query($conn, "select cus_id from customer where cus_id='$id_code'"));
    if ($check_code > 0) {
        uniqueCode();
    } else {
        return $id_code;
    }
}

function sendsms_post($url, array $params) {
    $params = http_build_query($params);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

    $output = curl_exec($ch);

    curl_close($ch);
    return $output;
}

function validate_sendsms($response) {
    $validate = explode('||', $response);
    if ($validate[0] == '1000') {
        //return TRUE;
        //return custom response here instead.
        return 1;
    } else {
        return FALSE;
        //return custom response here instead.
    }
}

//Function to 
function upload_member_passport($path, $ext) {
    $img_url = 'PASSPORT-' . date('mdYHis.') . $ext;
    move_uploaded_file($path, "temp_img/" . $img_url);

    $resizeObj = new resize("temp_img/" . $img_url);
    $resizeObj->resizeImage(150, 200, 'exact');
    $resizeObj->saveImage("passport/" . $img_url, 100);
    unlink("temp_img/" . $img_url);
    return $img_url;
}
