<?php

include('../controller/checkLogin.php');
include('../db/db-connect.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');

//user info
$userId = $_SESSION['userId'];

//file info
$file_name =  $_FILES['myfile']['name'];
$file_type =  $_FILES['myfile']['type'];
$file_size =  $_FILES['myfile']['size'];
$upload_date = date("Y-m-d H:i:s");

if ($file_size > 20971520) {
    echo "<script>alert('Upload file thất bại thành công do size quá lớn');</script>";
    echo "<script>window.location.href='../view/home.php';</script>";
    exit;
}

$dir = "../upload/";
if ($file_name != "") {
    $current_date = date("Ymd");
    $file_name_md5 = md5($file_name);

    $new_file_name = $current_date . '_' . $file_name_md5;
    $fileupload = $dir . $new_file_name;
    if (move_uploaded_file($_FILES['myfile']['tmp_name'], $fileupload)) {

        $conn = connectDB();

        $query = "INSERT INTO files (file_name, file_type, file_size, upload_date, user_id)
         VALUES ('$new_file_name', '$file_type', '$file_size', '$upload_date', '$userId')";
        $insert_result = mysqli_query($conn, $query);

        if ($insert_result) {
            echo "<script>alert('Upload file thành công');</script>";
            echo "<script>window.location.href='../view/home.php';</script>";
        } else {
            echo "<script>alert('upload file thất bại thành công')</script>";
            echo "<script>window.location.href='../view/home.php';</script>";
        }
    } else {
        echo "<script>alert('upload file thất bại thành công')</script>";
        echo "<script>window.location.href='../view/home.php';</script>";
    }
} else {
    echo "<script>alert('Vui lòng chọn file upload')</script>";
    echo "<script>window.location.href='../view/home.php';</script>";
}
