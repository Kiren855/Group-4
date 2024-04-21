<?php
    $thu = readline("Nhập thứ của tuần: ");

    switch ($thu) {
        case "Thứ hai":
        case "Thứ ba":
        case "Thứ tư":
        case "Thứ năm":
        case "Thứ sáu":
            echo "Chúc một ngày làm việc tốt!";
            break;
        case "Thứ bảy":
        case "Chủ nhật":
            echo "Cuối tuần vui vẻ";
            break;
        default:
            echo "Thứ không hợp lệ.";
            break;
    }
?>