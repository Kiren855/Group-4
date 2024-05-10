<?php
include('../controller/checkLogin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quan Ly Sach</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    include('../db/db-connect.php');

    $user = $_SESSION['user'];
    $user_id = $_SESSION['userId'];
    $conn = connectDB();

    if (!$conn)
        die("Connection failed: " . mysqli_connect_error());

    $query = "SELECT * FROM Sach";
    $result = mysqli_query($conn, $query);

    ?>
    <header>
        <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <div class="navbar-brand">HẾ Lô: <?php echo $user ?></div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                    <form action="../controller/logout.php" method="post">
                        <button class="btn btn-outline-success" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="content">
            <p>QUẢN LÝ SÁCH</p>
        </div>



        <table id="myTable2" class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th onclick="sortTable(0)" scope="col">Tên Sách</th>
                    <th onclick="sortTable(1)" scope="col">Số lượng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<th scope="row">' . $count++ . '</th>';
                    echo '<td class="filename-cell">' . $row['TenSach'] . '</td>';
                    echo '<td>' . $row['SoLuong'] . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>