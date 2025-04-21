

<?php
// Database connection and OTP generation functions go here

if (isset($_POST['sendOTP'])) {
    $email = $_POST['email'];

    // Validate the email
    $emailPattern = '/^.+@gmail\.com$/'; // Adjust the email pattern to your requirements

    if (!preg_match($emailPattern, $email)) {
        echo 'Invalid email format. Please enter a valid email address ending with @gmail.com.';
    } else {
        // Generate and send OTP to the user's email
        $otp = generateOTP(); // Implement the function to generate an OTP
        sendOTPByEmail($email, $otp); // Implement the function to send OTP via email
        // Store the OTP and email in a database or session for later verification
        // For simplicity, we'll use a session variable
        session_start();
        $_SESSION['reset_email'] = $email;
        $_SESSION['otp'] = $otp;

        echo 'An OTP has been sent to your email address. Please check your email.';
    }
} elseif (isset($_POST['verifyOTP'])) {
    session_start();

    $userEmail = $_SESSION['reset_email'];
    $userOTP = $_SESSION['otp'];

    $enteredOTP = $_POST['otp'];

    if ($enteredOTP === $userOTP) {
        // OTP is correct, allow the user to reset the password
        // Display a form for the user to enter a new password and confirm it
        // Implement the password reset logic here
    } else {
        echo 'Incorrect OTP. Please enter the correct OTP sent to your email.';
    }

    // Clear session variables to prevent reusing OTP
    unset($_SESSION['reset_email']);
    unset($_SESSION['otp']);
}

function generateOTP() {
    // Implement a function to generate a random OTP
    return mt_rand(1000, 9999); // Generate a 4-digit OTP for example
}

function sendOTPByEmail($email, $otp) {
    // Implement the function to send the OTP to the user's email
    // You can use PHP's mail() function or a library like PHPMailer
    // Example: mail($email, 'OTP for Password Reset', 'Your OTP is: ' . $otp);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>New Password</title>
        <?php
        include './DatabaseConnection.php';
        
        ?>
    </head>
    <body>
        
        <form method="post" >
            <label for="email">OTP: </label>
            <input type="text" name="otp" id="otp" required>
            <button type="submit" name="submit">Confirm</button>
        </form>
    </body>
</html>
