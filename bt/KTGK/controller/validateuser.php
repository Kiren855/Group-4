<?php
include('../db/db-connect.php');

session_start();
$_SESSION['isLogin'] = false;

$user = $_POST['username'];
$pass = $_POST['password'];

$con = connectDB();
$query = "SELECT * FROM User WHERE TenUser='$user'";

$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $stored_password = $row['MatKhau'];
    $userId = $row['MaUser'];

    if (md5($pass) !== $stored_password) {
        echo "<script>alert('Tài khoản hoặc mật khẩu không chính xác');</script>";
        echo "<script>window.location.href='../view/login.html';</script>";
        exit;
    } else {
        $_SESSION['isLogin'] = true;
        $_SESSION['user'] = $user;
        $_SESSION['userId'] = $userId;
        header("location: ../view/Sach.php");
    }
} else {
    echo "<script>alert('Tài khoản hoặc mật khẩu không chính xác');</script>";
    echo "<script>window.location.href='../view/login.html';</script>";
    exit;
}
