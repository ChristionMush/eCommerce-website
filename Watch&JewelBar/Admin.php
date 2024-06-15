<?php
// Start the session
session_start();

// Database credentials
$host = 'localhost';
$dbname = 'watch&jewelbar';
$username = 'root';
$password = '';

// Create a new database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_email = $_POST['email'];
    $admin_password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT password FROM admin WHERE email = ?");
    $stmt->bind_param("s", $admin_email);

    // Execute the statement
    $stmt->execute();
    $stmt->store_result();

    // Check if email exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($db_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($admin_password, $db_password)) {
            // Password is correct
            // Set session variables
            $_SESSION['admin_email'] = $admin_email;
            $_SESSION['loggedin'] = true;

            // Redirect to management.html
            header("Location: edit_product.html");
            exit;
        } else {
            // Invalid password
            echo "Invalid email or password.";
        }
    } else {
        // Invalid email
        echo "Invalid email or password.";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
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
                </ul>
            </nav>
        </div>
    </div>
    <!----------------------------------------------Login------------------------------------------------------->
    <div class="login">
        <form action="admin.php" method="post">
            <p>Admin Login</p>
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
