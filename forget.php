
<?php
include 'headlink.php';
include "DatabaseConnection.php";
include "Sessionwithoutlogin.php";
include "Header.php";
$_SESSION["registerDetails"] = $_POST;

include 'PHPMailer/MailOtp.php';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $otp = rand(100000, 999999);
    sendRegMail($email, $otp);
}
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Forget Password</title>
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 20;
            }
            .form-box {
                text-align: center;
                background: #f1f1f1;
                padding: 140px;
                border: 1px solid black;
                border-radius: 8px;
            }
            h2 {
                margin-bottom:20px;
            }
            .send-button {
                background-color: #007BFF;
                color: white;
                border: none;
                font-size: 15px;
                padding: 20px 20px;
                cursor: pointer;
                border-radius: 10px;
            }

            .send-button:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <div class="form-box">
            <header><h1>Forget Password</h1></header>
            <br><br>
            <form method="post" action="otp.php">
                <label for="email">Email Address:</label>
                <input type="email" name="email" id="email" required>
                <br><br>
                <button class="send-button"  type="submit" name="sendOTP">Send OTP</button>
            </form>
        </div>
    </body>
</html>
