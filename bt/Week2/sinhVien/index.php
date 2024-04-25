<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đăng ký</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4472c4;
        }
        tr:nth-child(even) {
            background-color: #cfd5ea;
        }
        tr:nth-child(odd) {
            background-color: #e9ebf5;
        }
    </style>
</head>
<body>

<?php
// Thông tin kết nối đến cơ sở dữ liệu
$servername = "localhost:3306"; // Hoặc IP của máy chủ MySQL
$username = "root"; // Tên người dùng MySQL
$password = ""; // Mật khẩu MySQL
$database = "pka_s"; // Tên cơ sở dữ liệu

// Tạo kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến MySQL thất bại: " . $conn->connect_error);
}

// Truy vấn SQL để lấy dữ liệu từ cơ sở dữ liệu
$sql = "SELECT SinhVien.MSSV, SinhVien.HoTen, DangKy.Ky, MonHoc.TenMH AS DangKy
        FROM DangKy
        INNER JOIN SinhVien ON DangKy.MSSV = SinhVien.MSSV
        INNER JOIN MonHoc ON DangKy.MaMH = MonHoc.MaMH";

$result = $conn->query($sql);

// Kiểm tra kết quả truy vấn
if ($result->num_rows > 0) {
    // Hiển thị dữ liệu trong bảng HTML
    echo "<h2>Danh sách đăng ký</h2>";
    echo "<table>";
    echo "<tr><th>MSSV</th><th>Họ tên</th><th>Kỳ</th><th>Đăng ký</th></tr>";

    // Vòng lặp để hiển thị từng hàng dữ liệu
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["MSSV"] . "</td>";
        echo "<td>" . $row["HoTen"] . "</td>";
        echo "<td>" . $row["Ky"] . "</td>";
        echo "<td>" . $row["DangKy"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Không có dữ liệu để hiển thị";
}

// Đóng kết nối đến MySQL
$conn->close();
?>

</body>
</html>
