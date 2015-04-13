<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php

$admin_id = $_GET['id'];
$admin_username = $_POST['username'];
$admin_password = $_POST['password'];

$query = "UPDATE admins SET username = '$admin_username' , password = '$admin_password' WHERE id = '$admin_id'";

$update_query = mysqli_query($connection,$query);

redirect_to("manage_admins.php");

?>