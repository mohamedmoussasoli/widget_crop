<?php session_start();?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php

$subject_name = $_POST['menu_name'];
$position = $_POST['position'];
$visiblity = $_POST['visible'];
    
$insert = "INSERT INTO subjects (menu_name,position,visible) VALUES ('$subject_name','$position','$visiblity')";

if (isset($_POST['submit'])) {

$insert_query = mysqli_query($connection,$insert);

redirect_to("content.php");

};

$_SESSION['message']= "<h1 class=\"created\" style=\"color:#CF2030\">Subject Created</h1>";
?>

<?php mysqli_close($connection)?>