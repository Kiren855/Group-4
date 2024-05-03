<?php
// Thông tin kết nối đến MySQL
$servername = "localhost:3306"; // Hoặc IP của máy chủ MySQL
$username = "root"; // Tên người dùng MySQL
$password = ""; // Mật khẩu MySQL

// Tạo kết nối đến MySQL
$conn = new mysqli($servername, $username, $password);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến MySQL thất bại: " . $conn->connect_error);
}

// Thiết lập ký tự UTF-8 cho kết nối
$conn->set_charset("utf8mb4");

// Tạo cơ sở dữ liệu pka_s với bộ ký tự UTF-8
$sql_create_database = "CREATE DATABASE IF NOT EXISTS pka_s CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
if ($conn->query($sql_create_database) === TRUE) {
    echo "Cơ sở dữ liệu pka_s đã được tạo thành công.<br>";
} else {
    echo "Lỗi khi tạo cơ sở dữ liệu: " . $conn->error . "<br>";
}

// Chọn cơ sở dữ liệu pka_s
$conn->select_db("pka_s");

// Tạo bảng SinhVien với bộ ký tự UTF-8
$sql_create_table_sinhvien = "CREATE TABLE IF NOT EXISTS SinhVien (
    MSSV VARCHAR(50) PRIMARY KEY UNIQUE,
    HoTen VARCHAR(255) NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
if ($conn->query($sql_create_table_sinhvien) === TRUE) {
    echo "Bảng SinhVien đã được tạo thành công.<br>";
} else {
    echo "Lỗi khi tạo bảng SinhVien: " . $conn->error . "<br>";
}

// Tạo bảng MonHoc với bộ ký tự UTF-8
$sql_create_table_monhoc = "CREATE TABLE IF NOT EXISTS MonHoc (
    MaMH VARCHAR(50) UNIQUE PRIMARY KEY,
    TenMH VARCHAR(255) NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
if ($conn->query($sql_create_table_monhoc) === TRUE) {
    echo "Bảng MonHoc đã được tạo thành công.<br>";
} else {
    echo "Lỗi khi tạo bảng MonHoc: " . $conn->error . "<br>";
}

// Tạo bảng DangKy với bộ ký tự UTF-8
$sql_create_table_dangky = "CREATE TABLE IF NOT EXISTS DangKy (
    MSSV VARCHAR(50),
    MaMH VARCHAR(50),
    Ky VARCHAR(255),
    FOREIGN KEY (MSSV) REFERENCES SinhVien(MSSV),
    FOREIGN KEY (MaMH) REFERENCES MonHoc(MaMH)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
if ($conn->query($sql_create_table_dangky) === TRUE) {
    echo "Bảng DangKy đã được tạo thành công.<br>";
} else {
    echo "Lỗi khi tạo bảng DangKy: " . $conn->error . "<br>";
}


$sql_insert_sinhvien = "INSERT INTO SinhVien (MSSV, HoTen) VALUES
    ('21011401', 'Nguyễn Văn A'),
    ('21011402', 'Trần Thị B'),
    ('21011403', 'Lê Văn C'),
    ('21011404', 'Phạm Thị D'),
    ('21011405', 'Hoàng Văn E'),
    ('21011406', 'Nguyễn Thị F'),
    ('21011407', 'Trần Văn G')";

if ($conn->query($sql_insert_sinhvien) === TRUE) {
    echo "Dữ liệu đã được chèn vào bảng SinhVien thành công.<br>";
} else {
    echo "Lỗi khi chèn dữ liệu vào bảng SinhVien: " . $conn->error . "<br>";
}

// Chèn dữ liệu vào bảng MonHoc
$sql_insert_monhoc = "INSERT INTO MonHoc (MaMH, TenMH) VALUES
    ('CSE702051-1-3-23(N01)', 'Mạng máy tính'),
    ('CSE702052-1-3-23(N02)', 'Điện toán đám mây'),
    ('CSE702053-1-3-23(N03)', 'Thiết kế web nâng cao'),
    ('CSE702054-1-3-23(N04)', 'Cấu trúc dữ liệu và thuật toán'),
    ('CSE702055-1-3-23(N05)', 'An toàn và bảo mật thông tin')";

if ($conn->query($sql_insert_monhoc) === TRUE) {
    echo "Dữ liệu đã được chèn vào bảng MonHoc thành công.<br>";
} else {
    echo "Lỗi khi chèn dữ liệu vào bảng MonHoc: " . $conn->error . "<br>";
}

// Chèn dữ liệu vào bảng DangKy
$sql_insert_dangky = "INSERT INTO DangKy (MSSV, MaMH, Ky) VALUES
    ('21011401', 'CSE702051-1-3-23(N01)', 'Kỳ 1'),
    ('21011402', 'CSE702052-1-3-23(N02)', 'Kỳ 1'),
    ('21011406', 'CSE702053-1-3-23(N03)', 'Kỳ 2'),
    ('21011404', 'CSE702054-1-3-23(N04)', 'Kỳ 2'),
    ('21011407', 'CSE702055-1-3-23(N05)', 'Kỳ 3')";
if ($conn->query($sql_insert_dangky) === TRUE) {
    echo "Dữ liệu đã được chèn vào bảng DangKy thành công.<br>";
} else {
    echo "Lỗi khi chèn dữ liệu vào bảng DangKy: " . $conn->error . "<br>";
}

// Đóng kết nối đến MySQL
$conn->close();
?>
