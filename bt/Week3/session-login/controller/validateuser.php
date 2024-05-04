<?php
include('../db/db-connect.php');

session_start();
$_SESSION['isLogin'] = false;

$user = $_POST['username'];
$pass = $_POST['password'];

if ($user === "") {
    echo "<script>alert('Tài khoản không được để trống')</script>";
} else if ($pass === "") {
    echo "<script>alert('Mật khẩu không được để trống')</script>";
} else {
    $con = connectDB();
    $query = "SELECT * FROM users WHERE username='$user'";

    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['password'];
        $userId = $row['userId'];

        if (md5($pass) !== $stored_password) {
            echo "<script>alert('Tài khoản hoặc mật khẩu không chính xác');</script>";
            echo "<script>window.location.href='../view/login.html';</script>";
            exit;
        } else {
            $_SESSION['isLogin'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['userId'] = $userId;
            header("location: ../view/home.php");
        }
    } else {
        echo "<script>alert('Tài khoản hoặc mật khẩu không chính xác');</script>";
        echo "<script>window.location.href='../view/login.html';</script>";
        exit;
    }
}
