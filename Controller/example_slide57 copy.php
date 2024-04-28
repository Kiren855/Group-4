<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  echo "Tên đăng nhập là: " . $username . "<br>";
  echo "Mật khẩu là: " . $password;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Form Đăng nhập</title>
</head>
<body>
  <h1>Đăng nhập hệ thống</h1>
  <form method="POST" action="Controller/example_slide125.php">
    <label for="username">Tên đăng nhập:</label>
    <input type="text" name="username" required><br>

    <label for="password">Mật khẩu:</label>
    <input type="password" name="password" required><br>

    <input type="submit" value="Đăng nhập">
  </form>
</body>
</html>