<?php

include('../controller/checkLogin.php');
include('../db/db-connect.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');

// User info
$userId = $_SESSION['userId'];

// File info
$files = $_FILES['myfile'];

$dir = "../upload/";
$successCount = 0;
$errorCount = 0;

// Loop through each file
for ($i = 0; $i < count($files['name']); $i++) {
    $file_name = $files['name'][$i];
    $file_type = $files['type'][$i];
    $file_size = $files['size'][$i];
    $upload_date = date("Y-m-d H:i:s");

    if ($file_size > 20971520) {
        echo "<script>alert('Upload file thất bại do size quá lớn');</script>";
        echo "<script>window.location.href='../view/home.php';</script>";
        exit;
    }

    if ($file_name != "") {
        $current_date = date("Ymd");
        $file_name_md5 = md5($file_name);

        $new_file_name = $current_date . '_' . $file_name_md5;
        $fileupload = $dir . $new_file_name;
        if (move_uploaded_file($files['tmp_name'][$i], $fileupload)) {

            $conn = connectDB();

            $query = "INSERT INTO files (file_name, file_type, file_size, upload_date, user_id)
             VALUES ('$new_file_name', '$file_type', '$file_size', '$upload_date', '$userId')";
            $insert_result = mysqli_query($conn, $query);

            if ($insert_result) {
                $successCount++;
            } else {
                $errorCount++;
            }
        } else {
            $errorCount++;
        }
    } else {
        $errorCount++;
    }
}

if ($successCount > 0) {
    echo "<script>alert('Upload file thành công');</script>";
} else {
    echo "<script>alert('Upload file thất bại');</script>";
}

echo "<script>window.location.href='../view/home.php';</script>";