<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Kết quả Đăng nhập</title>
</head>
<body>
  <h1>Kết quả Đăng nhập</h1>
  <p><?php echo isset($message) ? $message : ""; ?></p>
</body>
</html>