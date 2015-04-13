<?php session_start(); ?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php $_SESSION['username']=null ?>
<?php redirect_to("login.php") ?>