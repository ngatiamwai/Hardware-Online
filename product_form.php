<?php 
	
	ini_set('session.cache_limiter','public');
	session_cache_limiter(false);
	session_start();

	include 'connection.php';
	if(!isset($_SESSION['email'])){
		header("location:signin1.php");
	}


	if (isset($_POST['add_product'])) {
		$name = $_POST['p_name'];
		$price = $_POST['p_price'];
		$description = $_POST['description'];
		$location = $_POST['location'];
		$sellerID = $_SESSION['id'];	
		if(isset($_FILES['p_image']['name'])){
			$p_image= $_FILES['p_image']['name'];
		} else{
			$p_image = "";
		}
		if(isset($_FILES['p_image1']['name'])){
			$p_image1= $_FILES['p_image1']['name'];
		} else{
			$p_image1 = "";
		}
		if(isset($_FILES['p_image2']['name'])){
			$p_image2= $_FILES['p_image2']['name'];
		} else{
			$p_image2 = "";
		}
		
		ini_set('post_max_size', '10M');
		ini_set('upload_max_filesize', '8M');
		$temp_name = $_FILES['p_image']['tmp_name'];
		$temp_name1 = $_FILES['p_image1']['tmp_name'];
		$temp_name2 = $_FILES['p_image2']['tmp_name'];

		move_uploaded_file($temp_name,"image/$p_image");
		move_uploaded_file($temp_name1,"image/$p_image1");
		move_uploaded_file($temp_name2,"image/$p_image2");

		$query = "INSERT INTO `product`(`productName`, `productPrice`,`productImage`,`productImage1`,`productImage2`,`sellerID`,`productDescription`,`location`) 
		VALUES ('$name', '$price','$p_image','$p_image1', '$p_image2', '$sellerID', '$description','$location')";

		$insert_query = mysqli_query($conn, $query);

		if ($insert_query) {
			$message[] = 'product added sucessfully';
			header('location:myproducts.php');
		}else{
			$message[] = 'product did not added sucessfully';
		}
		
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Add a Product</title>
</head>
<body>
	<?php include 'header.php'; ?>
	<div class="form">
		<form method="post" enctype="multipart/form-data">
			<h3>add a new product</h3>
			<label for="Product Name">Product Name:</label>
			<input type="text" name="p_name" placeholder="Enter product name" required>
			<label for="Product Price">Product Price:</label>
			<input type="number" name="p_price" min="0" placeholder="Enter product price" required>
			<label for="Product Location">Product Location:</label>
			<input type="text" name="location" placeholder="Enter product Location" required>
			<label for="Product Image">Product Image:</label>
			<input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" required>
			<label for="Product Image 1">Product Image 1:</label>
			<input type="file" name="p_image1" accept="image/png, image/jpg, image/jpeg">
			<label for="Product Image 2">Product Image 2:</label>
			<input type="file" name="p_image2" accept="image/png, image/jpg, image/jpeg" >
			<label for="Description">Description:</label>
			<textarea name="description" rows="10" cols="99" placeholder="Enter Description" ></textarea> 
			<input type="submit" name="add_product" value="add product" class="btn" style="background-color: #007bff; color:black;">
		</form>
	</div>
	<br>
    <br>
	<?php //include 'footer.php' ?>
</body>
</html>
