<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <style>
    .content {
        display: flex;
        justify-content: space-between;
        margin-top: 50px;
    }

    .content p {
        font-size: 23px;
    }
    </style>
    <?php
    include('../controller/checkLogin.php');
    include('../db/db-connect.php');

    $user = $_SESSION['user'];
    $user_id = $_SESSION['userId'];
    $conn = connectDB();

    if (!$conn)
        die("Connection failed: " . mysqli_connect_error());

    $query = "SELECT * FROM files WHERE user_id = '$user_id'";
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
            <p>QUẢN LÝ FILE</p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Thêm
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm file</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="uploadForm" action="../controller/upload.php" method="post"
                                enctype="multipart/form-data">
                                File upload:
                                <input type="file" name="myfile" />
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                            <button type="button" class="btn btn-primary" id="submitBtn">Thêm mới</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>



        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">file name</th>
                    <th scope="col">file type</th>
                    <th scope="col">file size</th>
                    <th scope="col">upload date</th>
                    <th scope="col">delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<th scope="row">' . $count++ . '</th>';
                    echo '<td class="filename-cell">' . $row['file_name'] . '</td>';
                    echo '<td>' . $row['file_type'] . '</td>';
                    echo '<td>' . round($row['file_size'] / (1024 * 1024), 2) . ' MB</td>';
                    echo '<td>' . $row['upload_date'] . '</td>';
                    echo '<td><a href="../controller/delete.php?file_id=' . $row['file_id'] . '">Delete</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const submitBtn = document.getElementById('submitBtn');
        const uploadForm = document.getElementById('uploadForm');

        submitBtn.addEventListener('click', function() {
            uploadForm.submit();
        });
    });
    </script>
</body>

</html>