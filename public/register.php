<?php session_start(); ?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
        if(isset($_POST['submit'])) {
            
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            if(empty($username) || is_null($username)) {
                $user_error = "<span style=\"color:red\">Username Can't Be Blank !</span>";
            }

            if(empty($password) || is_null($password)) {
                $pass_error = "<span style=\"color:red\">Password Can't Be Blank !</span>";
            }
            
            if((!empty($username)) && (!empty($password))) {
            
            $query = "INSERT INTO admins (username,password) VALUES ('$username','$password')";
            
            $insert_query = mysqli_query($connection,$query);
            
            $message = "You Can Log In Now &raquo; "."<a href=\"login.php\">Log In</a>"."<br>";
            }else {
                $message = "Please Fix The Following Errors";
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
            
            <h1><?php echo $message; $message = null; ?></h1>
                
            <form action="register.php" method="post">
                First Name : <input type="text" name="first">
                Last Name : <input type="text" name="last"><br><br>
                Username : <input type="text" name="username"> &nbsp; <?php  echo $user_error; ?><br><br>
                Email Address : <input type="text"><br><br>
                Password : <input type="password" name="password"> &nbsp; <?php  echo $pass_error; ?><br><br>
                <input type="submit" name="submit" value="Sgin Up"> 
            </form>
            
            
        </div>
    </div>
    
    </body>
</html>