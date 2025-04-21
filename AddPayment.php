<?php
include 'headlink.php';
include "DatabaseConnection.php";
include "Sessionwithoutlogin.php";
include "Header.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pid = $_POST["pid"];
    $bid = $_POST["bId"];
    $totalPrice = $_POST["totalPrice"];
   

    $stmt = $conn->prepare("INSERT INTO payment (paymentId,Email, bookingId, amount, paymentDate) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssid",$pid, $_SESSION['CustomerEmail'], $bid, $totalPrice);

    if ($stmt->execute()) {
        // Payment inserted successfully
        // You can perform any additional actions here if needed
        echo "<script>window.location.href='History.php'</script>";
    } else {
        // Payment insertion failed, handle the error
        echo "<script>alert('Payment failed');</script>" . $stmt->error;
    }
}
?>