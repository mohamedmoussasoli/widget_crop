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

<?php
$id = current_page("id");
$subject_name = $_POST['menu_name'];
$position = $_POST['position'];
$visiblity = $_POST['visible'];
    
$update = "UPDATE pages SET menu_name='$subject_name' , visible='{$visiblity}' WHERE id = '{$id}'";

if (isset($_POST['submit'])) {

$update_query = mysqli_query($connection,$update);

$_SESSION['message']= "Page Updated";

redirect_to("content.php");

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
        </div>
        
        <div class="page">
            
            <h1>Edit Page : <?php echo current_page("menu_name");?></h1>
            
            <form action="edit_page.php?page=<?php echo current_page('id') ?>" method="post">
                <p>
                    Page Name : <input type="text" name="menu_name" value="<?php echo current_page("menu_name")?>">
                </p>
                <!--<p>
                    Position :
                    <select name="position">
                        <?php
                        $query = "SELECT * FROM subjects ORDER BY id ASC";
                        $subject = mysqli_query($connection,$query);
                        $count = mysqli_num_rows($subject);
                        for ($var = 1 ; $var <= $count ; $var++) {
                            echo "<option value=\"$var\"";
                            if(current_subject("position")==$var) {
                                echo " selected";
                            }
                            echo ">$var</option>";
                        }
                        ?>
                    </select>
                </p>-->
                <p>
                    Visible :
                    <input type="radio" name="visible" value="0"> No
                    <input type="radio" name="visible" value="1"> Yes
                    
                </p>
                <p>
                    <input type="submit" value="Update Page" name="submit">
                        <br><br>
                    <a href="content.php">Cancel</a>
                </p>
            </form>
        </div>
        <?php
            mysqli_close($connection);
        ?>
    
    <script src="js/jquery.js"></script>
    <script src="js/plugins.js"></script>
    </body>
</html>