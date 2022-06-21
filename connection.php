<?php

// Connection String with hostname, username, password, DB name //

$conn = mysqli_connect('127.0.0.1', 'root', '', 'rexx_challenge');
if(!$conn) {
    die("Database connection error! ".mysqli_connect_error());
}
?>