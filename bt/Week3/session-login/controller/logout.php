<?php
session_start();

if ($_SESSION['isLogin'] === false) {
    header("location: ../view/login.html");
} else {
    unset($_SESSION['user']);
    $_SESSION['isLogin'] = false;
    header("location: ../view/login.html");
}
