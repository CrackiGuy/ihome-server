<?php
    $host = "localhost";
    $user = "root";
    $passwd = "";
    $db = "ihome";
    $conn = mysqli_connect($host, $user, $passwd,$db);

    if (!$conn) {
        echo "Failed";
    }
?>