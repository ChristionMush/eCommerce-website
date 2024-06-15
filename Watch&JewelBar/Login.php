<?php 

session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // something was posted
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password) && filter_var($email, FILTER_VALIDATE_EMAIL)) {

        // read from database
        $query = "SELECT * FROM userstb WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            // verify the hashed password
            if (password_verify($password, $user_data['password'])) {
                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: index.php");
                die;
            }
        }
        echo "Wrong email or password!";
    } else {
        echo "Please enter a valid email and password!";
    }
}
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
            height: 40vh;
            background-image: url(https://jackmasonbrand.com/cdn/shop/articles/Blog_DifferentWatchTypes_Hero_1512x741.jpg?v=1655315156);
            background-size: cover;
            background-position: center;
        }

        .container {
            padding: 10px 10%;
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

        /*--------------------------------------Login Form--------------------------------------------*/
        .login {
            text-align: center;
            padding: 20px 0;
        }

        .login p {
            color: black;
            padding: 50px;
            font-size: 25px;
            font-weight: bolder;
        }

        form {
            margin: 20px auto;
            width: 450px;
            padding: 20px;
            border: none;
            border-radius: 5px;
            background-color: transparent;
            color: #abababc5;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            height: 45px;
            padding: 10px;
            margin: 5px 0;
            background-color: whitesmoke;
            color: #ababab;
            border: none;
        }

        .signupbtn {
            margin: 20px auto;
            width: 300px;
            padding: 20px;
            border: none;
            border-radius: 5px;
            background-color: transparent;
        }

        .btn {
            background-color: #AB2B2B;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-family: "Nanum Myeongjo", serif;
        }

        .btn:hover {
            background-color: #FAD2D2;
        }

        /*---------------------------------------------------Contact Section----------------------------------------*/

        .copyright {
            width: 100%;
            text-align: center;
            padding: 25px 0;
            background: #AB2B2B;
            font-weight: 300;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div id="header">
        <div class="container">
            <nav>
                <div class="header-text">
                    <h1><span>Watch & Jewel Bar</span></h1>
                    <p>Luxury and Finesse made affordable</p>
                </div>
                <ul id="sidemenu">
                    <li><a href="Landing page.php">Home</a></li>
                    <li><a href="Signup.php">Signup</a></li>
					<li><a href="Admin.php">Admin</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!----------------------------------------------Login------------------------------------------------------->
    <div class="login">
        <form action="Login.php" method="post">
            <p>Login</p>
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login" class="btn">
        </form>
        <?php
        if (!empty($error_message)) {
            echo '<p style="color: red;">' . $error_message . '</p>';
        }
        ?>
    </div>
    <!-------------------------------------------------------------Contacts-------------------------------------->
    <div id="contact">
        <div class="copyright">
            <p>copyright © Christion Mushariwa.</p>
        </div>
    </div>
</body>
</html>
