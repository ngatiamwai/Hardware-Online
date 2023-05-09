<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Header</title>
</head>
<body>
	<header>
		<div class="flex">
			<a href="products.php" class="logo">Hardware Online</a>
			<div class="navbar">
				<a href="products.php">shop</a>
				<a href="myproducts.php">Sell</a>
				<a href="aboutus.php">About Us</a>
				<a href="contactus.php">Contact Us</a>
        

				<div class="dropdown">
          <?php if(isset($_SESSION['id'])) { ?>
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php 
                $query=mysqli_query($conn,"SELECT register1.firstname FROM `register1` WHERE register1.id = '{$_SESSION['id']}' ");
                while($row=mysqli_fetch_array($query)) {
                  echo $row['firstname'];
                }
              ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="accountinfo.php">Account Information</a>
              <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
          <?php } else { ?>
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Register</a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="signup1.php">Sign Up</a>
              <a class="dropdown-item" href="signin1.php">Sign In</a>
            </div>
          <?php } ?>
        </div>


<script>
  // Toggle the dropdown menu
  document.querySelector('.dropdown').addEventListener('click', function () {
    this.querySelector('.dropdown-menu').classList.toggle('show');
  });
  
  // Close the dropdown menu when clicking outside
  window.addEventListener('click', function (event) {
    const dropdown = document.querySelector('.dropdown');
    if (dropdown && !dropdown.contains(event.target)) {
      dropdown.querySelector('.dropdown-menu').classList.remove('show');
    }
  });
</script>

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


				<?php
				
					// Check if user is logged in
					if (isset($_SESSION['id'])) {
						$user_id = $_SESSION['id'];
						$select_rows = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
						$row_count = mysqli_num_rows($select_rows);
					} else {
						$row_count = 0;
					}
				?>
				<a href="cart.php" class="cart"><i class="bi bi-cart-check-fill"></i><span><?php echo $row_count; ?></span></a>
			</div>
					
		</div>
					
	
	</header>

	<footer>
		
	</footer>
</body>
</html>