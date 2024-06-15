<?php 
session_start();

	include("connection.php");
	include("functions.php"); 

	$user_data = check_login($con);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch & Jewel Bar</title>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Jost:ital,wght@0,100..900;1,100..900&family=Nanum+Myeongjo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/7970bed18f.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Montserrat, sans-serif;
            box-sizing: border-box;
        }
        
        html {
            scroll-behavior: smooth;
        }
        
        body {
            background: white;
            color: #ababab;
        }
        
        #header {
            width: 100%;
            height: 50vh;
            background-image: url(https://jackmasonbrand.com/cdn/shop/articles/Blog_DifferentWatchTypes_Hero_1512x741.jpg?v=1655315156);
            background-size: cover;
            background-position: center;
        }
        
        .container {
            padding: 10px 10%;
        }
        
        .header{
            color: white;
            font-size: 50px;
            text-align: center;
            padding-top: 30px;
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: white;
            height: 75px;
            padding: 0 20px;
        }
        
        nav .header-text {
            margin-top: 0;
            font-size: 30px;
            color: black; /* Changed to black for visibility against white background */
        }
        
        nav .header-text h1 {
            font-size: 24px; /* Adjusted for better alignment */
            margin: 0; /* Removed margin for alignment */
        }
        
        nav .header-text h1 span {
            color: #AB2B2B;
            font-family: "Great Vibes", cursive;
        }
        
        nav .header-text p {
            font-size: 10px;
            color: #ababab;
        }
        
        nav ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        nav ul li {
            display: inline-block;
            text-align: center;
            margin: 0 20px; /* Adjusted margin for spacing */
        }
        
        nav ul li a {
            color: #ababab;
            text-decoration: none;
            font-size: 18px;
            position: relative;
        }
        
        nav ul li a::after {
            content: '';
            width: 0;
            height: 3px;
            background: #AB2B2B;
            position: absolute;
            left: 0;
            bottom: -6px;
            transition: 0.5s;
        }
        
        nav ul li a:hover::after {
            width: 100%;
        }
        
        /* Shopping area */
        .shopping-area .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .shopping-area .type {
            background-color: black;
            color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 25px;
            padding: 20px;
            width: 300px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .shopping-area .type img {
            width: 100%;
            border-radius: 10px;
            display: block;
            transition: transform 0.5s;
        }
        
        .shopping-area .layer {
            width: 100%;
            height: 0;
            background: linear-gradient(rgba(0, 0, 0, 0.6), #AB2B2B);
            border-radius: 10px;
            position: absolute;
            left: 0;
            bottom: 0;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            font-size: 14px;
            transition: 0.5s;
        }
        
        .shopping-area .layer h2 {
            font-weight: 500;
            margin-bottom: 20px;
        }
        
        .shopping-area .layer a {
            margin-top: 20px;
            color: #AB2B2B;
            text-decoration: none;
            font-size: 18px;
            line-height: 60px;
            background: whitesmoke;
            width: 60px;
            height: 60px;
            border-radius: 100%;
            text-align: center;
        }
        
        .shopping-area .type:hover img {
            transform: scale(1.1);
        }
        
        .shopping-area .type:hover .layer {
            height: 100%;
        }
        
        .shopping-area .type h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        
        .shopping-area .type p {
            font-size: 16px;
            margin-bottom: 10px;
        }
        
        /* Product and Cart Tab */
        .cart-container {
            width: 900px;
            max-width: 90vw;
            margin: auto;
            text-align: center;
            padding-top: 10px;
            transition: transform .5s;
        }
        
        .cart-container i {
            width: 30px;
        }
        
        .listProduct .item img {
            width: 70%;
            border-radius: 10px;
        }
        
        .listProduct {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        
        .listProduct .item {
            background-color: #eeeee6;
            padding: 20px;
            border-radius: 20px;
        }
        
        .listProduct .item h2 {
            font-weight: 500;
            font-size: large;
        }
        
        .listProduct .item .price {
            letter-spacing: 7px;
            font-size: small;
        }
        
        .listProduct .item button {
            background-color: #AB2B2B;
            color: #eee;
            padding: 5px 10px;
            border-radius: 20px;
            margin-top: 10px;
            border: none;
        }
        
        .listProduct .item button:active {
            background-color: #FAD2D2;
            transform: translateY(-2px);
            color: black;
        }
                
        .cartTab {
            width: 400px;
            background-color: white;
            color: black;
            position: fixed;
            inset: 0 -400px 0 auto;
            display: grid;
            grid-template-rows: 70px 1fr 70px;
            transition: .5s;
        }
        
        body.showCart .cartTab {
            inset: 0 0 0 auto;
        }
        
        body.showCart .cart-container {
            transform: translateX(-250px);
        }
        
        .cartTab h1 {
            padding: 20px;
            margin: 0;
            font-weight: 300;
            color: #AB2B2B;
            font-family: "Great Vibes", cursive;
        }
        
        .cartTab .cart-btn {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        }
        
        .cartTab .cart-btn button {
            background-color: white;
            border: none;
            font-family: "Great Vibes", cursive;
            font-weight: 500;
            font-size: 30px;
            cursor: pointer;
            color: #AB2B2B;
        }
        
        .cartTab .cart-btn .close {
            background-color: white;
            color: #AB2B2B;
        }
        
        .cartTab .listCart .item img {
            width: 100%;
        }
        
        .cartTab .listCart .item {
            display: grid;
            grid-template-columns: 70px 150px 50px 1fr;
            gap: 10px;
            text-align: center;
            align-items: center;
        }
        
        .listCart .quantity span {
            display: inline-block;
            width: 25px;
            height: 25px;
            background-color: #eee;
            color: black;
            border-radius: 50%;
            line-height: 25px;
        }
        
        .listCart .quantity button {
            background: none;
            border: none;
            font-size: 20px;
            font-weight: 900;
            color: black;
            cursor: pointer;
        }
        
        .total {
            display: grid;
            grid-template-columns: 1fr 1fr;
            text-align: center;
            align-items: center;
            font-size: larger;
            font-weight: 500;
        }
    </style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch & Jewel Bar</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <header id="header">
        <div class="container">
            <nav>
                <div class="header-text">
                    <h1><span>Watch & Jewel Bar</span></h1>
                    <p>Luxury and Finesse made affordable</p>
                </div>
                <ul>
                    <li><a href="Logout.php">Logout</a></li>
                    <li>
                        <a>
                            <div class="icon-cart">
                                <i class="fas fa-shopping-cart"></i>
                                <span>0</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <h2 class="header">Shop All Watches</h2>
    </header>
    <div class="primary">
        <div class="main-Section" id="home"> 
            <div class="cart-container">
                <div class="listProduct" id="product-list">
                    <!-- Product list items will be populated here -->
                </div>
            </div>
            <div class="cartTab">
                <h1>Shopping Cart</h1>
                <div class="listCart"> <!-- Removed id to match JavaScript -->
                    <!-- Cart items will be populated here -->
                </div>
                <div class="cart-btn">
                    <button class="close">Close</button>
                    <button class="checkOut">Check Out</button>
                </div>
            </div>
        </div>
    </div>
    <script src="Function.js"></script>
</body>
</html>
