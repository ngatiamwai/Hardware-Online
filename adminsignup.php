<?php
include 'connection.php';

$error="";
$msg="";

if (isset($_REQUEST['signup'])) {
  
  $name = $_REQUEST['name'];
  $phone_number = isset($_REQUEST['phone_number']) ? $_REQUEST['phone_number'] : "";
  $email = $_REQUEST['email'];
  $password = $_REQUEST['password'];
  $password = md5($password);

  $query = "SELECT * FROM admin where email='$email'";
    $res=mysqli_query($conn, $query);
    $num=mysqli_num_rows($res);
    
    if($num == 1)
    {
        $error = "<p class='alert alert-warning'>Email Id already Exist</p> ";
    }

    else
    {
        
        if(!empty($name) && !empty($email) && !empty($phone_number) && !empty($password))
        {
            
            $sql="INSERT INTO admin (name, email, phone_number, password) VALUES ('$name','$email','$phone_number','$password')";
            
            
            $result=mysqli_query($conn, $sql);
            if($result){
                $msg = "<p>Register Successfully</p> ";
                header("location:adminsignin.php");
            }
            else{
                $error = "<p>Register Not Successfully</p> ";
            }
        }else{
            $error = "<p>Please Fill all the fields</p>";
        }
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
    <title>Sign Up</title>
</head>
<body>
    <div class="container">
        <div class="form-box">
            <h1 id="title">Sign Up</h1>
            <form action="adminsignup.php" method="post">
                <div class="input-group">
                    <div class="input-field" id="nameField">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Name" name="name">
                    </div>
                    <div class="input-field" id="email">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email">
                    </div>
                    <div class="input-field" id="phonenumber">
                        <i class="fa-solid fa-phone"></i>
                        <input type="number" placeholder="Phone Number" name="phone_number">
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="Password" name="password">
                    </div>
                </div>
            <div class="btn-field">
                <input type="submit" id="signupBtn" name="signup" value="Sign Up" class="disable">
                 <a href="adminsignin.php" id="signinBtn"  >Sign In</a>
            </div>
            </form>
        </div>
    </div> 
</body>
</html>
