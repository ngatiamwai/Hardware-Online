<?php 
session_start();
 include 'connection.php';
    
    $error="";
    $msg="";
    
    if(isset($_REQUEST['signin'])) {  
        $email=$_REQUEST['email'];
        $password=$_REQUEST['password'];
        $password= md5($password);
        
        if(!empty($email) && !empty($password)) {
            $sql = "(SELECT * FROM admin WHERE email='$email' AND password='$password')";
            $result=mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0) {
                $row=mysqli_fetch_array($result);
                $_SESSION['id']=$row['id'];
                $_SESSION['email']=$row['email'];
                header("location: adminproducts.php");
            } else {
                $error = "<p class='alert alert-warning'>Email or Password does not match!</p> ";
            }
        } else {
            $error = "<p class='alert alert-warning'>Please fill in all the fields.</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <script src="https://kit.fontawesome.com/3b2e64c6f5.js" crossorigin="anonymous"></script>
    <title>Sign in</title>
</head>
<body>
    <div class="container">
        <div class="form-box">
            <h1 id="title">Sign In</h1>
            <?php echo $error; ?>
            <?php echo $msg; ?>
            <form action="adminsignin.php" method="post">
                <div class="input-group">               
                    <div class="input-field" id="email">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email">
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Password" name="password">
                    </div>
                    <div class="btn-field">
                        <a href="adminsignup.php" id="signinBtn"  >Sign Up</a>
                        <input type="submit" id="signupBtn" name="signin" value="Sign In" class="disable">
                    </div>    
            </form>
        </div>
    </div>   
</body>
</html>
