<?php session_start(); ?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php

        $user_error = null;
        $pass_error = null;
        
        if(isset($_POST['submit'])) {
            
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            if(empty($username)) {
                $user_error = "Username Can't Be Blank !";
            }else{
                $user_error = "Wrong Username!";
            }
            if(empty($password)) {
                $pass_error = "Password Can't Be Blank !";
            }else {
                $pass_error = "Wrong Password!";
            }
            
            $query = "SELECT * FROM admins WHERE username = '$username' AND password = $password";
            
            $select_query = mysqli_query($connection,$query);
            
            if($select_query) {
            
                $admins_array = mysqli_fetch_assoc($select_query);
                
                    $_SESSION['username'] = $username;
                    redirect_to("admin.php");
            }
        } // end of isset($_POST['submit'])
?>

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
                
            <form action="login.php" method="post">
                Username : <input type="text" name="username"> &nbsp; <?php  echo $user_error; ?><br><br>
                Password : <input type="password" name="password"> &nbsp; <?php  echo $pass_error; ?><br><br>
                <input type="submit" name="submit" value="Log In"> 
            </form>
            
            <a href="register.php" class="reg">Sgin Up Now</a>
            
        </div>
    </div>
    
    </body>
</html>