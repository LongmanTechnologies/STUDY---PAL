<?php
session_start();
include("../config/config.php");
?>

<?php
$id = $_SESSION['id'];
$query = mysqli_query($con, "SELECT*FROM users WHERE Id=$id");

while ($result = mysqli_fetch_assoc($query)) {
    $res_Uname = $result['Username'];
    $res_Email = $result['Email'];
    $res_id = $result['Id'];
}
?>

<?php
$id = $_SESSION['id'];
$query = mysqli_query($con, "SELECT * FROM `subscription` WHERE 1");

while ($result = mysqli_fetch_assoc($query)) {
    $res_Pemail = $result['Email'];
    $res_Plan = $result['Plan'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../support/css/membership.css">
    <title>Studypal</title>
</head>

<body id="dark">
    <div class="container">
        <a href="./UserDashboard.php"><button class="back">Go Back</button></a>

        <div class="card">
            <h2>Welcome <span><?php echo $res_Uname ?></span></h2>
            <p>Your membership details:</p>
            <ul>
                <li>Membership Type: <span><?php
                                            if ($res_Plan == 'Basic plan')
                                                echo $res_Plan;
                                            elseif ($res_Plan == 'Premium plan')
                                                echo $res_Plan;
                                            else ($res_Plan == 'Gold Plan');
                                            echo $res_Plan;
                                            ?></span></li>
                <li>Subscription Expiry Date: [Expiry Date]</li>
            </ul>
        </div>


        <div class="card">
            <h2>Studypal Membership Subscription Form</h2>
            <button onclick="openForm()" class="open_form" id="openForm">Open Form</button>
            <button type="reset" onclick="closeForm()" class="open_form" id="closeForm">Close Form</button>
            <div class="form-popup" id="myForm">
                <?php
                include("../config/config.php");
                if (isset($_POST['submit'])) {
                    $email = $_POST['email'];
                    $plan = $_POST['plan'];

                    $result = mysqli_query($con, "INSERT INTO subscription(Email, Plan) VALUES('$email','$plan')") or die("Error Occured");
                    echo '<script>alert("Thank you for subscribing to our study pal membership! \n Your subscription request has been successfully received.");
                    window.location.href="membership.php";
                    </script>';
                } else {
                ?>

                    <form action="" method="post">
                        <fieldset>
                            <legend>Personal Information:</legend>
                            <label for="email">Email Address:</label><br>
                            <input type="email" id="email" name="email" required class="user_email" value="<?php echo $res_Email ?>"><br>

                        </fieldset>
                        <fieldset>
                            <legend>Membership Preferences:</legend>
                            <label for="membership-plan">Select Membership Plan:</label><br>
                            <button type="button" onclick="payOpenBasic()" class="planbtn">Basic Plan</button>
                            <div class="basic" id="payProgB">
                                <div class="payment">
                                    <input type="checkbox" id="plan" name="plan" value="Basic Plan">
                                    <label for="basic-plan">Basic Plan</label><br>
                                    <div class="payMet">
                                        <img src="../support/image/payimg1.png" alt="" srcset="">
                                        <input type="checkbox" name="" id="" value="M-pesa">
                                    </div>
                                    <div class="payMet">
                                        <img src="../support/image/payimg2.png" alt="" srcset="">
                                        <input type="checkbox" name="" id="" value="Visa">
                                    </div>
                                    <div class="payMet">
                                        <img src="../support/image/payimg3.png" alt="" srcset="">
                                        <input type="checkbox" name="" id="" value="Mastercard">
                                    </div>
                                    <button type="button" onclick="payClose()">Pay</button>
                                </div>
                            </div>

                            <button type="button" onclick="payOpenPremium()" class="planbtn">Premium Plan</button>
                            <div class="basic" id="payProgP">
                                <div class="payment">
                                    <input type="checkbox" id="plan" name="plan" value="Premium Plan">
                                    <label for="premium-plan">Premium Plan</label><br>
                                    <div class="payMet">
                                        <img src="../support/image/payimg1.png" alt="" srcset="">
                                        <input type="checkbox" name="" id="" value="M-pesa">
                                    </div>
                                    <div class="payMet">
                                        <img src="../support/image/payimg2.png" alt="" srcset="">
                                        <input type="checkbox" name="" id="" value="Visa">
                                    </div>
                                    <div class="payMet">
                                        <img src="../support/image/payimg3.png" alt="" srcset="">
                                        <input type="checkbox" name="" id="" value="Mastercard">
                                    </div>
                                    <button type="button" onclick="payClose()">Pay</button>
                                </div>
                            </div>

                            <button type="button" onclick="payOpenGold()" class="planbtn">Gold Plan</button>
                            <div class="basic" id="payProgG">
                                <div class="payment">
                                    <input type="checkbox" id="plan" name="plan" value="Gold Plan">
                                    <label for="gold-plan">Gold Plan</label><br>
                                    <div class="payMet">
                                        <img src="../support/image/payimg1.png" alt="" srcset="">
                                        <input type="checkbox" name="" id="" value="M-pesa">
                                    </div>
                                    <div class="payMet">
                                        <img src="../support/image/payimg2.png" alt="" srcset="">
                                        <input type="checkbox" name="" id="" value="Visa">
                                    </div>
                                    <div class="payMet">
                                        <img src="../support/image/payimg3.png" alt="" srcset="">
                                        <input type="checkbox" name="" id="" value="Mastercard">
                                    </div>
                                    <button type="button" onclick="payClose()">Pay</button>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset id="terms" class="terms">
                            <legend>Agreement and Consent:</legend>
                            <label>
                                <input type="checkbox" name="agreement" value="agree" required="">
                                I agree to abide by the rules and regulations of the Study Pal. I understand that the membership fee is non-refundable.
                            </label><br>

                            <label>
                                <input type="checkbox" name="consent" value="consent" required>
                                I consent to receive communication from the Studypal regarding membership updates, promotions, and events via the provided email address and phone number.
                            </label><br>
                        </fieldset>
                        <input type="submit" name="submit" value="Sign Up" class="open_form">
                    </form>
                <?php } ?>

            </div>
        </div>
    </div>

</body>

<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
        document.getElementById("closeForm").style.display = "block";
        document.getElementById("openForm").style.display = "none";

    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
        document.getElementById("openForm").style.display = "block";
        document.getElementById("closeForm").style.display = "none";

    }

    function payOpenBasic() {
        document.getElementById('payProgB').style.display = "block";
        document.getElementById('payProgP').style.display = "none";
        document.getElementById('payProgG').style.display = "none";
    }

    function payOpenPremium() {
        document.getElementById('payProgP').style.display = "block";
        document.getElementById('payProgB').style.display = "none";
        document.getElementById('payProgG').style.display = "none";
    }

    function payOpenGold() {
        document.getElementById('payProgG').style.display = "block";
        document.getElementById('payProgP').style.display = "none";
        document.getElementById('payProgB').style.display = "none";
    }

    function payClose() {
        document.getElementById('payProgB').style.display = "none";
        document.getElementById('payProgP').style.display = "none";
        document.getElementById('payProgG').style.display = "none";
        document.getElementById('terms').style.display = "block"
    }
</script>

</html>