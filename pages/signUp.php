<?php 
session_start();
include("../config/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Studypal</title>
    <link rel="stylesheet" href="../support/css/login.css">
</head>

<body>

    <section class="top">
        <div class="brand">
            <marquee behavior="slide" direction="">
                <div class="brand">
                    <p>Study<span> Pal</span></p>
                </div>
            </marquee>
        </div>
        <div class="nav">
            <ul>
                <a href="./index.php">
                    <li><i class="fa fa-home"></i>HOME</li>
                </a>
                <a href="./subscription-page.php">
                    <li><i class="fa fa-handshake-o"></i>SUBSCRIPTION</li>
                </a>
                <a href="./contactUs.php">
                    <li><i class="fa fa-phone"></i>CONTACT US</li>
                </a>
                <a href="./signUp.php">
                    <li><i class="fa fa-user-circle-o"></i>LOGIN</li>
                </a>
            </ul>
        </div>
    </section>

    <section class="maincon">
        <div class="container" id="container">
            <div class="form-container sign-up">


                <?php
                include("../config/config.php");
                if (isset($_POST['register'])) {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $adm = $_POST['adm'];
                    $password = $_POST['password'];
                    $phone = $_POST['phone'];

                    $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");
                    if (mysqli_num_rows($verify_query) != 0) {

                        echo '<script>alert("This Email is already taken \n Try Again");
                            window.location.href="signUp.php";
                            </script>';
                    } else {
                        mysqli_query($con, "INSERT INTO users(Username, Email, Phone, adm, Password) VALUES('$username','$email','$adm','$phone','$password')") or die("Error Occured");
                        echo '<script>alert("Registration Success \n You may now login \n Welcome!");
                            window.location.href="signUp.php";
                            </script>';
                    }
                } else {
                ?>
                    <form action="" method="post" id="fr">
                        <legend>Create Account</legend>
                        <input type="text" name="username" id="username" placeholder="Name" required>
                        <input type="email" name="email" id="email" placeholder="email@gmail.com" required>
                        <input type="text" name="adm" id="adm" placeholder="Adm No. " required>
                        <input type="tel" name="phone" id="phone" value="+254 " required>
                        <input type="password" name="password" id="password" placeholder="********" required>
                        <button type="submit" name="register">Sign Up</button>
                    </form><?php } ?>
            </div>
            <div class="form-container sign-in">
                <?php
                include("../config/config.php");
                if (isset($_POST['submit'])) {
                    $email = mysqli_real_escape_string($con, $_POST['email']);
                    $password = mysqli_real_escape_string($con, $_POST['password']);

                    $result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                    $row = mysqli_fetch_assoc($result);


                    if (is_array($row) && !empty($row)) {
                        $_SESSION['valid'] = $row['Email'];
                        $_SESSION['username'] = $row['Username'];
                        $_SESSION['id'] = $row['Id'];

                        if (isset($_SESSION['valid'])) {
                            header("location: userDashboard.php");
                        }
                    } else {
                        echo '<script>alert("Invald email or password \n Please try again");
                            window.location.href="signUp.php";
                            </script>';
                    }
                } else {
                ?>

                    <form action="" method="post">
                        <legend>LOGIN</legend>
                        <input type="text" name="email" id="email" placeholder="email@gmail.com" required>
                        <input type="password" name="password" id="password" placeholder="********" required>
                        <button type="submit" name="submit">Login</button>
                    </form>
                <?php } ?>
            </div>

            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-panel toggle-left">
                        <h1>Welcome</h1>
                        <p>Enter your personal details</p>
                        <button class="hidden" id="login">Sign In</button>
                    </div>
                    <div class="toggle-panel toggle-right">
                        <h1>Hello, There </h1>
                        <p>Register with us to be part of the Study Pal family</p>
                        <button class="hidden" id="register">Sign Up</button>
                        <a href="./adminLogin.php">Admin</a>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <section class="footer">
        <footer>
            <div class="social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
            </div>
            <div>
                <p>© copyright <span>Study Pal</span></p>
            </div>
        </footer>
    </section>
    <script src="../support/js/login.js"></script>
</body>


</html>