<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <!-- Ví dụ 1 của trang 8 - tuần 1 -->

    <p>Văn bản HTML.</p>
    <?php
        echo '<p>Văn bản PHP!</p>';
    ?>
    <p>Văn bản HTML khác.</p>

    <!-- Ví dụ 3 của trang 10 - tuần 1 -->

    <?='<p>Some text to output.</p>'?>
    <?php
        echo '<p>Some text to output.</p>';
    ?>

    <!-- Phạm vi hoạt động của biến -->
    <!-- Ví dụ trang 18 - tuần 1  -->
    <?php
        function Test()
        {
            $a=5;
            echo $a; // phạm vi cục bộ
        }
        Test();
        // echo $a;
    ?>

    <!-- Ví dụ trang 20 - tuần 1  -->
    <?php
        $a = 1;
        $b = 2;
        function Sum()
        {
            global $a, $b;
            $b = $a + $b;
        }
        Sum();
        echo $b;
    ?>
    <!-- Ví dụ trang 23 - tuần 1  -->
    <?php
    function Test1()
    {
        static $c = 0;
        echo $c;
        $c++;
        }
        Test(); 
        Test(); 
        Test(); 
    ?>
    <!-- Ví dụ về khai báo hằng  -->
    <!-- Ví dụ trang 29 -->
    <?php
        define("PI", 3.14);
        $r=10;
        $s= PI * pow($r ,2); 
        $p = 2 * PI * $r;
    ?>
    <!-- Ví dụ về kiểu dữ liệu  -->
    <?php
        $ket_qua = True; //boolean 
        $a = 1234; // hệ thập phân
        $b = -123; // số âm hệ thập phân
        $c = 0123; // hệ bát phân (bắt đầu bằng 0 theo sau là các ký số)
        $d = 0x1A; //
        $a = 1.234; //double
        $b = 1.2e3; // double
        $chuoi = 'Chúc mừng năm mới';
        echo "$chuoi 2024";
        $array = array(1, 2, 3, 4, 5); //array
        print_r($array);
        $n = 100;
        $arr1 = array($n);
        $arr2 = array(3, 4, 5);
        $arr3 = array(); //Mảng động
        $arr4 = array('hoten' => 'HTùng', //Mảng kết hợp
            'quequan' => 'LX',
            'tuoi' => 24,
            'IQ' => 'Rất cao');

        // Ví dụ về chuyển đổi kiểu dữ liệu 
        // Ví dụ trang 38 - tuần 1
        $don_gia = 5000;
        $so_luong = 100;
        $thanh_tien = (double)($so_luong*$don_gia);

        // Ví dụ về tham chiếu trong php
        // ví dụ trang 48 - tuần 1 
        $a = 10;
        $b = &$a;
        //take value
        echo $a;
        echo $b; 

        // Ví dụ về câu lệnh rẽ nhánh if....else 
        if (isset($_POST['so_luong'])) {
            $so_luong = $_POST['so_luong'];
        } else {
            $so_luong = 0;
        }
        if (isset($_POST['don_gia'])) {
            $don_gia = $_POST['don_gia'];
        } else {
            $don_gia = 0;
        }
        if ($so_luong <10)
            $thanh_tien = $so_luong * $don_gia;
        elseif 
            ($so_luong >= 10 and $so_luong <=20)
            $thanh_tien = ($so_luong * $don_gia) * 0.95;
        else
            $thanh_tien = ($so_luong * $don_gia) * 0.9;

        // Ví dụ về phần switch case
        // Đổi một số bất kỳ từ 0-9 thành chữ
        if (isset($_POST['so'])) {
            $so = $_POST['so'];
        } else {
            $so = 0;
        }
        switch($so)
        { 
            case 1:
                $chu = "Một";
                break;
            case 2:
                $chu = "Hai";
                break;
            case 3:
                $chu = "Ba";
                break;
            case 4:
                $chu = "Bốn";
                break;
            case 5:
                $chu = "Năm";
                break;
            case 6:
                $chu = "Sáu";
                break;
            case 7:
                $chu = "Bảy";
                break;
            case 8:
                $chu = "Tám";
                break;
            case 9:
                $chu = "Chín";
                break;
            default:
                $chu = "Đây không phải là số";
        }
        $thu = "Thứ hai";
        switch($thu)
            { 
                case "Thứ hai":
                    echo "Chúc một ngày làm việc tốt!";
                    break;
                case "Thứ ba":
                    echo "Chúc một ngày làm việc tốt!";
                    break;
                case "Thứ tư":
                    echo "Chúc một ngày làm việc tốt!";
                    break;
                case "Thứ năm":
                    echo "Chúc một ngày làm việc tốt!";
                    break;
                case "Thứ sáu":
                    echo "Chúc một ngày làm việc tốt!";
                    break;
                case "Thứ bảy":
                    echo "Chúc một ngày làm việc tốt!";
                    break;
                case "Chủ nhật":
                    echo "Cuối tuần vui vẻ";
                    break;
            }

            // Ví dụ về cách sử dụng break với continue 
        $so = 78;
        $kq = true;
        for($i = 2; $i < $so; $i++) { 
            if($so % $i == 0) {
                $kq = false;
                break;
            }
        }
        $tong =0;
        for($i = 1; $i <=10 ;$i++)
        { if($i % 2 == 0)
            continue;
            $tong = $tong + $i;
        }
        echo $tong; 
        $so = 121.1542;
        round($so,2); 
        round($so,-1);
        date("d/m/Y"); 
        function tinh_tong($a,$b)
        {
            $tong = 0;
            $tong = $a+$b;
            return $tong;
        }
        $so_a = 89;
        $so_b = 45;
        $tong_a_b = tinh_tong($so_a,$so_b);
        echo "Tổng của hai số a và b là: ".$tong_a_b;
    ?>
</body>
</html>