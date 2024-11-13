<?php
session_start();
include("../config/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Pal</title>
    <link rel="stylesheet" href="../support/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <div class="right">
            <div class="userDashRightUp">
                <div class="name">
                    <p>Welcome</span></p>
                </div>
            </div>
            <div class="container">
                <div class="membersUpdate">
                    <h1>Members Update</h1>
                    <div class="btn">
                        <a href="./userAdd.php" class="back">Add new member</a>
                        <a href="./logout.php" class="back">Logout</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT*FROM users";
                            $result = $con->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                $id = $row['Id'];
                                $name = $row['Username'];
                                $email = $row['Email'];
                                $phone = $row['Phone'];
                                echo "
                                            <tr>
                                                <td>$row[Id]</td>
                                                <td>$row[Username]</td>
                                                <td>$row[Email]</td>
                                                <td>$row[Phone]</td>
                                                <td>
                                                    <a href='./edit.php? id=$id'>Edit</a>
                                                    <a href='./delete.php? id=$id'>Remove</a>
                                                </td>
                                            </tr>
                                            ";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="container">
                <div class="membersUpdate">
                    <h1>Active Subscription Members</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Email</th>
                                <th>Plan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT*FROM subscription";
                            $result = $con->query($sql);

                            while ($row = $result->fetch_assoc()) {
                                echo "
                                            <tr>
                                                <td>$row[Id]</td>
                                                <td>$row[Email]</td>
                                                <td>$row[Plan]</td>
                                                <td>
                                                    <a href='./subUpdate.php?id=$row[Id]'>Renew</a>
                                                    <a href='./delete.php?id=$row[Id]'>Expire</a>
                                                </td>
                                            </tr>
                                            ";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="container">
                <div class="classesUpdate">
                    <h1>Classes Update</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Class</th>
                                <th>Instructor</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT*FROM classes";
                            $result = $con->query($sql);

                            while ($row = $result->fetch_assoc()) {
                                echo "
                                            <tr>
                                                <td>$row[Id]</td>
                                                <td>$row[Class]</td>
                                                <td>$row[Instructor]</td>
                                                <td>$row[Time]</td>
                                                <td>
                                                    <a href='./classEdit.php?id=$row[Id]'>Edit</a>
                                                </td>
                                            </tr>
                                            ";
                            }
                            ?>
                        </tbody>
                    </table>
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
</body>

</html>