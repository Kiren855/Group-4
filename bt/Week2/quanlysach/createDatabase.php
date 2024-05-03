<?php
    // Thông tin kết nối
    $servername = "localhost:3306"; // Hoặc IP của máy chủ MySQL
    $username = "root"; // Tên người dùng
    $password = ""; // Mật khẩu
    //$dbname = "test"; // Tên cơ sở dữ liệu

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password);
    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối tới database thất bại: " . $conn->connect_error);
    }

    // Chuẩn bị câu lệnh SQL
    $sql = "SET NAMES 'utf8'";

    // Thực thi câu lệnh SQL
    $conn->query($sql);

    // Tạo database quanlysach
    $sql_create_db = "CREATE DATABASE IF NOT EXISTS quanlysach";
    $conn->query($sql_create_db);

    // Chọn database quanlysach
    $conn->select_db("quanlysach");


    // Câu lệnh tạo bảng
    $sql_create_table = "CREATE TABLE IF NOT EXISTS `tbl_nhaxuatban` (
        `stt` int NOT NULL AUTO_INCREMENT,
        `ma_nha_xuat_ban` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        `ten_nha_xuat_ban` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
        PRIMARY KEY (`stt`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

    // Thực thi câu lệnh tạo bảng
    $conn->query($sql_create_table);

    // Câu lệnh chèn dữ liệu
    $sql_insert_data = "INSERT INTO `tbl_nhaxuatban` (`stt`, `ma_nha_xuat_ban`, `ten_nha_xuat_ban`) VALUES
    (1, 'GD', 'Giáo Dục'),
    (2, 'HCM', 'Tổng hợp TP.Hồ Chí Minh'),
    (3 ,'NHV', 'Hội Nhà Văn'),
    (4, 'PN', 'Phụ Nữ'),
    (5, 'TN', 'Thanh Niên'),
    (6, 'VH', 'Văn Học'),
    (7, 'VHTT', 'Văn Hóa Thông Tin')";

    $conn->query($sql_insert_data);
    $conn->close();
?>