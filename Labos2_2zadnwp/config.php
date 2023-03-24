<?php
    $server_name = "localhost";
    $user_name = "root";
    $password = "";
    $db_name="imagefile";
    $connection = mysqli_connect($server_name, $user_name, $password, $db_name);
    if (!$connection ) {
        die("Fail". mysqli_connect_error());
    } else echo "Connected";
?>