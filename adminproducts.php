<?php 
    	ini_set('session.cache_limiter','public');
        session_cache_limiter(false);
        session_start();

	include 'connection.php';

	//delete product
	if (isset($_GET['delete'])) {
		$delete_id = $_GET['delete'];
		$delete_query = mysqli_query($conn, "DELETE FROM `product` WHERE productID=$delete_id") or die('query failed');
		if ($delete_query) {
			$messge[]='product deleted sucessfully';
			
		}else{
			$messge[]='product did not deleted sucessfully';
		}
	}

	//update product
	if (isset($_POST['update_product'])) {
		$update_p_id = $_POST['update_p_id'];
		$update_p_name = $_POST['update_p_name'];
		$update_p_price = $_POST['update_p_price'];
		$update_p_productDescription = $_POST['update_p_productDescription'];
		$update_p_img = $_FILES['update_p_image']['name'];
		$update_p_img_tmp_name = $_FILES['update_p_image']['tmp_name'];
		$update_p_folder = 'image/'.$update_p_img;

		$update_query = mysqli_query($conn, "UPDATE `product` SET productID='$update_p_id', productName='$update_p_name', productPrice='$update_p_price', productImage='$update_p_img', productDescription='$update_p_productDescription'
		WHERE productID = '$update_p_id'") or die('query failed');
		if ($update_query) {
			move_uploaded_file($update_p_img_tmp_name,$update_p_folder);
			$messge[]='product has been updated sucessfully';
			header('location:myproducts.php');
		}else{
			$messge[]='product could not updated sucessfully';
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
	<title>Admin</title>
</head>
<header>
		<div class="flex">
			<a href="products.php" class="logo">Hardware Online</a>
			<div class="navbar">
				<a href="products.php">shop</a>
				<a href="myproducts.php">Sell</a>
				<a href="aboutus.php">About Us</a>
				<a href="contactus.php">Contact Us</a>
                <a href="admin.php">Admin</a>
            </div>		
        </div>
<style>
  /* Styles for the dropdown menu */
  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown .dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    padding: 0.5rem 0;
    margin: 0;
    font-size: 1rem;
    text-align: left;
    background-color: #007bff;
    border: 1px solid rgba(0, 0, 0, 0.15);
    border-radius: 0.25rem;
  }

  .dropdown .dropdown-menu.show {
    display: block;
  }

  .dropdown .dropdown-item {
    display: block;
    width: 100%;
    padding: 0.25rem 1.5rem;
    clear: both;
    font-weight: 400;
    color: #212529;
    text-align: inherit;
    white-space: nowrap;
    background-color: transparent;
    border: 0;
  }

  .dropdown .dropdown-item:focus, .dropdown .dropdown-item:hover {
    color: #16181b;
    text-decoration: none;
    background-color: #f8f9fa;
  }
</style>

	
	</header>
<body>
	
	<?php 
		if (isset($message)) {
			foreach ($message as $message) {
				echo '
					<div class="message">
						<span>'.$messge.'<i class="bi bi-x" onclick="this.parentElement.style.display=`none`"></i></span>
					</div>
				';
			}
		}
	?>
	<a href="product_form.php" class="add">+</a>
	<section class="show-product">
		<table>
			<thead>
				<th>product image</th>
				<th>product name</th>
				<th>product price</th>
				<th>Name</th>
				<th>Phone Number</th>
				<th>action</th>
			</thead>
			<tbody>
			<?php 
				$select_products = mysqli_query($conn, "SELECT product.*, register1.firstName, register1.phoneNumber 
														FROM `product`
														INNER JOIN `register1` ON product.sellerID = register1.id 
														
														GROUP BY product.productID") or die('query failed');
				while ($row = mysqli_fetch_array($select_products)) {
			?> 
				<tr>
					<td><img src="image/<?php echo $row['productImage']; ?>" height="100"></td>
					<td><?php echo $row['productName']; ?></td>
					<td><?php echo $row['productPrice']; ?></td>
					<td><?php echo $row['firstName']; ?></td>
					<td><?php echo $row['phoneNumber']; ?></td>
					<td>
						<a href="myproducts.php?delete=<?php echo $row['productID']; ?>" class="delete-btn">
							<i class="bi bi-trash" onclick="return confirm('are you sure you want to delete this item')"></i>delete
						</a>
						<a href="myproducts.php?edit=<?php echo $row['productID']; ?>" class="option-btn">
							<i class="bi bi-pencil"></i>update
						</a>
					</td>
				</tr>
			<?php 
				}
			?>
			</tbody>
		</table>
	</section>
	<section class="edit-form">
		<?php 
			if (isset($_GET['edit'])) {
				$edit_id = $_GET['edit'];
				$edit_query = mysqli_query($conn, "SELECT product.*, register1.phonenumber 
				FROM `product`, `register1`  
				WHERE productID=$edit_id") or die('query failed');
				if (mysqli_num_rows($edit_query) > 0) {
					while($fetch_edit = mysqli_fetch_assoc($edit_query)){
		?>
		<form method="post" enctype="multipart/form-data">
			<h3>update product</h3>
			<img src="image/<?php echo $fetch_edit['productImage']; ?>">
			<input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['productID']; ?>">
			<input type="text" name="update_p_name" value="<?php echo $fetch_edit['productName']; ?>" >
			<input type="number" name="update_p_price"  value="<?php echo $fetch_edit['productPrice']; ?>" >
			<input type="file" name="update_p_image" accept="image/png, image/jpg, image/jpeg" >
			<textarea cols="30" rows="10"type="number" name="update_p_productDescription"  value="<?php echo $fetch_edit['productDescription']; ?>"></textarea>
			<input  >
			<input type="submit" name="update_product" value="update product" class="btn update">
			<input type="reset" value="cancel" class="btn cancel" id="close-edit">
		</form>
		<?php 
					}
				}
				echo "<script>document.querySelector('.edit-form').style.display = 'block'</script>";
			}
		?>
	</section>
	
	
	
	<script type="text/javascript">
		const closeBtn = document.querySelector('#close-edit');

		closeBtn.addEventListener('click',()=>{
			document.querySelector('.edit-form').style.display = 'none'
		})

	</script>
	<br>
    <br>
	<?php include 'footer.php' ?>
</body>
</html>