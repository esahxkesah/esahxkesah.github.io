<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "database";

    // Create connection
    $Database = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (!$Database) {
        die("Connection failed: " . mysqli_connect_error());
    }
?> 