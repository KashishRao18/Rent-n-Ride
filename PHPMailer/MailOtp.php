<?php
@session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendRegMail($email, $otp)
{
    require "PHPMailer/Exception.php";
    require "PHPMailer/PHPMailer.php";
    require "PHPMailer/SMTP.php";

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'zipcarrent@gmail.com';    //SMTP username   travelixtcs@gmail.com
        //travelix

        $mail->Password = 'vhapdimjubhmxfby';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
        $mail->setFrom('zipcarrent@gmail.com', 'Zipcar');
        $mail->addAddress($email);     //Add a recipient

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Registration OTP';
        $mail->Body = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading</title>
</head>
<body>
    <div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2;">
        <div style="margin:20px auto;width:70%;">
            <div style="border-bottom:1px solid #eee">
                <a style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Zipcar</a>
            </div>
            <p style="font-size:1.1em;color:black;">Hi ' . $_SESSION['registerDetails']['username'] . ',</p>
            <p align="justify">Thank you for choosing Zip car. Use the following OTP to complete your sign up procedures. OTP is valid for 5 minutes.</p>
            <h2 style="background: #00466a;margin: 0 auto;width: max-content;padding:0px 10px 0px 10px;color: #fff;border-radius: 4px;">' . $otp . '</h2>
            <div>
                <p style="font-size:0.9em;">Regards,<br>Team Zipcar</p>
                <img src="cid:image_cid" alt="Travelix Logo" height="30" width="20" style="float:right;padding:8px 0;color:#aaa;">
            </div>
            <hr style="border:none;border-top:1px solid #eee" />
        </div>
    </div>
</body>
</html>';
        $imageData = file_get_contents('../Traveler/assets/images/logo.png');
        $mail->addStringEmbeddedImage($imageData, 'image_cid', 'logo.png');
        if ($mail->send()) {
            $_SESSION['sesRegOtp'] = $otp;
			echo "<script>alert('OTP is sent to your email!');window.location.replace('./otp.php');</script>";
        }
        else
			echo "<script>alert('Error in sending email. Please try again later.');</script>";

        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "<script> alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
    }

}
function sendForPassMail($email, $otp)
{
    require "PHPMailer/Exception.php";
    require "PHPMailer/PHPMailer.php";
    require "PHPMailer/SMTP.php";

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'zipcarrent@gmail.com';    //SMTP username   travelixtcs@gmail.com
        //travelix

        $mail->Password = 'vhapdimjubhmxfby';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
        $mail->setFrom('zipcarrent@gmail.com', 'Car rental');
        $mail->addAddress($email);     //Add a recipient

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Registration OTP';
        $mail->Body = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading</title>
</head>
<body>
    <div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2;">
        <div style="margin:20px auto;width:70%;">
            <div style="border-bottom:1px solid #eee">
                <a style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Zipcar</a>
            </div>
            <p style="font-size:1.1em;color:black;">Hi</p>
            <p align="justify">Thank you for choosing Zipcar. Use the following OTP to complete your forgot password procedures. OTP is valid for 5 minutes.</p>
            <h2 style="background: #00466a;margin: 0 auto;width: max-content;padding:0px 10px 0px 10px;color: #fff;border-radius: 4px;">' . $otp . '</h2>
            <div>
                <p style="font-size:0.9em;">Regards,<br>Team zip car</p>
              <img src="cid:image_cid" alt="Travelix Logo" height="30" width="20" style="float:right;padding:8px 0;color:#aaa;">
            </div>
            <hr style="border:none;border-top:1px solid #eee" />
        </div>
    </div>
</body>
</html>';
        @$imageData = file_get_contents('../Traveler/assets/images/logo.png');
        $mail->addStringEmbeddedImage($imageData, 'image_cid', 'logo.png');
        if ($mail->send()) {
            $_SESSION['sesForPassEmail'] = $email;
            $_SESSION['sesForPass'] = $otp;
			echo "<script>alert('OTP is sent to your email!');window.location.replace('./otp.php');</script>";
        }
        else
			echo "<script>alert('Error in sending email. Please try again later.');</script>";

        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "<script> alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
    }
}



?>