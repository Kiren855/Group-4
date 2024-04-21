<?php
$user = $_POST['user'];
$pass = $_POST['pass'];

if ($user == "admin" && $pass == "12345") {
    echo "<font color=red> Welcome to, " . $user . "</font>";
} else {
    echo "<font color=red>Username hoặc password không chính xác, vui lòng đăng nhập lại</font>";
}
