<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php

$username = $_POST['username'];
$password = $_POST['password'];

$query = "INSERT INTO admins (username,password) VALUES ('$username','$password')";

if(isset($_POST['submit'])) {
$insert_query = mysqli_query($connection,$query);
redirect_to("manage_admins.php");
}
?>
