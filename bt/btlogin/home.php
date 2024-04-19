<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <form>
            <h1 style="color:blue">KẾT QUẢ ĐĂNG NHẬP</h1>
            <h2>Tài khoản: <p> <?php echo $_REQUEST['name']?> </p>
            </h2>
            <h2>Mật khẩu: <p> <?php echo $_REQUEST['pass']?> </p>
            </h2>
        </form>
    </div>
</body>

</html>