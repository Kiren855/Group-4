<?php
    if(empty($_POST["ten_dang_nhap"]))
    {
    echo "Vui lòng nhập tên đăng nhập";
    exit;
    }
    else
    echo "Xin chào ".$_POST["ten_dang_nhap"];
?>