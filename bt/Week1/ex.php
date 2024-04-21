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
$chuoi = "happy new year";
$mang_chuoi = explode(" ", $chuoi);
echo $mang_chuoi[0];
echo $mang_chuoi[1];
echo $mang_chuoi[2];


$str = array("happy", "new", "year");
$chuoi = implode(" ", $str);
echo $chuoi;
