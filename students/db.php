<?php
$con = mysqli_connect("localhost", "root", "", "isyswaytest");

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
