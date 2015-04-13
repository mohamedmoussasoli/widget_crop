<?php session_start();?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php

$subject_id = $_POST['select'];
$page_name = $_POST['menu_name'];
$visiblity = $_POST['visible'];
    
$insert = "INSERT INTO pages (menu_name,subject_id,visible) VALUES ('$page_name','$subject_id','$visiblity')";

if (isset($_POST['submit'])) {

$insert_query = mysqli_query($connection,$insert);

$_SESSION['message']= "<h1 class=\"created\" style=\"color:#CF2030\">Page Created</h1>";

redirect_to("content.php");

};

?>

<?php mysqli_close($connection)?>