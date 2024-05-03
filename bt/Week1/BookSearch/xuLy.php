<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="xuly.php" Method="GET" >
        Từ khóa : <input type="text" name="txtTukhoa"/>
        <input type="submit" value="Tìm"/>
    </form>

    <?php
        if(isset($_REQUEST["txtTukhoa"])) {
            $sTukhoa = $_REQUEST["txtTukhoa"];
        }
        else {
            $sTukhoa = "";
        }
        if (isset($sTukhoa))
        {
            print "Từ khóa tìm sách là : $sTukhoa";
            echo "<br>Kết quả tìm là : ";
        }
    ?>
</body>
</html>