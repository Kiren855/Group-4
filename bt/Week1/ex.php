<?php
//ltrim 
$text = "\t\tXin chào các bạn :)         ...               ";

echo ltrim($text);
echo "\n";

echo rtrim($text);
echo "\n";

echo chop($text, "\t.");
echo "\n";

echo trim($text);

//////////////////////////////////////
echo strtoupper("happy new year");

echo strtolower("HAPPY NEW YEAR");

echo ucfirst("happy new year");

echo ucwords("happy new year");

echo strlen($text);

echo strcmp("hello", "Hello");

echo strcmp("Hôm nay", "Thứ tư");

echo strnatcmp("hello", "Hello");
//////////////////////////////////////////

$email = "phuong@yahoo.com";
$domain = strstr($email, "@");
echo $domain;

////////////////////////////////////////

$str1 = "abc def g a";
$str2 = "g";
$vi_tri = strpos($str1, $str2);
if ($vi_tri === FALSE)
    echo "Không tìm thấy";
else
    echo "Vị trí tìm thấy :" . $vi_tri;

echo str_replace("em", "bé", "Hôm qua em đến trường");

//////////////////////////////////////////////
// Tách chuỗi thành mảng
$chuoi = "happy new year";
$mang_chuoi = explode(" ", $chuoi);
echo $mang_chuoi[0];
echo $mang_chuoi[1];
echo $mang_chuoi[2];

/////////////////////////////////////////////
//Gộp mảng thành chuỗi
$str = array("happy", "new", "year");
$chuoi = implode(" ", $str);
echo $chuoi;

//Bài tập 116
function normalize($st) {
    $st = trim($st);

    $st = preg_replace('/\s+/', ' ', $st);

    return $st;
}

echo normalize("3y4u 98yi4u    5456");


/////////////////////////////////
echo checkdate(11,30,2007);

echo date("d/m/Y h:m:s");

echo date("D-M-Y");

$tuan_sau = time() + (7 * 24 * 60 * 60);
// 7 days; 24 hours; 60 mins; 60secs
echo "Hiện tại:". date("Y-m-d") ."<br>";

echo "Tuần sau:" . date("Y-m-d", $tuan_sau) ."<br>";

echo strtotime("now");


