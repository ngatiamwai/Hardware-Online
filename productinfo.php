<?php 
	ini_set('session.cache_limiter','public');
	session_cache_limiter(false);
	session_start();
	include 'connection.php';
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
        <title>Product Information</title>
		
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
	<div class="product-container">
		<h1>Product Information</h1>
		<div class="product-i-container">
			
		<?php
			
			$id = $_GET['id'];
			$query=mysqli_query($conn,"SELECT product.*, register1.* FROM `product`,`register1` WHERE product.sellerID=register1.id and productID='$id'");
				while($row=mysqli_fetch_array($query))
				{
			?>

			<form method="post" action="./products.php">
			<div  style="display:flex;">
		
			<div class="image_details">
				<div class="image-switcher">
					<?php if ($row['productImage']): ?>
					<img class="image active" src="./image/<?php echo $row['productImage'];?>" alt="property image">
					<?php endif; ?>
					<?php if ($row['productImage1']): ?>
					<img class="image <?php echo !$row['productImage'] ? 'active' : ''; ?>" src="./image/<?php echo $row['productImage1'];?>" alt="property image">
					<?php endif; ?>
					<?php if ($row['productImage2']): ?>
					<img class="image <?php echo (!$row['productImage'] && !$row['productImage1']) ? 'active' : ''; ?>" src="./image/<?php echo $row['productImage2'];?>" alt="property image">
					<?php endif; ?>
					<div class="arrow arrow-left">&lt;</div>
					<div class="arrow arrow-right">&gt;</div>
				</div>
				<script type="text/javascript">
					const images = document.querySelectorAll(".image");
					const leftArrow = document.querySelector(".arrow-left");
					const rightArrow = document.querySelector(".arrow-right");
					let currentImageIndex = 0;
					images[currentImageIndex].classList.add("active");
					leftArrow.addEventListener("click", () => {
					images[currentImageIndex].classList.remove("active");
					currentImageIndex--;
					if (currentImageIndex < 0) {
						currentImageIndex = images.length - 1;
					}
					images[currentImageIndex].classList.add("active");
					});

					rightArrow.addEventListener("click", () => {
					images[currentImageIndex].classList.remove("active");
					currentImageIndex++;
					if (currentImageIndex >= images.length) {
						currentImageIndex = 0;
					}
					images[currentImageIndex].classList.add("active");
					});
				</script>
				<style>
					.image-switcher {
					position: relative;
					width: 500px;
					height: 500px;
					border-radius: 5px;
					overflow: hidden;
					box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
					}
					.arrow {
					position: absolute;
					top: 50%;
					transform: translateY(-50%);
					font-size: 30px;
					cursor: pointer;
					width: 30px;
					height: 30px;
					background-color: rgba(255, 255, 255, 0.8);
					border-radius: 50%;
					text-align: center;
					line-height: 1.2;
					box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
					}
					.arrow-left {
					left: 10px;
					}
					.arrow-right {
					right: 10px;
					}
					.image {
					display:none;
					width: 100%;
					height: 100%;
					border-radius: 5px;
					margin: 10px;
					}
					.active{
					display: block;
					}
					img.image.active {
						margin: 0px;
						padding: 16px;
					}
				</style>
				</div>
<?php
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
				<div class="more_details">
					<p><?php echo $row['productName']; ?></p>
					<input type="hidden" name="location" value="<?php echo $row['location']; ?>">
					<input type="hidden" name="price" value="<?php echo $row['productPrice']; ?>">
					<input type="hidden" name="phonenumber" value="<?php echo $row['phonenumber']; ?>">
					<input type="hidden" name="name" value="<?php echo $row['productName']; ?>">
					<input type="hidden" name="image" value="<?php echo $row['productImage']; ?>">
					<input type="hidden" name="firstname" value="<?php echo $row['firstname']; ?>">
					<input type="hidden" name="product_id" value="<?php echo $row['productID']; ?>">
					<p><i class="fa-sharp fa-solid fa-location-dot"> <?php echo $row['location']?> </i>	</p>
					<p>Price: Ksh<?php echo $row['productPrice']; ?>/=</p>
					<p>Seller: <?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></p>
					<p><?php echo $row['productDescription']; ?></p>
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

					<style>
						.product-i-container {
						display: flex;
						flex-direction: row;
						align-items: center;
						}
						.product-i-container img {
						max-width: 1000px;
						max-height: 700px;
						margin-right: 20px;
						border-radius: 5%;
						margin-left: 20px;
						}
					</style>
				</div>
			</div>
				</form>
		
		</div>
	</div>
	<h3>Other Products</h3>
	<div style="display:flex; flex-wrap: wrap;">
	<?php 
		if (isset($_GET['selectedProductName'])) {
		$selectedProductName = $_GET['selectedProductName'];
	
		// Modify the SQL query to retrieve products with similar names
		$query = mysqli_query($conn, "SELECT product.*, register1.firstname, register1.phonenumber 
			FROM `product`, `register1` 
			WHERE product.sellerID = register1.id 
				AND product.productID != id 
				AND product.productName LIKE '%$selectedProductName%' 
			ORDER BY dateAdded DESC");
	
		while ($row = mysqli_fetch_array($query)) {
			// Your HTML code for displaying the related products
			?>
			<form method="post" class="card" style="flex-basis:calc(100% / 4)-1px; margin:auto;" onclick="showItemInfo(<?php echo $row['productID']; ?>)">
				<script>
					function showItemInfo(id) {
						window.location.href = "productinfo.php?id=" + id;
					}
				</script>
				<!-- Display product information here -->
			</form>
			<?php
		}
	} else {
		// Handle the case when 'selectedProductName' is not set
		// You can display an error message or redirect the user to an appropriate page
	}
	?>
		<div class="product-container" >
				<div class="product-item-container">
					<div class="box">
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

		
	
	<?php 
				}
			}
	?>
	</div>
    </body>
    <?php include 'footer.php' ?>
</html>
