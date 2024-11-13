<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Study pal</title>
    <link rel="stylesheet" href="../support/css/login.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="adlog">
    <section class="top">
        <div class="brand">
            <marquee behavior="slide">
                <div class="brand">
                    <p>Study <span>Pal</span></p>
                </div>
            </marquee>
        </div>
        <div class="nav">
            <ul>
                <a href="./index.php">
                    <li><i class="fa fa-home"></i>HOME</li>
                </a>
                <a href="./about.php">
                    <li><i class="fa fa-drivers-license-o"></i>ABOUT</li>
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
    <section class="ad-log">
        <div class="login01">
            <?php
            include("../config/config.php");
            if (isset($_POST['submit'])) {
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $password = mysqli_real_escape_string($con, $_POST['password']);
                $result2 = mysqli_query($con, "SELECT * FROM adminnsm WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                $row2 = mysqli_fetch_assoc($result2);
                if (is_array($row2) && !empty($row2)) {
                    $_SESSION['valid'] = $row2['Email'];
                    $_SESSION['username'] = $row2['Username'];
                    $_SESSION['id'] = $row2['Id'];
                    if (isset($_SESSION['valid'])) {
                        header("location: adminDashboard.php");
                    }
                } else {
                    echo '<script>alert("Wrong Email or Password!");
                            window.location.href="adminLogin.php";
                            </script>';
                }
            } else {
            ?>
                <form action="" method="post">
                    <legend>LOGIN</legend>
                    <input type="text" name="email" id="email" placeholder="email@gmail.com" required>
                    <input type="password" name="password" id="password" placeholder="********" required>
                    <input type="submit" name="submit" value="Login">
                    <a href="./signUp.php" class="back">Not Admin</a>
                </form>
            <?php } ?>
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
</body>

</html>