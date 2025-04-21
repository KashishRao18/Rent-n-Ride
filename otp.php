<?php
session_start();
include 'headlink.php';
include "DatabaseConnection.php";
include "Sessionwithoutlogin.php";
include "Header.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

include 'PHPMailer/MailOtp.php';
// if(isset($_SESSION['registerDetails']) ||){
//server-side validation
if (isset($_POST['sendOTP'])) {
    $otp = ""; // Initialize $otp variable

    // Your existing validation code here...

    if ($valid) {
        // Generate a random OTP
        $otp = mt_rand(100000, 999999);

        // Store the OTP in the session
        $_SESSION['sesRegOtp'] = $otp;

        // Send the OTP via email
        $to = "rupavatiyap15@gmail.com"; // Replace with the recipient's email address
        $subject = "Your OTP for Verification";
        $message = "Your OTP is: $otp";

        // Create a PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0; // Set to 2 for debugging
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com'; // Replace with your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'zipcarrental@gmail.com'; // Replace with your SMTP username
            $mail->Password = 'Zipcar@123'; // Replace with your SMTP password
            $mail->SMTPSecure = 'tls'; // Use 'tls' or 'ssl' based on your server configuration
            $mail->Port = 587; // Adjust the port based on your server configuration

            //Recipients
            $mail->setFrom('zipcarrental@gmail.com', 'Rent n ride'); // Replace with your email and name
            $mail->addAddress($to);

            //Content
            $mail->isHTML(false);
            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();
            echo 'OTP sent successfully. Check your email.';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>OTP Verification</title>
        <style>
            /* Basic styling for the OTP page */
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f0f0f0;
            }

            .otp-container {
                width: 300px;
                margin: auto;
                margin-top: 100px;
                padding: 20px;
                background-color: #fff;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            h2 {
                text-align: center;
                margin-bottom: 20px;
            }

            label {
                display: block;
                margin-bottom: 4px;
            }

            input[type="text"],
            input[type="submit"] {
                width: 90%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }

            input[type="submit"] {
                width: 97%;
                background-color: #007bff;
                color: #fff;
                border: none;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #0056b3;
            }

        </style>
    </head>
    <body>
        <div class="otp-container">
            <h2>OTP Verification</h2>
            <form action="#" method="post">
                <label for="otp">Enter OTP:</label>
                <input type="text" id="otp" name="otp" required>
                <span><?php if (isset($otpE)) echo $otpE; ?></span>
                <input type="submit" value="Verify" name='btnRegister'>
            </form>
        </div>
    </body>
</html>
