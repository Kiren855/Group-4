<?php
session_start();
function authenticate_user($username, $password) {
    $servername = "localhost"; // Hoặc IP của máy chủ MySQL
    $db_username = "root"; // Tên người dùng MySQL
    $db_password = ""; // Mật khẩu MySQL
    $dbname = "users_db"; // Tên cơ sở dữ liệu

    // Tạo kết nối tới MySQL
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối tới MySQL thất bại: " . $conn->connect_error);
    }

    // Chuyển các ký tự đặc biệt thành các ký tự an toàn trong SQL
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);
    // echo $username;
    // echo $password;
    // Truy vấn kiểm tra tài khoản và mật khẩu
    $sql = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'";
    $result = $conn->query($sql);
    // while ($row = $result->fetch_assoc()) {
    //     print_r($row); // In ra mảng dữ liệu của hàng
    // }
    if ($result && $result->num_rows > 0) {
        
        $_SESSION["IsLogin"] = true;
        header("Location: home.php");
        exit();
    } else {
        header("Location: login.html");
        exit();
    }

    // Đóng kết nối
    $conn->close();
}

// Sử dụng hàm authenticate_user để kiểm tra tài khoản và mật khẩu
$username = $_POST['username']; 
$password = $_POST['password']; 
$password = sha1($password);
authenticate_user($username, $password);
?>
