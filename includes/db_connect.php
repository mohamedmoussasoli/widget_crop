<?php
$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "root";
$database = "database";

$connection = mysqli_connect($dbhost,$dbusername,$dbpassword,$database);

if (!$connection) {
    die ("cant connect to database").mysqli_connect_errno().mysqli_connect_error();
};

?>
