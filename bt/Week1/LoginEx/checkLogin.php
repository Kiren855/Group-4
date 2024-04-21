<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        form {
            width: 300px;
            margin: 0 auto;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
</head>

<body>

    <form action="" method="GET">
        <p style="text-align: center;font-size: 32px; color: blue;font-weight: bold;">Kết quả đăng nhập</p>
        <div>
            <?php
            if (isset($_POST["password"])) {
                $pass = $_POST["password"];
            } else {
                $pass = "";
            }
            if (isset($_POST["username"])) {
                $user = $_POST["username"];
            } else {
                $user = "";
            }

            ?>
            <label for="username">Tên đăng nhập:</label>
            <input value="<?php echo $user ?>" type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Mật khẩu:</label>
            <input value="<?php echo $pass ?>" type="text" id="password" name="password" required>
        </div>
        <a style="display: block;text-decoration: none;text-align: center;color: aquamarine;background-color: black;padding: 10px;border-radius: 4px;" href="./ex_page125.php">Quay lại</a>
    </form>

</body>

</html>