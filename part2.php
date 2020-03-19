<?php
    $connection = mysqli_connect("localhost", "phpmyadmin", "Password1!", "phppractice");
    if (!$connection) {
        echo "Cannot connect to MySQL.". mysqli_connect_error();
        exit();
    }
?>