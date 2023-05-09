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
    <title>About: Hardware Online</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
    .aboutus-header {
        position: relative;
        text-align: center;
    }
    .aboutus-header img {
        width: 100%;
        height: 550px;
    }
    .aboutus-header h3 {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        font-size: 50px;
        color: white;
        text-shadow: 2px 2px #000;
    }
    img{
        border-radius: 1%;
        object-fit: fill;
    }
    p{
        font-size: 20px;
    }
    .aboutus{
        margin-left: 20vh;
        margin-right: 20vh;
    }
    .about-section {
        display: flex;
    }
    .about-section p {
        margin: 20px 0;
        text-align: justify;
    }
    .about-section img {
        max-width: 100%;
        height: auto;
        margin: 20px;
        width: 400px; 
        height: 300px; 
    }
    .center {
        text-align: center;
    }
    .aboutus-header{
        height: 550px;
    }
</style>

</head>
<body>
    <?php include 'header.php'; ?>

<div class="aboutus-header">
    <img src="./image/Avator4.jpg" alt="construction about us">
    <h3>Construction Shop<br>About Us</h3>
</div>
    </div>
    <!-- <h3>About Construction Shop</h3> -->
    <div class="aboutus">
    
<div class="about-section">
    <img src="./image/Avator1.jpg" alt="Hardware Online" />
    <p>Welcome to Hardware Online! We are an online marketplace where hardware enthusiasts can buy and sell high-quality products from the comfort of their homes. Our mission is to provide a platform that connects buyers and sellers from all over the world, and we are committed to providing an exceptional shopping experience for our customers.</p>
</div>

<div class="about-section">
    <p>We believe that quality and affordability should never be compromised, and that's why we offer a wide range of hardware products at competitive prices. Whether you are a DIY enthusiast, a professional builder, or simply looking for a tool to complete a project, we've got you covered. Our products are carefully selected to meet the needs of our customers, and we only work with trusted sellers to ensure that you receive the best possible service.</p>
    <img src="./image/Avator2.jpg" alt="Hardware Online" />
</div>

<div class="about-section">
    <img src="./image/Avator3.jpg" alt="Hardware Online" />
    <p>At Hardware Online, we pride ourselves on our customer service. Our team is always ready to assist you with any questions or concerns you may have, and we are committed to making your shopping experience with us a positive one. We value your feedback and are constantly striving to improve our platform to meet your needs.</p>
</div>

<div class="center">
    <p>Thank you for choosing Hardware Online. We look forward to serving you!</p>
</div>


    <br>
    </div>
    <br>
    <br>
    <?php include 'footer.php' ?>
</body>
</html>