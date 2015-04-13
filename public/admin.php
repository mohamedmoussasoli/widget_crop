<?php session_start(); ?>
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
        
        <div class="page">
            <h1> Welcome : <?php echo $_SESSION['username']  ?></h1>
            <h2>Admin Menu</h2>
            <p>Welcome to admin area</p>
            <ul>
                <li><a href="content.php">Manage Website Content</a></li>
                <li><a href="manage_admins.php">Manage Admin Users</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
    </div>
    
    </body>
</html>
