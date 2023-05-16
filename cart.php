<?php 
	include 'connection.php';

	ini_set('session.cache_limiter','public');
	session_cache_limiter(false);
	session_start();


	// Check if user is logged in
	if (!isset($_SESSION['id'])) {
		header('location:signin1.php');
		exit();
	}


	if (isset($_POST['update_btn'])) {
		$update_value = $_POST['update_quantity'];
		$update_id = $_POST['update_quantity_id'];

		$update_query = mysqli_query($conn, "UPDATE `cart` SET quantity='$update_value' WHERE id='$update_id'") or die('query failed');
		if ($update_query) {
			header('location:cart.php');
		}
	}

	if (isset($_GET['remove'])) {
		$remove_id = $_GET['remove'];
		mysqli_query($conn, "DELETE FROM `cart` WHERE id='$remove_id'");
		header('location:cart.php');
	}
	if (isset($_GET['delete_all'])) {
		
		mysqli_query($conn, "DELETE FROM `cart`");
		header('location:cart.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Cart</title>
</head>
<body>
	<?php include 'header.php'; ?>
	<?php 
		$id = $_SESSION['id'];
		$select_cart = mysqli_query($conn, "SELECT cart.*, product.productImage, product.productName, product.productPrice 
		FROM cart 
		INNER JOIN product ON cart.product_id=product.productID WHERE cart.user_id='$id'");
		$grand_total = 0;
	?>
	<div class="cart-container">
		<h1>shopping cart</h1>
		<table>
			<thead>
				<th>image</th>
				<th>Product name</th>
				<th>price</th>
				<th>Seller name</th>
				<th>quantity</th>
				<th>total price</th>
				<th>action</th>
			</thead>
			<tbody>
			<?php 
				
				if (mysqli_num_rows($select_cart) > 0) {
					while($row = mysqli_fetch_assoc($select_cart)) {
				
			?>
						<tr>
						<td><img src="image/<?php echo $row['productImage']; ?>"></td>
						<td><?php echo $row['productName']; ?></td>
						<td>Ksh<?php echo $row['productPrice']; ?>/=</td>
						<td><?php echo $row['seller_name']; ?></td>
							<td class="quantity">
								<form method="post">
									<input type="hidden" name="update_quantity_id" value="<?php echo $row['id']; ?>">
									<input type="number" min="1" name="update_quantity" value="<?php echo $row['quantity']; ?>">
									<input type="submit" name="update_btn" value="update">
								</form>
							</td>
							<td>Ksh<?php echo $sub_total = floatval($row['price']) * intval($row['quantity']); ?>/=</td>
							<td><a href="cart.php?remove=<?php echo $row['id']; ?>" onclick="return confirm('remove item from cart');" class="delete-btn">remove</a></td>
						</tr>
			<?php 
						$grand_total += $sub_total;
					}
				}
			?>

				<tr class="table-bottom">
					<td><a href="products.php" class="option-btn">continue shopping</a></td>
					<td colspan="3"><h1>total amount payable</h1></td>
					<td style="font-weight: bold;">Ksh<?php echo $grand_total; ?>/=</td>
					<td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all item from cart');" class="delete-btn">delete all</a></td>
				</tr>
			</tbody>
		</table>
		<div class="checkout-btn">
			<a href="checkout.php" class="btn <?=($grand_total>0)?'':'disabled'?>" >proceed to checkout</a>
		</div>
	</div>
	<?php include 'footer.php' ?>
</body>
</html>
