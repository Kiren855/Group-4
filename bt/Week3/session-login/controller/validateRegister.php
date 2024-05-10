<?php
include('../db/db-connect.php');

$user = $_POST['username'];
$pass = $_POST['password'];

if ($user === "") {
    echo "<script>alert('Tài khoản không được để trống')</script>";
    echo "<script>window.location.href='../view/register.html';</script>";
} else if (!preg_match('/^[a-zA-Z]/', $user)) {
    echo "<script>alert('Tài khoản phải bắt đầu bằng một ký tự chữ')</script>";
    echo "<script>window.location.href='../view/register.html';</script>";
} else if (strlen($user) <= 4) {
    echo "<script>alert('Tài khoản phải có độ dài lớn hơn 5')</script>";
    echo "<script>window.location.href='../view/register.html';</script>";
} else if ($pass === "") {
    echo "<script>alert('Mật khẩu không được để trống')</script>";
    echo "<script>window.location.href='../view/register.html';</script>";
} else if (strlen($pass) <= 4) {
    echo "<script>alert('Mật khẩu phải có độ dài lớn hơn 5')</script>";
    echo "<script>window.location.href='../view/register.html';</script>";
} else {
    $con = connectDB();
    $query = "SELECT * FROM User WHERE TenUser='$user'";

    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Tài khoản đã tồn tại')</script>";
        echo "<script>window.location.href='../view/register.html';</script>";
    } else {
        $pass = md5($pass);
        $query = "INSERT INTO User(TenUser, MatKhau) VALUES ('$user', '$pass')";
        $insert_result = mysqli_query($con, $query);
        if ($insert_result) {
            echo "<script>alert('Tài khoản đăng ký thành công')</script>";
            echo "<script>window.location.href='../view/login.html';</script>";
        } else {
            echo "<script>alert('Đã xảy ra lỗi khi thực hiện đăng ký')</script>";
            echo "<script>window.location.href='../view/register.html';</script>";
        }
    }
}
