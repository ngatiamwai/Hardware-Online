<?php


	ini_set('session.cache_limiter','public');
	session_cache_limiter(false);
	session_start();



	include 'connection.php';

	if (isset($_POST['add_to_cart'])) {
		if (!isset($_SESSION['id'])) {
			header("Location: signin1.php");
			exit();
		}
		$name = $_POST['name'];
		$price = $_POST['price'];
		$image = $_POST['image'];
		$firstname = $_POST['firstname'];
		$phonenumber = $_POST['phonenumber'];
		$location = $_POST['location'];
		$user_id=$_SESSION['id'];
		$product_id = $_POST['product_id'];
		$quantity = 1;
	
		$select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name='$name' and user_id='$user_id'");
		if (mysqli_num_rows($select_cart) > 0) {
			$message[] = 'Product already added to your cart';
		} else {
			$query = "INSERT INTO `cart`(`name`, `price`,`image`,`quantity`,`seller_name`,`phonenumber`,`user_id`,`product_id`,`location`)
			VALUES ('$name', '$price', '$image', '$quantity', '$firstname','$phonenumber', '$user_id', '$product_id','$location')";
			$insert_query = mysqli_query($conn, $query);
			if ($insert_query) {
				$message[] = 'Product added to your cart';
			} else {
				$message[] = 'Error adding product to cart';
			}
		}
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/3b2e64c6f5.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Shop</title>
</head>
<body>
	<?php include 'header.php'; ?>
	<?php 
		if (isset($message)) {
			foreach ($message as $message) {
				echo '
					<div class="message">
						<span>'.$message.'</span>
						<i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
					</div>
				';
			}
		}		
	?>
	<h1>latest products</h1>
	<form action="products.php" method="post">
		<div class="main">
			<div class="input-group" style="display:flex; justify-content:space-around;">
				
					<div class="input-group-append" style="margin-right:100vh; margin-top:1.4rem; position:absolute;">
					<button class="btn btn-secondary" type="submit">
						<i class="fa fa-search" style="font-size:20px;"></i>
					</button>
				</div>
				<input type="text" class="form-control" placeholder="Search" name="search" style="padding-left:3rem;">
			</div>
		</div>
	</form>
	<style>
	/* Styles for wrapping the search box */
	.main {
		width: 50%;
		margin: 50px auto;
	}
	/*Bootstrap 4 text input with search icon*/
	.has-search .form-control {
		padding-left: 2.375rem;
	}
	.has-search .form-control-feedback {
		position: absolute;
		z-index: 2;
		display: block;
		width: 2.375rem;
		height: 2.375rem;
		line-height: 2.375rem;
		text-align: center;
		pointer-events: none;
		color: #aaa;
	}
	</style>
	<div style="display:flex; flex-wrap: wrap; margin:auto;">
	<?php
		if (isset($_POST['search'])) {
		// Retrieve the search term
		$searchTerm = $_POST['search'];
		// Perform the search query using the search term
		$query = "SELECT product.*, register1.* FROM product, register1 WHERE productName LIKE '%$searchTerm%' and register1.id=product.sellerID";
		// Execute the query and fetch the results
		$result = mysqli_query($conn, $query);
		// Display the search results
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
			// Display the product information
			?>
			<form method="post" class="card" style="flex-basis:calc(100% / 4)-1px; " onclick="showItemInfo(<?php echo $row['productID']; ?>)">
			<script>
				function showItemInfo(id) {
					window.location.href = "productinfo.php?id=" + id;
				}
			</script>
			<div class="product-container" >
				<div class="product-item-container">
					<div class="box" >
						<input type="hidden" name="name" value="<?php echo $row['productName']; ?>">
						<div>
							<img src="image/<?php echo $row['productImage'];?>">
							<input type="hidden" name="image" value="<?php echo $row['productImage']; ?>">
							<input type="hidden" name="location" value="<?php echo $row['location']; ?>">
							<i class="fa-sharp fa-solid fa-location-dot"> <?php echo $row['location']?> </i>
						</div>
						<h3> <?php echo $row['productName']; ?></h3>
						<div class="price">Ksh<?php echo $row['productPrice']; ?>/-</div>
						<input type="hidden" name="price" value="<?php echo $row['productPrice']; ?>">
						<input type="hidden" name="firstname" value="<?php echo $row['firstname']; ?>">
						<input type="hidden" name="product_id" value="<?php echo $row['productID']; ?>">
						<h3><?php echo $row['firstname']; ?></h3>
						<input type="hidden" name="phonenumber" value="<?php echo $row['phonenumber']; ?>">
						<?php
							if (isset($_SESSION['id'])) {
							?>
									<a href="https://wa.me/254<?php echo $row['phonenumber']; ?>/?text=Hi%20<?php echo $row['firstname']; ?>%2C%20I%20saw%20you%20are%20selling%20a%20<?php echo $row['productName']; ?>," target="_blank">Click to Chat</a>
							<?php
								} else {
							?>
									<a href="signin1.php">Click to Chat (Login Required)</a>
							<?php
							}
						?>
						<input type="submit" name="add_to_cart" value="add to cart" class="btn">
					</div>
				</div>
			</div>
		</form>
		<?php
				}
				} else {
				echo '<p>No products found</p>';
				header('location:products.php');
			}
		}
	?>
	</div>
	<div style="display: flex; flex-wrap: wrap;">
	<?php 
		$query=mysqli_query($conn,"SELECT product.*, register1.firstname,register1.phonenumber 
			FROM `product`,`register1` 
			WHERE product.sellerID=register1.id ORDER BY dateAdded DESC");
			while($row=mysqli_fetch_array($query))
			{
	?>
	    
		<form method="post" class="card" style="flex-basis:calc(100% / 4)-1px; margin:auto;" onclick="showItemInfo(<?php echo $row['productID']; ?>)">
			<script>
				function showItemInfo(id) {
					window.location.href = "productinfo.php?id=" + id;
				}
			</script>
			<div class="product-container" >
				<div class="product-item-container">
					<div class="box" >
						<input type="hidden" name="name" value="<?php echo $row['productName']; ?>">
						<div>
							<img src="image/<?php echo $row['productImage'];?>">
							<input type="hidden" name="image" value="<?php echo $row['productImage']; ?>">
							<input type="hidden" name="location" value="<?php echo $row['location']; ?>">
							<i class="fa-sharp fa-solid fa-location-dot"> <?php echo $row['location']?> </i>
						</div>
						<h3> <?php echo $row['productName']; ?></h3>
						<div class="price">Ksh<?php echo $row['productPrice']; ?>/=</div>
						<input type="hidden" name="price" value="<?php echo $row['productPrice']; ?>">
						<input type="hidden" name="firstname" value="<?php echo $row['firstname']; ?>">
						<input type="hidden" name="product_id" value="<?php echo $row['productID']; ?>">
						<h3><?php echo $row['firstname']; ?></h3>
						<input type="hidden" name="phonenumber" value="<?php echo $row['phonenumber']; ?>">
						<?php
							if (isset($_SESSION['id'])) {
							?>
									<a href="https://wa.me/254<?php echo $row['phonenumber']; ?>/?text=Hi%20<?php echo $row['firstname']; ?>%2C%20I%20saw%20you%20are%20selling%20a%20<?php echo $row['productName']; ?>," target="_blank">Click to Chat</a>
							<?php
								} else {
							?>
									<a href="signin1.php">Click to Chat (Login Required)</a>
							<?php
							}
						?>
						<input type="submit" name="add_to_cart" value="add to cart" class="btn">
					</div>
				</div>
			</div>
		</form>
			
	<?php }	?>
	</div>
	<br>
	<br>
	<?php include 'footer.php' ?>
</body>
</html>