<?php


    $db_server = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'azora';

    $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);


    if ($conn->connect_error) {
        error_log("[MySQLi Error]: " . $conn->connect_error . "\n", 3, "error.txt");
        echo "An error occurred. Please try again later.";
        exit();
    }

    if (!$conn->set_charset("utf8")) {
        echo "Error setting character set: " . $conn->error;
        exit();
    }

    // Connection variable
    $con = $conn;
