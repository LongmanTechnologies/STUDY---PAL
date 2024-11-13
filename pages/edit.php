<?php
session_start();
include("../config/config.php");
$sql = "select * from `users` where id=$_GET[id]";
$result = mysqli_query($con, $sql);
$id = $_GET['id'];
if ($result) {
    $row = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study buddy</title>
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
            <?php
            include("../config/config.php");
            if (isset($_POST['update'])) {
                $query = mysqli_query($con, "UPDATE `users` SET username='$_POST[username]', Email='$_POST[email]', Phone='$_POST[phone]' WHERE id= '$_POST[Id]' ");
                echo '<script>alert("Details update success.");
                window.location.href="adminDashboard.php";
                </script>';
            } else { ?>
                <h2>Details Update</h2>
                <form action="" method="post">
                    <input type="hidden" name="Id" value="<?php echo $id ?>">
                    <div class="Client">
                        <label>Name: </label>
                        <input type="text" name="username" id="" value="<?php echo $row["Username"]; ?>">
                    </div>
                    <div class="Client">
                        <label>Email: </label>
                        <input type="email" name="email" id="" value="<?php echo $row["Email"]; ?>" required>
                    </div>
                    <div class="Phone">
                        <label>Phone No: </label>
                        <input type="text" name="phone" id="" value="<?php echo $row["Phone"]; ?>" required>
                    </div>
                    <button type="submit" name="update" class="back">Update</button>
                </form>
        </div>
    <?php } ?>
    </section>
</body>

</html>