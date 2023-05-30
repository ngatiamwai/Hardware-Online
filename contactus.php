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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Contact: Construction Shop</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="contactus-img" >
        <h3 style="position:absolute; padding-top:100px; padding-left:500px ; font-size:50px; color: olive;">
        Construction Shop <br><br>
        Contact Us 
    </h3>
        <style>
           .contactus-img{
            background-image: url('./image/Avator4.jpg');
            height: 500px;
            width: 1500px;
            background-size: cover;
            background-repeat: no-repeat;
            }
           
        </style>
        
    </div>
    <div class="container">
    
    <h3>Contact Us</h3>
    <p>Email: hardwareonline@gmail.com</p>
    <p>Phone: +254793693224</p>
    <p>WhatsApp: +254793693224</p>
    <p>Location: 123 Tom Mboya Street, Nairobi, Kenya</p>
    <p>P.O. Box: 182 - 10000</p>

    <div class="row">
    <a href="https://www.facebook.com/ngatia.mwai.73" target="_blank"><i class="fa fa-facebook"></i></a>
    <a href="https://www.instagram.com/ngatiamwai/" target="_blank"><i class="fa fa-instagram"></i></a>
    <a href="https://www.youtube.com/channel/UClQL8S9LSIICoa8oXLClSGA" target="_blank"><i class="fa fa-youtube"></i></a>
    <a href="https://twitter.com/NgatiaMwai1" target="_blank"><i class="fa fa-twitter"></i></a>
    </div>
    </div>
  <style>
    .container {
	max-width: 600px;
	margin: 0 auto;
	padding: 20px;
}
input[type="submit"]{
	width: 150px;
	margin: .5rem auto;
    text-align: center;
    justify-content: center;
    display: flex;
}
input[type="submit"]:hover{
	transform: translateY(-10px);
	box-shadow: 0 10px 20px #E0E0E0;
	cursor: pointer;
	
}
</style>
</div>
<br>
<br>
<?php include 'footer.php' ?>

</body>
</html>
