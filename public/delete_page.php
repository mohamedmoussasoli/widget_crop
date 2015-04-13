<?php session_start();?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php

$selected_page_id = $_GET['page'];

$id = current_page("id");
    
$delete = "DELETE FROM pages WHERE id = '{$id}'";

$delete_query = mysqli_query($connection,$delete);

redirect_to("content.php");

$_SESSION['message']= "Page Deleted";
?>

<?php mysqli_close($connection)?>