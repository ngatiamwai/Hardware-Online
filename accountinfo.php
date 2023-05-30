<?php 

ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();

include 'connection.php';
 // Get the user ID from the session
 $id = $_SESSION['id'];
//update product
if (isset($_POST['save_changes'])) {
	$update_p_id = $_POST['update_p_id'];
	$update_p_firstname = $_POST['update_p_firstname'];
	$update_p_lastname = $_POST['update_p_lastname'];
	$update_p_phonenumber = $_POST['update_p_phonenumber'];
	$update_p_email= $_POST['update_p_email'];
	$update_p_profile_pic = $_FILES['update_p_profile_pic']['name'];
	$update_p_profile_pic_tmp_name = $_FILES['update_p_profile_pic']['tmp_name'];
	$update_p_folder = 'image/'.$update_p_profile_pic;

	$update_query = mysqli_query($conn, "UPDATE `register1` SET id='$update_p_id', firstname='$update_p_firstname', lastname='$update_p_lastname', phonenumber='$update_p_phonenumber', email='$update_p_email',profile_pic='$update_p_profile_pic'
	WHERE id = '$update_p_id'") or die('query failed');
	if ($update_query) {
		move_uploaded_file($update_p_profile_pic_tmp_name,$update_p_folder);
		$messge[]='product has been updated sucessfully';
		header('location:accountinfo.php');
	}else{
		$messge[]='product could not updated sucessfully';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Contact: Construction Shop</title>
    <link rel="stylesheet" type="text/css" href="style.css">
	<style>
.container {
	max-width: 600px;
	margin: 0 auto;
	padding: 20px;
}
h1 {
	text-align: center;
	margin-bottom: 20px;
}
form {
	display: flex;
	flex-direction: column;
}
label {
	margin-top: 10px;
}
input[type="text"],
input[type="email"],
input[type="tel"],
input[type="password"],
input[type="file"] {
	padding: 5px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid #ccc;
}
button {
	margin-top: 20px;
	padding: 10px;
	font-size: 16px;
	border-radius: 5px;
	border: none;
	background-color: #007bff;
	color: #fff;
	cursor: pointer;
}
button:hover {
	background-color: #0062cc;
}
.error {
	color: red;
	font-size: 14px;
	margin-top: 5px;
}
.profile-pic-container {
	display: flex;
	justify-content: center;
	align-items: center;
	height: 200px;
    width: 200px;
	margin-top: 20px;
	position: relative;
    margin: auto;
}
.profile-pic-container::before {
	content: "";
	display: block;
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background-color: #ccc;
	border-radius: 50%;
}
#profile-image {
	display: block;
	max-width: 100%;
	max-height: 100%;
	object-fit: contain;
	border-radius: 50%;
	position: relative;
	z-index: 1;
}
    </style>
</head>

<body>
<?php include 'header.php'; ?>

<?php
	$query=mysqli_query($conn,"SELECT * from register1 where id='$id'");
	while($row=mysqli_fetch_array($query))
		{
?>
	<div class="container">
		<h1>User Profile</h1>
		<form id="profile-form" method="POST" enctype="multipart/form-data" action="accountinfo.php">
            <div class="profile-pic-container">
                <img style="width:100%; " id="profile-image" src="image/<?php echo $row['profile_pic']; ?>" alt="profile-pic">
            </div>
			<input type="hidden" name="update_p_id" value="<?php echo $row['id']; ?>">
			<input type="file" name="update_p_profile_pic" value="<?php echo $row['profile_pic']; ?>">
			<label for="name">First Name:</label>
			<input type="text" name="update_p_firstname" value="<?php echo $row['firstname']; ?>" >
			<label for="name">Last Name:</label>
			<input type="text" name="update_p_lastname" value="<?php echo $row['lastname']; ?>" >
			<label for="email">Email:</label>
			<input type="text" name="update_p_email"  value="<?php echo $row['email']; ?>" >
			<label for="phone">Phone Number:</label>
			<input type="number" name="update_p_phonenumber"  value="<?php echo $row['phonenumber']; ?>" >
			<input  type="submit" name="save_changes" value="Save Changes" style="background-color: #007bff; color: #fff; font-size:large;">
		</form>
	</div>
	<?php
	}
	?>	
</body>
<?php include 'footer.php' ?>
</html>

