<?php
ob_start();
session_start();
$conn = mysqli_connect("localhost","root","","feedback");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
