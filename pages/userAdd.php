<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Pal</title>
    <link rel="stylesheet" href="../support/css/all.css">
</head>

<body>
    <section class="top">
        <div class="brand">
            <marquee behavior="slide" direction="">
                <div class="brand">
                    <p>Study <span>Pal</span></p>
                </div>
            </marquee>
        </div>
    </section>
    <section class="container">
        <a href="./adminDashboard.php"><button class="back01">Go Back</button></a>
        <div class="con">
            <h2>New Client</h2>

            <?php
            include("../config/config.php");
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $phone = $_POST['phone'];

                $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");
                if (mysqli_num_rows($verify_query) != 0) {
                    echo "<div class='alert alert-danger'>
                 <p>This Email is already taken! Try another one</p>
             </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='back'>Retry</button></a>";
                } else {
                    mysqli_query($con, "INSERT INTO users(Username, Email, Phone, Password) VALUES('$username','$email','$phone','$password')") or die("Error Occured");
                    echo "<div class='alert alert-danger'>
                             <p>New registration Success</p>
                         </div> <br>";
                }
            } else {
            ?>
                <form action="" method="post">
                    <div class="Client">
                        <label>Name: </label>
                        <input type="text" name="username" id="" placeholder="Name" required>
                    </div>
                    <div class="Client">
                        <label>Email: </label>
                        <input type="email" name="email" id="" placeholder="nsm@gmail.com" required>
                    </div>
                    <div class="Phone">
                        <label>Phone No: </label>
                        <input type="text" name="phone" id="" placeholder="07********" required>
                    </div>
                    <div class="Client">
                        <label>Password: </label>
                        <input type="password" name="password" id="" placeholder="password" required>
                    </div>
                    <input type="submit" class="back" name="submit" value="Sign Up">
                </form>
            <?php } ?>
        </div>
    </section>


</body>

</html>