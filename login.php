<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- link css  -->
    <link href="index.css" rel="stylesheet" />
     <!-- admin css  -->
    <link href="admin/admin-css.css" rel="stylesheet" />
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <form method="post" action="">
            <?php 
                if(isset($_GET['empty'])) {
                    echo "<p class='error'>Please fill up both fields!</p>";
                }
                if (isset($_GET['dbfail'])) {
                    echo "<p class='error'>".$conn->error."</p>";
                }
                ?>
                <input type="text" name="username" placeholder="Enter username" />
                <input type="password" required="required"  name="password" placeholder="Enter password" />
                <input type="submit" class="login-btn"  name="submit_login" value="Login" />
            </form>
        </div>
    </div>
</body>
</html>
<?php
   if(isset($_POST['submit_login'])) {
        $username  = $_POST['username'];
        $password  = md5( ($_POST['password']) );
        if(empty($username) || empty($password)) {
            echo "<script>window.open('login.php?empty=empty','_self')</script>";
        } else {
           
            require "admin/database.php";
            $_SESSION['username'] = $username;
            $select = "select ID from users where username='$username' and password='$password' ";
            $count = mysqli_num_rows( $conn->query($query) );
            echo "<script>alert($count)</script>";
            exit();
            if ($count == 1) { 
                echo "<script>window.open('admin/admin.php','_self')</script>";
            } else {
                echo "<script>window.open('login.php?dbfail='+$conn->error,'_self')</script>";
            }    
        }
   }
?>