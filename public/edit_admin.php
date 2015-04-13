<?php session_start(); ?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
if(empty($_SESSION['username'])) {
    redirect_to("login.php");
}
?>

<?php
if(empty($_SESSION['username'])) {
    redirect_to("login.php");
}
?>

<?php $admin_id  = $_GET['id']; ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Edit Admin</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    
    <body>
    
    <div class="header">
        <h1>Widget Crop</h1>
    </div>
    
    <div class="main">
        <div class="nav">
            nav
            
        <?php echo $admin_id ?>
        </div>
        
        <div class="page"  style="padding-top: 25px">
            
            <form action="update_admin.php?id=<?php  echo current_admin('id') ?>" method="post">
                Username : <input type="text" name="username" value="<?php echo current_admin('username') ?>"><br><br>
                Password : <input type="password" name="password"><br><br>
                <input type="submit" name="submit" value="Update Admin"> 
            </form>
            
            <br>
            <a href="manage_admins.php">Cancel</a>
            
        </div>
    </div>
    
    </body>
</html>