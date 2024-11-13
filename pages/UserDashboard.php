<?php
session_start();
include("../config/config.php");


$query = mysqli_query($con, "SELECT*FROM users WHERE Id=id");

while ($result = mysqli_fetch_assoc($query)) {
    $res_Uname = $result['Username'];
    $res_Email = $result['Email'];
    $res_id = $result['Id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Pal</title>
    <link rel="stylesheet" href="../support/css/UserDashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <section>
        <div class="userDashboard">
            <div class="left">
                <div class="userDashLeftUp">
                    <div class="name">
                        <p>Study<span>Pal</span></p>
                    </div>
                    <div class="userDashLeftUpCon">
                        <div class="nav">
                            <a href="#"><i class="fa fa-home"></i>Home</a>
                            <a href="#"><i class="fa fa-calendar"></i>Schedule</a>
                            <a href="./membership.php"><i class="fa fa-cc-visa"></i>Membership</a>
                        </div>
                    </div>
                </div>
                <div class="userDashLeftDown">
                    <a href=""><i class="fa fa-user"></i>Update Profile</a>
                    <a href=""><i class="material-icons"></i>Help</a>
                    <a href="logout.php"><i class="fa fa-unlock-alt"></i>Logout</a>
                </div>
            </div>
            <div class="right">
                <div class="userDashRightUp">
                    <div class="name">
                        <p>Welcome <span><?php echo $res_Uname ?></span></p>
                        <input type="hidden"><?php
                                                if ($res_Uname = !$res_Uname) {
                                                    header("location: login.php");
                                                }
                                                ?></input>
                    </div>
                </div>
                <div id="tableProg" class="userDashRightDown">
                    <div class="rt-01">
                        <div class="rt-01-con">
                            <p>Your <span>Future</span> matters</p>
                            <p>a <span>Book</span> makes<span>your future</span> bright</p>
                        </div>
                    </div>

                    <div class="container">
                        <h2>Upcoming Classes</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Lecturer</th>
                                    <th>Lecture</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT*FROM lectures";
                                $result = $con->query($sql);

                                while ($row = $result->fetch_assoc()) {
                                    echo "
                                            <tr>
                                                <td>$row[Id]</td>
                                                <td>$row[Lecture]</td>
                                                <td>$row[Lecturer]</td>
                                                <td>$row[Time]</td>
                                                <td>
                                                    <a href='#' onclick='join()'> Join </a>
                                                </td>
                                            </tr>
                                            ";
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="card" id="workoutCard">
                            <h2>Your Study Plan</h2>
                            <p id="workoutPlan"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pg02"></div>
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
                <p>© copyright <span>Study pal</span></p>
            </div>
        </footer>
    </section>
    <script src="../support/js/nsm.js"></script>
</body>

</html>