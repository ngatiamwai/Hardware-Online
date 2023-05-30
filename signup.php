<?php


include 'connection.php';

$error="";
$msg="";

if (isset($_REQUEST['signup'])) {
  $firstname = $_REQUEST['firstname'];
  $lastname = $_REQUEST['lastname'];
  $phonenumber = $_REQUEST['phonenumber'];
  $email = $_REQUEST['email'];
  $password = $_REQUEST['password'];

  // Hash password
  $password = md5($password);

  $query = "SELECT * FROM register1 where email='$email'";
  $res=mysqli_query($conn, $query);
  $num=mysqli_num_rows($res);

  if($num == 1)
  {
    $error = "Email Id already exists";
  }
  else
  {
    if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($phonenumber) && !empty($password))
    {
      $sql = "INSERT INTO register1 (firstname, lastname, email, phonenumber,password) VALUES ('$firstname','$lastname','$email','$phonenumber', '$password')";
      $result = mysqli_query($conn, $sql);
      if($result){
        $msg = "<p>Register Successfully</p> ";
        header("location:signin1.php");
      }
      else{
        $error = "Register Not Successfully";
      }
    }
    else{
      $error = "Please Fill all the fields";
    }
  }
}

if(!empty($error)){
  echo "<p class='alert alert-warning'>$error</p>";
}
?>
