<?php

//include './DatabaseConnection.php';
//
//$Emailid = $_POST['Emailid'];
//$password = $_POST['password'];
//$retypepassword = $_POST['retypepassword'];
//
//$uppercase = preg_match('@[A-Z]@', $password);
//$lowercase = preg_match('@[a-z]@', $password);
//$number = preg_match('@[0-9]@', $password);
//$specialChars = preg_match('@[^\w]@', $password);
//$emailPattern = '/^(.+)@(gmail\.com|yahoo\.com)$/';
//
//if (!preg_match($emailPattern, $Emailid)) {
//    echo '<div class="alert alert-danger" role="alert">Invalid email format. Please use a valid email address ending with @gmail.com or @yahoo.com.</div>';
//} else {
//    $CheckP = $conn->prepare("SELECT * FROM customer WHERE Email = ?");
//    $CheckP->bind_param("s", $Emailid);
//    $result = $CheckP->execute();
//    $result = $CheckP->get_result()->fetch_all(MYSQLI_ASSOC);
//}
//
//    if (!count($result) > 0) {
//
//        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
//            echo '<div class="alert alert-danger" role="alert">Password must be at least 8 characters and contain at least one number and one special symbol.</div>';
//        } else {
//            if ($password != $retypepassword) {
//                echo '<div class="alert alert-danger" role="alert">Passwords do not match.</div>';
//            } else {
//                $_SESSION['Emailid'] = $Emailid;
//                $_SESSION['password'] = $password;
//                $_SESSION['loggedin'] = true;
//                $_SESSION['CustomerEmail'] = $Emailid;
//                echo "<script>window.location.href='EditProfile.php'</script>";
//            }
//        }
//    } else {
//        echo '<div class="alert alert-danger" role="alert">Email id is Exitst</div>';
//    }
?>
<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rentnride";
session_start();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Emailid = $_POST['Emailid'];
$password = $_POST['password'];
$retypepassword = $_POST['retypepassword'];

$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

// Regular expression pattern for valid email format
$emailPattern = '/^.+@(gmail\.com|utu\.ac\.in)$/';

if (preg_match($emailPattern, $Emailid)) {
    $CheckP = $conn->prepare("SELECT * FROM customer WHERE Email = ?");
    $CheckP->bind_param("s", $Emailid);
    $result = $CheckP->execute();
    $result = $CheckP->get_result()->fetch_all(MYSQLI_ASSOC);

    if (!count($result) > 0) {
        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            echo '<div class="alert alert-danger" role="alert">Password must be at least 8 characters and contain at least one number and one special symbol.</div>';
        } else {
            if ($password != $retypepassword) {
                echo '<div class="alert alert-danger" role="alert">Passwords do not match.</div>';
            } else {
                $_SESSION['Emailid'] = $Emailid;
                $_SESSION['password'] = $password;
                $_SESSION['loggedin'] = true;
                $_SESSION['CustomerEmail'] = $Emailid;
                echo "<script>window.location.href='EditProfile.php'</script>";
            }
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Email id already exists.</div>';
    }
} else {
    echo '<div class="alert alert-danger" role="alert">Please enter a valid email adress</div>';
}
?>
