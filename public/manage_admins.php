<?php session_start(); ?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
if(empty($_SESSION['username'])) {
    redirect_to("login2.php");
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Admin</title>
        <link rel="stylesheet" href="css/style.css">
        <style>
            .admins {
                overflow: hidden;
                margin-bottom: 40px;
            }
            
            .admins a {
                color: #c21224;
            }
            
            .left{
                width: 30%;
                float: left;
            }
            
            .right{
                width: 30%;
                float: left;
                text-align: center;
            }
            .nav {
                box-sizing: border-box;
                padding-top: 25px;
                padding-left: 30px;
            }
        </style>
    </head>
    
    <body>
    
    <div class="header">
        <h1>Widget Crop</h1>
    </div>
    
    <div class="main">
        <div class="nav">
            <a href="admin.php">&laquo Main Menu</a>
        </div>
        
        <div class="page">
            
            <h1>Manage Admins</h1>
            
            <div class="admins">
                <div class="left">
                    <p style="margin: 0px;font-weight: bold">Username</p>
                    <?php
                        $select_query = mysqli_query($connection,"SELECT * FROM admins");
                        while($admins_array = mysqli_fetch_assoc($select_query)) {
                    ?>
                    <p><?php echo $admins_array['username'] ?></p>
                    <?php } ?>
                </div>
                
                <div class="right">
                    <p style="margin: 0px;font-weight: bold">Action</p>
                    <?php
                        $select_query = mysqli_query($connection,"SELECT * FROM admins");
                        while($admins_array = mysqli_fetch_assoc($select_query)) {
                    ?>
                    <p>
                        <a href="edit_admin.php?id=<?php echo $admins_array['id'] ?>">Edit Admin</a>
                        &nbsp;&nbsp;
                        <a href="delete_admin?id=<?php echo $admins_array['id'] ?>">Delete Admin</a>
                    </p>
                    <?php } ?>
                </div>
            </div>
            
            <a href="new_admin.php">Add New Admin +</a>
            
        </div>
    </div>
    
    </body>
</html>

