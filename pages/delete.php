<?php
session_start();
include("../config/config.php");
?>
<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM users WHERE id=$id";
    $con->query($sql);
}
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM subscription WHERE id=$id";
    $con->query($sql);
}
header("location: ./adminDashboard.php");
exit;
?>