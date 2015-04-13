<?php session_start();?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php

    if(isset($_GET['subject'])) {
        $selected_subject_id = $_GET['subject'];
    }elseif (isset($_GET['page'])) {
        $selected_page_id = $_GET['page'];
    }else {
        $selected_subject_id = null;
        $selected_page_id = null;
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
                
                <?php
                    $query = "SELECT * FROM subjects ORDER BY id ASC";
                    $subject = mysqli_query($connection,$query);
                    while ($subjects = mysqli_fetch_assoc($subject)) {
                ?>
                
                <li>
                    
                    <a href="index.php?subject=<?php echo $subjects['id']?>">
                        <?php echo $subjects['menu_name']." (".$subjects['id'].")";?> 
                    </a>
                    
                    <ul>
                        <?php
                            $query = "SELECT * FROM pages WHERE subject_id = {$subjects['id']} ";
                            $page = mysqli_query($connection,$query);
                            while ($pages = mysqli_fetch_assoc($page)) {
                        ?>
                        <li>
                            <a href="index.php?page=<?php echo $pages['id']?>">
                                <?php echo $pages['menu_name'];?>
                            </a>
                        
                        </li>
                            <?php } ?>
                    </ul>
                    
                </li>
                
                <?php } ?>
                
            </ul>
            
        </div>
        
        <div class="page">
            <?php
            if(isset($selected_subject_id)) {
                echo "<h1>Manage Content</h1>";
            };
            ?>
            
            <?php
            if(isset($selected_page_id)) {
                echo ucwords(current_page("content"));
            };
            ?>

        </div>
    </div>
    <?php
        mysqli_close($connection);
    ?>
    
    <script src="js/jquery.js"></script>
    <script src="js/plugins.js"></script>
    </body>
</html>

