<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Payment Confirmation</title>
        <?php
          
        include 'headlink.php';
        include "DatabaseConnection.php";
        include "Sessionwithoutlogin.php";
//        include "Header.php";
        $bookingId = $_GET['bookingId'];
        $_SESSION['bookingcurr']=$bookingId;
//         echo "Hello, " . $_SESSION['bookingcurr'];
        $stmt = $conn->prepare("SELECT Booking_Id, Email, Amount FROM booking WHERE Booking_Id = ? LIMIT 1");
        $stmt->bind_param("s", $bookingId);
        $stmt->execute();
        $result = $stmt->get_result();
        
       
        $row = $result->fetch_assoc();
        $bId = $row['Booking_Id'];
        $amount = $row['Amount'];
        

       ?>

        <style>
            body {
                font-family: Arial, sans-serif;
                text-align: center;
                padding: 50px;
                background-color: white;
            }

            .container {
                max-width: 500px;
                margin: 0 auto;
                padding: 100px;
                background-color: #F0F0F0;
                border-radius: 10px;
            }

            .header {
                font-size: 30px;
                font-weight: bold;
            }

            .statement {
                font-size: 25px;
                margin-bottom: 20px;
                font-family: 'Times New Roman', Times, serif;
            }

            .pay-button {
                background-color: #007BFF;
                color: white;
                border: none;
                font-size: 15px;
                padding: 20px 20px;
                cursor: pointer;
                border-radius: 10px;
            }

            .pay-button:hover {
                background-color: #0056b3;
            }
            .cancel-button {
                background-color: #007BFF;
                color: white;
                border: none;
                font-size: 15px;
                padding: 20px 20px;
                cursor: pointer;
                border-radius: 10px;
            }

            .cancel-button:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <br><br>
        <div class="container">
            <div class="header">Payment Confirmation for Car </div>
            <br>
            <div class="statement">
                <p>Are you sure you want to book a car?</p>
            </div>
            <form method="post">
                <button class="pay-button" type="submit" id="payment">Confirm and Pay</button>
            </form><br>
            <form method="post">
                <button class="cancel-button" type="submit" id="payment" href="index.php">Cancel</button>
                
            </form>
        </div>

        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            var options = {
                "key": "rzp_test_QKqjMApuaUZ6Ko",
                "amount": "<?php echo $amount * 100; ?>",
                "currency": "INR",
                "name": "Rent N Ride",
                "description": "Booking Payment",
                "image": "logo.png",
                "handler": function (response) {
                    if (response.razorpay_payment_id) {
                        var pid = response.razorpay_payment_id;
                        var paymentMethod = "UPI";

                        $.ajax({
                            type: 'POST',
                            url: 'AddPayment.php',
                            data: {
                                pid: pid,
                                bId: <?php echo $row['Booking_Id']; ?>,
                                totalPrice: <?php echo $amount; ?>,
                                paymentMethod: paymentMethod
                            },
                            success: function (data) {
                                // Redirect to Invoice.php
                                window.location.href = 'History.php';
                            },
                            error: function () {
                                alert("An error occurred while adding the booking.");
                            }
                        });
                    }
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.on('payment.failed', function (response) {
                alert(response.error.code);
                alert(response.error.description);
                alert(response.error.source);
                alert(response.error.step);
                alert(response.error.reason);
            });

            document.getElementById('payment').onclick = function (e) {
                rzp1.open();
                e.preventDefault();
            };
        </script>
    </body>
</html>
