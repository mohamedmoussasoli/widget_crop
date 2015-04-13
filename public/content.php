<?php session_start();?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
if(empty($_SESSION['username'])) {
    redirect_to("login.php");
}
?>

<?php

    

    if(isset($_GET['subject'])) {
        $selected_subject_id = $_GET['subject'];
    }elseif (isset($_GET['page'])) {
        $selected_page_id = $_GET['page'];
    }else {
        $selected_subject_id = null;
        $selected_page_id = 1;
    };

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Widget Crop</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    
    <body>
    
    <div class="header">
        <h1>Widget Crop</h1>
    </div>
    
    <div class="main">
        <div class="nav">
            <ul class="navigation">
                
                <a href="admin.php">&laquo Main Menu</a>
                
                <br><br>
                
                <?php
                    $query = "SELECT * FROM subjects ORDER BY id ASC";
                    $subject = mysqli_query($connection,$query);
                    while ($subjects = mysqli_fetch_assoc($subject)) {
                ?>
                
                <li>
                    
                    <a href="content.php?subject=<?php echo $subjects['id']?>">
                        <?php echo $subjects['menu_name']." (".$subjects['id'].")";?> 
                    </a>
                    
                    <ul>
                        <?php
                            $query = "SELECT * FROM pages WHERE subject_id = {$subjects['id']} ";
                            $page = mysqli_query($connection,$query);
                            confirm_query($page);
                            while ($pages = mysqli_fetch_assoc($page)) {
                        ?>
                        <li>
                            <a href="content.php?page=<?php echo $pages['id']?>">
                                <?php echo $pages['menu_name'];?>
                            </a>
                        </li>
                        <?php } ?>
                    </ul> 
                </li>
                <?php } ?>
            </ul>
            <h1><a href="new_subject.php" class="new">&raquo; Manage Subjects</a></h1>
            <h1><a href="new_Page.php" class="new">&raquo; Manage Pages</a></h1>
        </div>
        
        <!--=========== End Navigation ==========-->
        
        <div class="page">
            <h1>
            <?php
                echo $_SESSION['message'];
                echo $_SESSION['message']=null;
            ?>
            </h1>
            
            <div class="content">
                <?php if(isset($selected_page_id)) { ?>
                <h1><?php echo ucwords(current_page("menu_name")) ?></h1>
                <p><?php echo ucwords(current_page("content")) ?></p>
                <?php } ?>
            </div>           

        </div>
    </div>
    <?php
        mysqli_close($connection);
    ?>
    
    <script src="js/jquery.js"></script>
    <script src="js/plugins.js"></script>
    </body>
</html>


