<?php
// Kiểm tra xem người dùng đã gửi dữ liệu từ form đăng ký chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem các trường dữ liệu có được điền đầy đủ không
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Lấy dữ liệu từ form
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = sha1($password);

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

        // Kiểm tra xem tên người dùng đã tồn tại trong cơ sở dữ liệu chưa
        $sql_check_username = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql_check_username);
        if ($result->num_rows > 0) {
            echo "Tên người dùng đã tồn tại. Vui lòng chọn một tên khác.";
        } else {
            // Thêm tên người dùng mới vào cơ sở dữ liệu
            $sql_insert_user = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            if ($conn->query($sql_insert_user) === TRUE) {
                echo "Đăng ký tài khoản thành công!";
            } else {
                echo "Lỗi khi đăng ký tài khoản: " . $conn->error;
            }
        }

        $conn->close();
    } else {
        echo "Vui lòng điền đầy đủ thông tin đăng ký.";
    }
}

?>
