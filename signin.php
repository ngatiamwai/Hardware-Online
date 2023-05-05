<?php

// session_start();
// include("connection.php");
// $error="";
// $msg="";
// if(isset($_REQUEST['signin']))
// {  
// 	$email=$_REQUEST['email'];
// 	$password=$_REQUEST['password'];
// 	$password= md5($password);
	
// 	if(!empty($email) && !empty($password))
// 	{
// 		$sql = "SELECT * FROM register1 where email='$email' && password='$password'";
// 		$result=mysqli_query($conn, $sql);
// 		$row=mysqli_fetch_array($result);
// 		   if($row){
// 			  $_SESSION['id']=$row['id'];
// 				$_SESSION['email']=$email;
        
// 				header("location: products.php");
				
// 		   }
// 		   else{
// 			   $error = "<p class='alert alert-warning'>Email or Password does not match!</p> ";
// 		   }
// 	}else{
// 		$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
// 	}
// }








// // Connect to the database
//   $servername = "localhost";
//   $dbUsername = "root";
//   $dbPassword = "";
//   $dbName = "cart";    

//   $conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

//   if (isset($_POST['email'])) {
//      $email = $_POST['email'];
//      $password = $_POST['password'];

   
   
//      // Check if the entered credentials match the ones in the database
//      $sql = "SELECT * FROM register1 WHERE email='".$email."' AND password='".$password."' limit 1";
//      $result = mysqli_query($conn, $sql);

//      if (mysqli_num_rows($result) == 1) {
//        // Start a session to store user information
//        session_start();
//        $_SESSION['auth'] = 'true';

//        // Redirect the user to the home page
//        header("Location: products.php");
//        echo "You have logged in successfully";
//        exit();
      
//      } else {
//        echo "Incorrect username or password.";
//      }
//    }
  
?>