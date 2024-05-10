<?php
include('../db/db-connect.php');

function getSach()
{
    $conn = connectDB();

    if (!$conn)
        die("Connection failed: " . mysqli_connect_error());

    $query = "SELECT * FROM Sach";
    $result = mysqli_query($conn, $query);

    return $result;
}
