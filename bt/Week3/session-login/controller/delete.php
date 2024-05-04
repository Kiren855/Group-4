<?php
include("../controller/checkLogin.php");
include("../db/db-connect.php");

if (isset($_GET['file_id'])) {
    $file_id = $_GET['file_id'];

    $conn = connectDB();

    $query = "SELECT file_name FROM files WHERE file_id = $file_id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $file_name = $row['file_name'];

        $upload_dir = "../upload/";
        $file_path = $upload_dir . $file_name;
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        $delete_query = "DELETE FROM files WHERE file_id = $file_id";
        mysqli_query($conn, $delete_query);

        echo "<script>alert('Xoá file thành công');</script>";
        echo "<script>window.location.href='../view/home.php';</script>";
    } else {
        echo "<script>alert('Xoá file thất bại thành công');</script>";
        echo "<script>window.location.href='../view/home.php';</script>";
    }
} else {
    echo "<script>alert('Không tồn tại file');</script>";
    echo "<script>window.location.href='../view/home.php';</script>";
}
