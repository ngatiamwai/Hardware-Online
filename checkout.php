<?php 
	include 'connection.php';

	ini_set('session.cache_limiter','public');
	session_cache_limiter(false);
	session_start();

	if(!isset($_SESSION['id'])){
		header("location:signin1.php");
	}

	if (isset($_POST['order_btn'])) {
		$name = $_POST['name'];
		$number = $_POST['number'];
		$email = $_POST['email'];
		$payment_method = $_POST['payment_method'];
		$flat = isset($_POST['flat']) ? $_POST['flat'] : "";
		$street = isset($_POST['street']) ? $_POST['street'] : "";
		$city = isset($_POST['city']) ? $_POST['city'] : "";
		$state = isset($_POST['state']) ? $_POST['state'] : "";
		$country = isset($_POST['country']) ? $_POST['country'] : "";
		$user_id=$_POST['user_id'];
		$pin = isset($_POST['pin']) ? $_POST['pin'] : "";
		$order_id = isset($_POST['order_id']) ? $_POST['order_id'] : "";
		
		// Calculate total price of the cart
		$cart_query = mysqli_query($conn, "SELECT * FROM `cart`  where cart.user_id = {$_SESSION['id']}");
		$total_price = 0;
		$total=0;
		$product_names = array(); // initialize an empty array to store product names
		if (mysqli_num_rows($cart_query) > 0) {
			while($product_item = mysqli_fetch_assoc($cart_query)) {
				$product_names[] = $product_item['name'] .' ('.$product_item['quantity'].' )'; // add product name to the array
				$product_price = $product_item['price'] * $product_item['quantity'];
				$total_price = $total += $product_price;
			}
			$total_product = count($product_names); // get the total product count
			$product_names_str = implode(', ', $product_names); // Convert the product names array to a comma-separated string
			$total_price = number_format($total_price, 2); // format the total price with 2 decimal places
		}

		// Insert order information into the database
		$insert_query = "INSERT INTO orders (name, number, email, payment_method, flat, street, city, state, country, pin, total_price, total_products, order_id, user_id) 
							VALUES ('$name', '$number', '$email', '$payment_method', '$flat', '$street', '$city', '$state', '$country', '$pin', '$total_price', '$product_names_str','$order_id','$user_id')";
		if (mysqli_query($conn, $insert_query)) {
			// Order information inserted successfully, proceed to checkout
			// ...
		} else {
			// Error inserting order information into the database
			echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
		}
	
		// Fetch the cart items for the specific user
		// Fetch the cart items for the specific order
		$cart_query = mysqli_query($conn, "SELECT * FROM orders WHERE order_id = '$order_id'");
		$cart_items = mysqli_fetch_all($cart_query, MYSQLI_ASSOC);

		// Loop through the cart items and create an array of product names


		// Display the order confirmation message with the cart items
				echo "
			<div class='order-confirm-container' >
				<div class='message-container'>
					<div class='order-detail'>
						<span>". $product_names_str."</span>
						<span class='total'>total : $".$total_price."/=</span>
					</div>
					<div class='customer-details'>
						<p>Your name : <span>".$name."</span></p>
						<p>Your number : <span>".$number."</span></p>
						<p>Your email : <span>".$email."</span></p>
						<p>Your address : <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country.", ".$pin."</span></p>
						<p>payment method : <span>".$payment_method."</span></p>
						<p class='pay'>(*pay when product arrives*)</p>
					</div>
					<a href='products.php' class='btn'>continue shopping</a>
					<br>
					<br>
					<a href='genpdf.php' class='btn'>Print Invoice</a>
				</div>
			</div>
		";
	}			
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Check Out</title>
</head>
<body>

	<?php include 'header.php'; ?>
	<div class="checkout-form">
		<h1>payment process</h1>
		<div class="display-order">
			<?php 
				$select_cart=mysqli_query($conn, "SELECT * FROM `cart` where cart.user_id = {$_SESSION['id']}");
				$total=0;
				$grand_total=0;
				if (mysqli_num_rows($select_cart)>0) {
					while($fetch_cart=mysqli_fetch_assoc($select_cart)){
						$total_price = $fetch_cart['price']* $fetch_cart['quantity'];
						$grand_total = $total += $total_price;
					
			?>
			<span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
			<?php 
					}
				}
			?>
			<span class="grand-total">Total amount payable : <?= $grand_total; ?>/=</span>
		</div>
		<?php 
		$query=mysqli_query($conn,"SELECT register1.* 
			FROM `register1` 
			WHERE register1.id= {$_SESSION['id']}");
			while($row=mysqli_fetch_array($query))
			{
	?>
		<form method="post" action="checkout.php">
			<div class="input-field">
				<span>your name</span>
				<input type="text" name="name" value="<?php echo $row['firstname'];?> <?php echo $row['lastname'];?>">
			</div>
			<div class="input-field">
				<span>your number</span>
				<input type="number" name="number" value="<?php echo $row['phonenumber'];?>" >
			</div>
			<div class="input-field">
				<span>your email</span>
				<input type="email" name="email" value="<?php echo $row['email'];?>">
			</div>
			<div class="input-field">
				<span>payment method</span>
				<select name="payment_method">
					<option value="cash on delivery">cash on delivery</option>
					<option value="credit card">credit card</option>
					<option value="phone pay">phone pay</option>
					<option value="pay pal">pay pal</option>
				</select>
			</div>
			<div class="input-field">
				<span>address line 1</span>
				<input type="text" name="flat" placeholder="e.g flate no." required>
			</div>
			<div class="input-field">
				<span>address line 2</span>
				<input type="text" name="street" placeholder="e.g street name" required>
			</div>
			<div class="input-field">
				<span>city</span>
				<input type="text" name="city" placeholder="e.g Embakasi" required>
			</div>
			<div class="input-field">
				<span>state</span>
				<input type="text" name="state" placeholder="e.g Nairobi" required>
			</div>
			<div class="input-field">
				<span>country</span>
				<input type="text" name="country" placeholder="e.g Kenya" required>
			</div>
			<div class="input-field">
				<span>pin code</span>
				<input type="text" name="pin" placeholder="e.g 1234567" required>
			</div>
			<input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
			<input type="submit" name="order_btn" value="order now" class="btn">
		</form>
		<?php }?>
	</div>
	<br>
    <br>
	<?php include 'footer.php' ?>
</body>
</html>