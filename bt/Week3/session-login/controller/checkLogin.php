<?php
session_start();

if (!isset($_SESSION['isLogin']) || !$_SESSION['isLogin']) {
    header("Location:../view/login.html");
    exit;
}
