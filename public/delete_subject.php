<?php session_start();?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php

$selected_subject_id = $_GET['subject'];

$id = current_subject("id");
    
$delete = "DELETE FROM subjects WHERE id = '{$id}'";

$delete_query = mysqli_query($connection,$delete);

redirect_to("content.php");

$_SESSION['message']= "Subject Deleted";
?>

<?php mysqli_close($connection)?>