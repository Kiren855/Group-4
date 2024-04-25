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


    // Chọn database quanlysach
    $conn->select_db("quanlysach");


    $sql = "SELECT * FROM tbl_nhaxuatban";
    $kq = $conn->query($sql);
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục nhà xuất bản</title>
</head>
<body>
    <h1>Danh Mục Nhà Xuất Bản</h1>
    <table border="1" cellpadding = "2" cellspacing = "0" width = "100%">
        <tr>
            <th>STT</th>
            <th>Mã nhà xuất bản</th>
            <th>Tên nhà xuất bản</th>
        </tr>
        <?php
            while ($dong = mysqli_fetch_array($kq)) {
                echo "<tr>";
                echo "<td>{$dong['stt']}</td>";
                echo "<td>{$dong['ma_nha_xuat_ban']}</td>";
                echo "<td>{$dong['ten_nha_xuat_ban']}</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>