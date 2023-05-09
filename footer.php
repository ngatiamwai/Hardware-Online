

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
</head>
<body>

<body>
<footer>
<div class="footer">
<div class="row">
<a href="https://www.facebook.com/ngatia.mwai.73" target="_blank"><i class="fa fa-facebook"></i></a>
<a href="https://www.instagram.com/ngatiamwai/" target="_blank"><i class="fa fa-instagram"></i></a>
<a href="https://www.youtube.com/channel/UClQL8S9LSIICoa8oXLClSGA" target="_blank"><i class="fa fa-youtube"></i></a>
<a href="https://twitter.com/NgatiaMwai1" target="_blank"><i class="fa fa-twitter"></i></a>
</div>

<div class="row">
<ul>
<li><a href="cart.php">Shop</a></li>
<li><a href="products.php">Sell</a></li>
<li><a href="aboutus.php">About Us</a></li>
<li><a href="contactus.php">Contact Us</a></li>
<?php 
    if(isset($_SESSION['email'])){

    
?>
<li><a href="logout.php">Logout</a></li>
<?php }
    else{
    
?>
<li><a href="signup1.php">Sign up</a></li>
<li><a href="signin1.php">Sign In</a></li>
<?php } ?>


</ul>
</div>

<div class="row">
Copyright © 2023 Ngatia - All rights reserved || Designed By: Ngatia 
</div>
</div>
    <style>
        body{
            padding: 10px;
            margin:0;
            overflow-x:hidden;
            }

        .footer{
            padding:30px 0px;
            text-align:center;
            background-color: var(--bg-color);
            }

        .footer .row{
            width:100%;
            margin:1% 0%;
            padding:0.6% 0%;
            color:gray;
            font-size:0.8em;
        }

        .footer .row a{
            text-decoration:none;   
            color:gray;
            transition:0.5s;
        }

        .footer .row a:hover{
            color: olive;
        }

        .footer .row ul{
            width:100%;
        }

        .footer .row ul li{
            display:inline-block;
            margin:0px 30px;
        }

        .footer .row a i{
            font-size:2em;
            margin:0% 1%;
        }

        @media (max-width:720px){
            .footer{
                text-align:center;
                padding:5%;
            }
            .footer .row ul li{
                display:block;
                margin:10px 0px;
                text-align:center;
            }
            .footer .row a i{
                margin:0% 3%;
            }
        }
    </style>
</footer>
</body>
</html>