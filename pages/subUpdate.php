<?php
session_start();
include("../config/config.php");

$sql = "select * from `subscription` where id=$_GET[id]";
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
    <title>Study pal</title>
    <link rel="stylesheet" href="../support/css/all.css">
</head>

<body>
    <section class="top">
        <div class="brand">
            <marquee behavior="slide" direction="">
                <div class="brand">
                    <p>Study <span>pal</span></p>
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
                $query = mysqli_query($con, "UPDATE `subscription` SET Email='$_POST[email]', Plan='$_POST[plan]' WHERE id= '$_POST[Id]' ");
                echo '<script>alert("Class update success.");
                window.location.href="adminDashboard.php";
                </script>';
            } else { ?>
                <h2>Class Update</h2>
                <form action="" method="post">
                    <input type="hidden" name="Id" value="<?php echo $id ?>">
                    <div class="Client">
                        <label>Email: </label>
                        <input type="email" name="email" id="" value="<?php echo $row["Email"]; ?>">
                    </div>
                    <div class="Client">
                        <label>Plan: </label>
                        <input type="text" name="plan" id="" value="<?php echo $row["Plan"]; ?>">
                    </div>

                    <div>
                        
                    </div>

                    <button type="submit" name="update" class="back">Update</button>
                </form>
        </div>
    <?php } ?>
    </section>


</body>

</html>