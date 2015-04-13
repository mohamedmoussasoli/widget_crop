<?php session_start(); ?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
if(empty($_SESSION['username'])) {
    redirect_to("login.php");
}
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Admin</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    
    <body>
    
    <div class="header">
        <h1>Widget Crop</h1>
    </div>
    
    <div class="main">
        <div class="nav">
            nav
        </div>
        
        <div class="page"  style="padding-top: 25px">
            
            <form action="create_admin.php" method="post">
                Username : <input type="text" name="username"><br><br>
                Password : <input type="password" name="password"><br><br>
                <input type="submit" name="submit" value="Add Admin"> 
            </form>
            <br>
            <a href="manage_admins.php">Cancel</a>
            
        </div>
    </div>
    
    </body>
</html>