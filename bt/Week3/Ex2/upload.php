<?php
$dir = $_SERVER['DOCUMENT_ROOT'] . "/Group-4/bt/Week3/Ex2/data/"; //Upload vào thư mục data
foreach ($_FILES['myfile']['error'] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['myfile']['tmp_name'][$key];
        $name = urlencode($_FILES['myfile']['name'][$key]);
        move_uploaded_file($tmp_name, $dir . $name);
        echo "Tập tin $name đã được tải lên thành công và lưu trữ trong thư mục data!<br>";
    } elseif ($error == UPLOAD_ERR_NO_FILE) {
        // Bỏ qua nếu không có tập tin nào được chọn
        continue;
    } else {
        // Xử lý lỗi nếu có
        echo "Có lỗi xảy ra khi tải lên tập tin $name!<br>";
    }
}
?>
